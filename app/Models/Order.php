<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'amount', 'address_id'];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }

    public function showAll()
    {
    	return static::latest()->leftJoin('users', 'orders.user_id','users.id')->select('users.name', 'orders.*')->get();
    }

    public function items()
    {
    	return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class)->select('name');
    }

    public function addresses()
    {
    	return $this->hasOne(Address::class, 'id', 'address_id')->select('address', 'city', 'state', 'pincode');
    }
}
