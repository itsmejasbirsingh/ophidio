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

        return redirect('admin/role/add');
    }

    /**
     * Render add role form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){

        return view('admin.add_role',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'addRole' 
                ] 
            );
    }
}
