<?php

namespace App\Http\Controllers\Api\V1\Restaurants;

use App\Http\Resources\RestaurantCollection;
use App\Repositories\RestaurantRepository;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{

    // model property on class instances
    protected $restaurantRepository;

    // Constructor to bind model to repo
    public function __construct(
        RestaurantRepository $restaurantRepository
    ) {
        $this->restaurantRepository = $restaurantRepository;
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = $this->restaurantRepository->all();
        return api_response(200, 'success', new RestaurantCollection($restaurants));
    }

}
