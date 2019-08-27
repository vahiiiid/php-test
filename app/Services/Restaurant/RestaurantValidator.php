<?php

namespace App\Services\Restaurant;


use App\Models\Restaurant;

class RestaurantValidator
{

    /*
    |--------------------------------------------------------------------------
    | Restaurant Validator
    |--------------------------------------------------------------------------
    |
    |   this class aims to validate restaurant
    |   using some conditions
    |   like open hours status and ...
    |   #todo
    |
    */

    public static function validate($restaurantId) : bool
    {
        //some conditions will be add by business logic and new design
        return (bool) Restaurant::where('id', $restaurantId)->count();
    }

}
