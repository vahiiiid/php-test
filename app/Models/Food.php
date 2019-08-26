<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;

    /**
     * Get the restaurant that owns the food.
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    /**
     * The orders that belong to the food.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
