<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
		$this->middleware('guest:admin');
	}
	
	public function showLoginForm()
	{
		return view('auth.admin-login'); 
	}

	public function login(Request $request)
	{
		//Validate the form data
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		//Attemp to log the user in
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
		{
			//if succesful, then redirect to their intended location
			return redirect()->intended(route('admin.dashboard'));
		}
		
		//if succesful, then redirect back to the login with the form data
		return redirect()->back()->withInput($request->only('email','remember'));

	}

}
