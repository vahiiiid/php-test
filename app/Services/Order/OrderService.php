<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\Order\Create\OrderFactory;
use App\Services\Order\Create\OrderUpdater;
use App\Services\Order\Validate\ValidatorFacade;
use Illuminate\Support\Facades\App;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function create($input)
    {
        try {
            //validate foods and orders first, using facade validator wrap this logic
            if (ValidatorFacade::handle($input['restaurant_id'], $input['items'])) {
                //make an order with factory design
                $orderFactory = App::make(OrderFactory::class);
                return  $orderFactory->initOrder($input['restaurant_id'], $input['items']);
            }
            throw new \Exception( 'some of foods or restaurants are not exist!', 400);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }

    public function update($input, $orderId)
    {
        try {
            if (ValidatorFacade::handle($input['restaurant_id'], $input['items'])) {
                $order = Order::where('id',$orderId)->first();
                $orderUpdater = App::make(OrderUpdater::class);
                return $orderUpdater->updateOrder($order, $input['items']);
            }
            throw new \Exception( 'some of foods or restaurants are not exist!', 400);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }

    }

    public function cancelOrder($orderId)
    {
        $this->orderRepository->update(
            ['status' => config('constants.order_status.canceled')],
            $orderId
        );
        $this->orderRepository->delete($orderId);
    }

    public function changeStatus($orderId, $newStatus)
    {
        return $this->orderRepository->update(
            ['status' => config('constants.order_status')[$newStatus]],
            $orderId
        );
    }
}
