<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return
            $this->collection->transform(function ($restaurant) {
                return [
                    'id' => $restaurant->id,
                    'title' => $restaurant->name,
                    'address' => $restaurant->address,
                ];
            });
    }
}

