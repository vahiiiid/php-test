<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';

    /**
     * Get the orders for the status.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
