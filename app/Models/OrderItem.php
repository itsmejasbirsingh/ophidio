<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['item', 'amount', 'order_id', 'quantity', 'item_id'];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }
}
