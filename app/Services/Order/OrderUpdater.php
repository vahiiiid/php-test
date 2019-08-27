<?php


namespace App\Services\Order;


use App\Models\Food;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderUpdater
{
    private $orderRepository;
    private $order;
    private $foodObjects = [];

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function updateOrder(Order $order, $items)
    {
        $this->order = $order;
        $this->makeFoodObjects($items);
        $this->updateOrderItems();
        $order->total_price = OrderPriceCalculator::calculate($this->foodObjects);
        $order->save();
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

    public function updateOrderItems()
    {
        $this->order->foods()->detach();
        foreach ($this->foodObjects as $foodObject) {
            $foodObject['food']->orders()->save($this->order, ['count' => $foodObject['count']]);
        }
    }
}
