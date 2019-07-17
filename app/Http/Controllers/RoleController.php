<?php

namespace App\Http\Controllers;


use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Store role.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                'role' => 'required|unique:roles,role|min:2',
        ]);

        try {

            $userRole = new Role();

            $userRole->store([
                "role" => $request->input('role'),
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect('admin/role/add')->with('roleAddStatus', 'Role ' .$request->input('role') . ' Added!');
    }

    /**
     * Update role.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $data = array();

		$request->validate([
                'role' => 'required|min:2|unique:roles,role,' . $role->id,
            ]);

        try {
        	$role->role = $request->input('role');
        	$role->touch();
        	$role->update();

        	$data['status'] = 1;
        	$data['role'] = $role->role;
        	$data['updated_at'] = (string)$role->updated_at;
        	$data['message'] = 'Role updated';
        } catch (Exception $e) {

        	$data['status'] = 0;
        	$data['message'] = $e->getMessage();
        }

        echo json_encode($data);
    }

    /**
     * Render add role form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

        return view('admin.add_role',
                [  
                    'activeTab' => 'users', 
                    'activeLink' => 'addRole',
                    'userRoles' => Role::get() 
                ] 
            );
    }
}
