<?php

namespace App\Repositories;


use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends RepositoryEloquentAbstract
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getUserOrders()
    {
        return Order::where('user_id', Auth::id())
            ->with('foods')
            ->get();
    }
}
