<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $guarded = [];

    use SoftDeletes;

    /**
     * Get the restaurant that owns the order.
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    /**
     * Get the restaurant that owns the order.
     */
    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus');
    }

    /**
     * The foods that belong to the order.
     */
    public function foods()
    {
        return $this->belongsToMany('App\Models\Food')->withPivot('count');
    }

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
