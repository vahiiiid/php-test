<?php

namespace App\Services\Order;


use App\Models\Food;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderFactory
{
    private $orderRepository;
    private $order;
    private $foodObjects = [];

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function initOrder($restaurantId, $items)
    {
        $this->makeFoodObjects($items);
        $this->order = $this->orderRepository->create(
            [
                'user_id' => Auth::id(),
                'restaurant_id' => $restaurantId,
                'status' => config('constants.order_status.init'),
                'total_price' => OrderPriceCalculator::calculate($this->foodObjects)
            ]
        );
        $this->storeOrderItems();
        return $this->order;
    }

    public function makeFoodObjects($foods)
    {
        foreach ($foods as $food) {
            $this->foodObjects[] = [
                'food' => Food::find($food['food_id']),
                'count' => $food['count']
            ];
        }
    }

    public function storeOrderItems()
    {
        foreach ($this->foodObjects as $foodObject) {
            $foodObject['food']->orders()->save($this->order, ['count' => $foodObject['count']]);
        }
    }

}