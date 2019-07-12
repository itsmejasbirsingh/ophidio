<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category_id', 'featured_image', 'price', 'status', 'user_id'
    ];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }
}
