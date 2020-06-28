<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Support\Collection;
use App\Transformers\Json;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * Add a new order
     */
    public function add($data)
    {
        $order = new Order;

        $order->bill = $this->calculateBill($data->order);

        // if there is no product
        // then dont create an order
        // and return back
        if($order->bill < 5) return false;

        $order->name = $data->name;

        $order->phone_number = $data->phone_number;

        $order->address = $data->address;

        $order->notes = $data->notes;

        $order->save();

        $this->saveItemsWithQuantity($order, $data->order);

        // if the request is ajax call
        // then return the json response
        if (request()->expectsJson()) {
            $message = "Sit tight. Food is getting prepared";
            return Json::response($order, $message);
        }
    }

    /*
    * Calculate total bill
    * of the order
    */
    protected function calculateBill($products)
    {
        $bill = 0;

        $service = 4.99;

        foreach ($products as $product) {
            $quantity = $product['quantity'];

            $product = Item::find($product['id']);

            $bill += $product->price * $quantity;

        }
        return $bill + $service;
    }

    /**
     * Store the items quantity
     * of a order
     */
    protected function saveItemsWithQuantity($newOrder, $products)
    {
        foreach ($products as $product) {
            $newOrder->items()->attach($product['id'], ['quantity' => $product['quantity']]);
        }
    }

}
