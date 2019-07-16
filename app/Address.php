<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

	protected $fillable = ['user_id', 'address','city', 'state', 'pincode'];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }
}
