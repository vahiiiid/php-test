<?php

namespace App\Repositories;


use App\Models\Food;

class FoodRepository extends RepositoryEloquentAbstract
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Food $model)
    {
        $this->model = $model;
    }

    public function getFoodsByRestaurant($restaurantId)
    {
        return $this->model->where('restaurant_id', $restaurantId)->get();
    }
}
