<?php

namespace App\Repositories;

use App\Models\Item;
use App\Repositories\Interfaces\ItemRepositoryInterface;
use App\Support\Collection;
use App\Transformers\Item as TransformersItem;
use App\Transformers\Json;

class ItemRepository implements ItemRepositoryInterface
{
    // get the single product
    // from the list
    // in the json format
    public function get($id)
    {

        $data = [];
        $item = Item::findOrFail($id);
        $data[] = TransformersItem::format($item);

        return Json::response($data);
    }
    // get all the products
    // from the list
    // in the json format
    public function all()
    {

        $data = [];
        $items = Item::get();
        foreach ($items as $item) {
            $data[] = TransformersItem::format($item);
        }

        return Json::response($data);
    }

}
