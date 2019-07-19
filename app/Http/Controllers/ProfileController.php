<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ValidateProfileRequest;

use App\Models\User;

use App\Models\Address;

use Auth;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('user_profile');
    }

    public function save(ValidateProfileRequest $request)
    {
    	User::addProfile([
    		'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
    		'mobile' => $request->input('mobile'),
    	]);

    	$address = new Address();

    	$address->store([
    		'user_id' => Auth::user()->id,
    		'address' => $request->input('address'),
    		'city' => $request->input('city'),
    		'state' => $request->input('state'),
    		'pincode' => $request->input('pincode'),
    	]);

    	return back()->withMessage('Profile Saved!');
    }
}
