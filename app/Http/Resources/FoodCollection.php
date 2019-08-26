<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FoodCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return
            $this->collection->transform(function ($food) {
                return [
                    'id' => $food->id,
                    'name' => $food->name,
                    'price' => $food->price
                    ];
            });
    }
}
