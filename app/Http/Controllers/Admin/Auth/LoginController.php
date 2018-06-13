<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{   


    public function __construct(){

        $this->middleware('admin', ['only' => 'showLoginForm']);

    }

    public function login(){


    	$credentials = $this->validate(request(), [
    		'email' => 'email|required|string',
            'password' => 'required|string',
            
    	]);

     

    	if(Auth::attempt($credentials)){ 
            
            return redirect()->route('dashboard'); 
    	}

    	return back()
    			->withErrors(['email' => trans('auth.failed')])
    			->withInput(request(['email']));
    }


    public function showLoginForm(){
        return view('admin.auth.login');
    }


    public function logout(){

        Auth::logout();
        return redirect('admin/login');
    }





}
