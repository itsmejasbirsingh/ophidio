<?php

namespace App\Models;


use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
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

    public static function get()
    {
        return static::all();
    }

}
