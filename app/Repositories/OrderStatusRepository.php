<?php

namespace App\Repositories;

use App\Models\OrderStatus;

class OrderStatusRepository extends RepositoryEloquentAbstract
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(OrderStatus $model)
    {
        $this->model = $model;
    }
}
