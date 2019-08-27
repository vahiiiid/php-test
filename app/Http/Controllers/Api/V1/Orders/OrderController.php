<?php

namespace App\Http\Controllers\Api\V1\Orders;

use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;

class OrderController extends Controller
{

    // model property on class instances
    protected $orderRepository;
    protected $orderService;

    // Constructor to bind model to repo
    public function __construct(
        OrderRepository $orderRepository,
        OrderService $orderService
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderService = $orderService;
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->with('foods')->get();
        return api_response(200, 'success', new OrderCollection($orders));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserOrders()
    {
        $orders = $this->orderRepository->getUserOrders();
        return api_response(200, 'success', new OrderCollection($orders));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        try {
            $order = $this->orderService->create($request->all());
        } catch (\Exception $e) {
            return api_error($e->getCode(), 'bad request' ,$e->getMessage());
        }

        return api_response(
            201,
            'order created successfully',
            new OrderResource($order->with('foods')->first())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return api_response(200, 'success', new OrderResource($order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param $orderId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $orderId)
    {
        try {
            $order = $this->orderService->update($request->all(), $orderId);
        } catch (\Exception $e) {
            return api_error($e->getCode(), 'bad request',$e->getMessage());
        }

        return api_response(
            200,
            'order updated successfully',
            new OrderResource($order->with('foods')->first())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $orderId
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderId)
    {
        try {
            $this->orderService->cancelOrder($orderId);
        } catch (\Exception $e) {
            return api_error($e->getCode(), 'bad request',$e->getMessage());
        }

        return api_response(200, 'order deleted successfully', null);
    }

    public function changeOrderStatus(ChangeStatusRequest $request,$orderId)
    {
        $order = $this->orderService->changeStatus($orderId, $request->get('status'));

        return api_response(
            200,
            'order status changed',
            new OrderResource($order->with('foods')->first())
        );
    }

}
