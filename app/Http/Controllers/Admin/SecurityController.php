<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SecurityUserUpdateRequest;
use App\User;
use Auth;

class SecurityController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function edit($id)
    {       
        $user = User::find($id);
        $this->authorize('verify_user_edit_profile', $user, $id);
    	return view('admin.profile.edit-password', compact('user'));
    }

    public function update(SecurityUserUpdateRequest $request, $id){

    	$user = User::find($id);
        $this->authorize('verify_user_edit_profile', $user, $id);
        
    	$password_current = $request->get('password_current');
    	$email = $user->email;
    	if(Auth::attempt(['email' => $email, 'password' => $password_current])){
            if(empty($request->get('password'))){
        
            }else{
                $user->fill(['password' => Hash::make($request->get('password'))])->save();
                return back()->with('flash', 'Tú contraseña ha cambiado con éxito');
            }
            if($request->get('status') == 'inactive')
                $user->fill(['status' => $request->get('status')])->save();
                Auth::logout();
                return redirect('admin/login')->with('flash', 'Tu cuenta se ha desactivado con éxito');

    	}else{
    		return back()->with('flash_error', 'La contraseña actual es incorrecta, verifique.'); 
    		
    	}

    }
}
