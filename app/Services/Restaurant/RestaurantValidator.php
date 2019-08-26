<?php

namespace App\Services\Restaurant;


use App\Models\Restaurant;

class RestaurantValidator
{

    /*
    |--------------------------------------------------------------------------
    | Order Validator
    |--------------------------------------------------------------------------
    |
    |this class aims to validate restaurant
    |using some conditions
    |like open hours status and ...
    |
    */

    protected $restaurantId;

    public function __construct($restaurantId)
    {
        $this->restaurantId = $restaurantId;
    }

    public function validate() : bool
    {
        return (bool) Restaurant::where('id', $this->restaurantId)->count();
    }

}