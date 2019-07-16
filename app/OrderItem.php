<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['item', 'amount', 'order_id', 'quantity'];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }
}
