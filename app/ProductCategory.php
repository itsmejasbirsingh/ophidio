<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }

    public static function get()
    {
        return static::all();
    }
}
