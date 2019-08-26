<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    /**
     * Get the foods for the restaurant.
     */
    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }

    /**
     * Get the orders for the restaurant.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
