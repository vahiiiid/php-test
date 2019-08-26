<?php

namespace App\Http\Controllers\Api\V1\Foods;

use App\Http\Resources\FoodCollection;
use App\Repositories\FoodRepository;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

    // model property on class instances
    protected $foodRepository;

    // Constructor to bind model to repo
    public function __construct(
        FoodRepository $foodRepository
    ) {
        $this->foodRepository = $foodRepository;
        $this->middleware('jwt.auth', ['except' => ['getRestaurantFoods']]);
    }

    /**
     * Display a listing of the restaurant foods.
     *
     * @param $restaurantId
     * @return \Illuminate\Http\Response
     */
    public function getRestaurantFoods($restaurantId)
    {
        $foods = $this->foodRepository->getFoodsByRestaurant($restaurantId);
        return api_response(200, 'success', new FoodCollection($foods));
    }

}
