<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'amount', 'address_id'];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }
}
