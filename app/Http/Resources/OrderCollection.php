<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return
            $this->collection->transform(function ($order) {
                return [
                    'id' => $order->id,
                    'user_id' => $order->user_id,
                    'restaurant_id' => $order->restaurant_id,
                    'status' => $order->status,
                    'total_price' => $order->total_price,
                    'items' => new OrderItemsCollection($order->foods)
                    ];
            });
    }
}
