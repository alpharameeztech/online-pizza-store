<?php

namespace App\Transformers;

class Item
{
    /**
     * Create schema for the Item Api
     */
    public static function format($data){
        return [
            'id' => $data->id,
            'type' => class_basename($data),
            'attributes' => [
                'name' => $data->name,
                'price' => $data->price,
                'euro_price' => $data->euro_price,
                'description' => $data->description,
                'image' => $data->image,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at
            ],
            'relationships' => [
                'type' => [
                    'data' => [
                        'id' => $data->type->id,
                        'type' => class_basename($data->type)
                    ]
                ]
            ]
        ];
    }
}
