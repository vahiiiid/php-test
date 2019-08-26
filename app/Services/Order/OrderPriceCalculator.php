<?php

namespace App\Services\Order;


class OrderPriceCalculator
{

    public static function calculate(array $foods): float
    {
        $totalPrice = 0;

        foreach ($foods as $food) {
            $totalPrice += $food['food']->price * $food['count'];
        }

        return $totalPrice;
    }

}