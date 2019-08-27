<?php

namespace App\Services\Order\Validate;


use App\Services\Restaurant\RestaurantValidator;

class ValidatorFacade
{
    public static function handle($restaurantId, $items)
    {
        try {
            return (bool) (RestaurantValidator::validate($restaurantId) &&
                   OrderValidator::validate($restaurantId, $items));
            }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
