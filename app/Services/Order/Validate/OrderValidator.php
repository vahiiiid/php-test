<?php

namespace App\Services\Order\Validate;


use App\Models\Food;

class OrderValidator
{

    /*
    |--------------------------------------------------------------------------
    | Order Validator
    |--------------------------------------------------------------------------
    |
    |   this class aims to validate selected food
    |   using some conditions
    |   like remaining food status and ...
    |
    */

    public static function validate($restaurantId, $foods)
    {
        foreach ($foods as $food) {
            if (! self::checkFood($restaurantId, $food)) {
                throw new \Exception('food id ' . $food['food_id'] . ' is not exists', 400);
            }
        }

        return true;
    }

    protected static function checkFood($restaurantId, $food): bool
    {
        return (bool) Food::where(
            [
                ['id', '=', $food['food_id']],
                ['restaurant_id', '=', $restaurantId]
            ]
        )->count();

    }
}
