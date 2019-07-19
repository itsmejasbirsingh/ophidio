<?php

namespace App\Models;


use App\Models\Role;

use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role_id', 'first_name', 'last_name', 'mobile',
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
     * Get user role in view user.
     *
     * @return array
     */
    public function roles()
    { 
        return $this->hasOne(Role::class, 'id', 'role_id')->select('role');
    }

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
    public static function showAll($params){

        $return = array();

        $query = static::select('users.*', 'roles.role')->leftJoin('roles', 'users.role_id', 'roles.id');

        // Searching.        
        if ( ! empty( $params['search'] ) ) {

            $query = $query->where('name','like', '%'. $params['search'] .'%' )->orWhere('email','like','%'. $params['search'] .'%');
        }

        $users = $query->latest('id')->paginate(config('constants.NUMBER_OF_USERS'));

        $users_count = static::count();

        $users_inactive = static::where('status', '=', 0)->count();

        $return['users'] = $users;
        $return['users_count'] = $users_count;
        $return['inactive_users'] = $users_inactive;

        return $return;
    }

    public static function isAdmin()
    {
        return static::select('users.id', 'roles.role')->leftJoin('roles', 'users.role_id', 'roles.id')->where('roles.role', 'administrator')->where('users.id', Auth::id() )->count();

    }

    public function fullAddress()
    {
        return $this->hasOne(Address::class)
            ->select('address', 'city', 'state', 'pincode')
            ->latest();
    }

    public static function addProfile($params)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->first_name = $params['first_name'];
        $user->last_name = $params['last_name'];
        $user->mobile = $params['mobile'];
        $user->touch();
        $user->update();
    }
}
