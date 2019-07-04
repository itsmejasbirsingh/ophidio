<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRoles;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateUserRequest;
use App\Http\Requests\ValidateUserUpdateRequest;

class UserController extends Controller
{
    /**
     * Show all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $args = array();

        $args['search'] = $request->input('s');

        $user = new User();

        $return = $user->list($args);

        return view('admin.list_users', 
                [ 
                    'users' => $return['users'], 
                    'totalUsers' => $return['users_count'],
                    'inactive_users' => $return['inactive_users'],
                    'activeTab' => 'users', 
                    'activeLink' => 'list' 
                ] 
            );
    }

    /**
     * Render add users form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){

        $roles = new UserRoles();

        $userRoles = $roles->get();

        return view('admin.add_user',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'add',
                    'userRoles' => $userRoles 
                ] 
            );
    }

    /**
     * Store user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateUserRequest $request){

        try {
            $user = new User();

            $user->store([
                "name" => $request->input('username'),
                "first_name" => $request->input('first_name'),
                "last_name" => $request->input('last_name'),
                "password" => bcrypt($request->input('password')),
                "email" => $request->input('email'),
                "role" => $request->input('role'),
                "status" => 1
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect('admin/users');
    }

    /**
     * Render edit user form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user){

        $roles = new UserRoles();

        $userRoles = $roles->get();

        return view('admin.add_user',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'edit',
                    'user' => $user,
                    'userRoles' => $userRoles  
                ] 
            );
    }

    /**
     * Update user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUserUpdateRequest $request, User $user )
    {

        try {
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->role = $request->input('role');
            $user->update();

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect('admin/users');
    }

    /**
     * Deactivate a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, User $user )
    {
        $user->status = 0;
        $user->update();
        return redirect('admin/users');
    }

    /**
     * Activate a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, User $user )
    {
        $user->status = 1;
        $user->update();
        return redirect('admin/users');
    }
}
