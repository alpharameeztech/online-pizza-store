<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
