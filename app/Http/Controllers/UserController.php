<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Models\Role;

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

        $return = User::showAll($args);

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

        return view('admin.add_user',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'add',
                    'userRoles' => Role::get() 
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
                "role_id" => $request->input('role'),
                "status" => 1
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        session()->flash('userAddSession', 'User ' . $request->input('username') . ' Added!' );

        return redirect('admin/users');
    }

    /**
     * Render edit user form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user){

        return view('admin.add_user',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'edit',
                    'user' => $user,
                    'userRoles' => Role::get()  
                ] 
            );
    }

    /**
     * Render user.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, User $user){

        // Get role.
        //$role = Role::find($user->role_id)->role;

        return view('admin.view_user',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'view',
                    'user' => $user,  
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
            $user->role_id = $request->input('role');
            $user->password = bcrypt($request->input('password'));
            $user->touch();
            $user->update();

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect('admin/users')->with('userUpdateStatus', 'User ' . $user->name . ' Updated!');
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
        return redirect('admin/users')->with('userDeactivateStatus', 'User ' . $user->name . ' Deactivated!');
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
        return redirect('admin/users')->with('userActivateStatus', 'User ' . $user->name . ' Activated!');
    }

}
