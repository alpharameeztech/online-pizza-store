<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the item seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "TRULY ITALIAN";
        $item->price = "10.99";
        $item->euro_price = "8.91";
        $item->description = "Pepperoni Pizza With Thin Crust";
        $item->image = "/img/pizza/pizza1.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "WILDERNESS BLESS";
        $item->price = "15.99";
        $item->euro_price = "14.24";
        $item->description = "Pepperoni Pizza With Thin CrustHam & Cheese With Vegetables";
        $item->image = "/img/pizza/pizza2.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "GREEN DELIGHT";
        $item->price = "18.99";
        $item->euro_price = "16.24";
        $item->description = "Vegetarian Pizza With Thin Crust";
        $item->image = "/img/pizza/pizza3.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "FEELING CHEESY";
        $item->price = "20.99";
        $item->euro_price = "18.24";
        $item->description = "Pepperoni Pizza With Four Cheeses";
        $item->image = "/img/pizza/pizza4.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "Hot & Spicy";
        $item->price = "22.99";
        $item->euro_price = "20.24";
        $item->description = "Spicy chicken, onions, green peppers & jalapenos";
        $item->image = "/img/pizza/pizza5.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "Golden Delight";
        $item->price = "24.99";
        $item->euro_price = "22.24";
        $item->description = "Unique combo of marinated chicken & pineapples";
        $item->image = "/img/pizza/pizza6.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "Legend - Ranch";
        $item->price = "28.99";
        $item->euro_price = "25.24";
        $item->description = "Blend of grilled chicken & sliced cheese,";
        $item->image = "/img/pizza/pizza7.png";
        $item->save();

        $item = new Item;
        $item->type_id = "1";  //assuming the type is already been created via db seed command
        $item->name = "Tex-Mex";
        $item->price = "30.99";
        $item->euro_price = "27.24";
        $item->description = "Blend of grilled chicken";
        $item->image = "/img/pizza/pizza8.png";
        $item->save();

    }
}
