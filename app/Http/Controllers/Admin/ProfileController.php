<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;

class ProfileController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function edit(User $user)
    {   
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::find($id);
        
        $this->authorize('verify_user_edit_profile', $user, $id);

        $user->fill($request->all())->save();

        if($request->file('avatar')){
            $path = \Storage::disk('public')->put('img/profile', $request->file('avatar'));
            $user->fill(['avatar' => asset($path)])->save();
        }

        return back()->with('flash', 'Buen trabajo, Información editada con éxito');

    }

}
