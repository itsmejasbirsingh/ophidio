<?php

namespace App\Http\Controllers;

use App\UserRoles;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{
    /**
     * Store user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try {
            $request->validate([
                'role' => 'required|unique:user_roles,role|min:2',
            ]);

            $userRole = new UserRoles();

            $userRole->store([
                "role" => $request->input('role'),
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect('admin/role/add')->with('roleAddStatus', 'Role ' .$request->input('role') . ' Added!');
    }

    /**
     * Render add role form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){

    	$roles = new UserRoles();

        $userRoles = $roles->get();

        return view('admin.add_role',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'addRole',
                    'userRoles' => $userRoles 
                ] 
            );
    }
}
