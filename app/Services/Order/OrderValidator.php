<?php

namespace App\Services\Order;


use App\Models\Food;

class OrderValidator
{

    /*
    |--------------------------------------------------------------------------
    | Order Validator
    |--------------------------------------------------------------------------
    |
    |this class aims to validate selected food
    |using some conditions
    |like remaining food status and ...
    |
    */

    protected $restaurantId;
    protected $foods;

    public function __construct($restaurantId, array $foods)
    {
        $this->restaurantId = $restaurantId;
        $this->foods        = $foods;
    }

    public function validate()
    {
        foreach ($this->foods as $food) {
            if (! $this->checkFood($food)) {
                throw new \Exception('food id ' . $food['food_id'] . ' is not exists', 400);
            }
        }

        return true;
    }

    protected function checkFood($food): bool
    {
        return (bool) Food::where(
            [
                ['id', '=', $food['food_id']],
                ['restaurant_id', '=', $this->restaurantId]
            ]
        )->count();

    }
}
