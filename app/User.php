<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\UserRoles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Store user.
     *
     * @param array
     */
    public function store($params){

        $this->fill($params);
        $this->save();
    }

    /**
     * Listing users.
     *
     * @param array
     */
    public function list($params){

        if ( ! empty( $params['search'] ) ) {

            $users = $this->where('name','like', '%'. $params['search'] .'%' )->orWhere('email','like','%'. $params['search'] .'%')->paginate(config('constants.NUMBER_OF_USERS'));
        }
        else{

            $users = $this->latest()->paginate(config('constants.NUMBER_OF_USERS'));
        }

        //dd($users);

        $users_count = $this->count();

        $users_inactive = $this->where('status', '=', 0)->count();

        $return = array();

        $return['users'] = $users;
        $return['users_count'] = $users_count;
        $return['inactive_users'] = $users_inactive;

        return $return;
    }
}
