<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderItemsCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return
            $this->collection->transform(function ($foods) {
                return [
                    'id' => $foods->id,
                    'name' => $foods->name,
                    'price' => $foods->price,
                    'restaurant_id' => $foods->restaurant_id,
                    'count' => $foods->pivot->count
                ];
            });
    }
}
