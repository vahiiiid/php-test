<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\Restaurant\RestaurantValidator;
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
        $restaurantValidator = new RestaurantValidator($input['restaurant_id']);
        $orderValidator = new OrderValidator($input['restaurant_id'], $input['items']);

        if (!$restaurantValidator->validate() || !$orderValidator->validate()) {
            throw new \Exception('selected foods or restaurant are not correct', 400);
        }

        $orderFactory = App::make(OrderFactory::class);
        return  $orderFactory->initOrder($input['restaurant_id'], $input['items']);
    }

    public function update($input, $orderId)
    {
        $restaurantValidator = new RestaurantValidator($input['restaurant_id']);
        $orderValidator = new OrderValidator($input['restaurant_id'], $input['items']);

        if (!$restaurantValidator->validate() || !$orderValidator->validate()) {
            throw new \Exception('selected foods or restaurant are not correct', 400);
        }

        $order = Order::find($orderId)->first();
        $orderUpdater = App::make(OrderUpdater::class);
        return $orderUpdater->updateOrder($order, $input['items']);
    }

}
