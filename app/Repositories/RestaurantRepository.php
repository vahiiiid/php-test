<?php

namespace App\Repositories;


use App\Models\Restaurant;

class RestaurantRepository extends RepositoryEloquentAbstract
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Restaurant $model)
    {
        $this->model = $model;
    }
}
