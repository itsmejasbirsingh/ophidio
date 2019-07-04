<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
    ];

    /**
     * Store user's role.
     *
     * @param array
     */
    public function store($params){

        $this->fill($params);
        $this->save();
    }

    public function get()
    {
    	return $this->all();
    }
}
