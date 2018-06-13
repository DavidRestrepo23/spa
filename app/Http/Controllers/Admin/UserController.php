<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
class UserController extends Controller
{   


     public function __construct(){
        $this->middleware('auth');
        $this->middleware('permissions:index.users',['only' => 'index']);
        $this->middleware('permissions:create.users',['only' => 'create', 'store']);
        $this->middleware('permissions:edit.users',['only' => 'edit', 'update']);
        $this->middleware('permissions:destroy.users',['only' => 'destroy']);
    }


    public function index(){

        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        $roles = Role::where('name', '!=' , 'all-access')->pluck('name', 'name');
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request){
        
        $name = $request->name;
        $lastname = $request->lastname;
        $gender = $request->gender;
        $email = $request->email;
        $role = $request->role;
        $password_generator = str_random(8);
        $password_hash = Hash::make($password_generator);

        $user = User::create([
            'name' => $name,
            'lastname' => $lastname,
            'gender' => $gender,
            'email' => $email,
            'password' => $password_hash,
        ]);

        /*Asignar rol*/

        $user->assignRole($role);

        return back()->with(['flash' => 'Usuario creado con éxito', 'flash_password' => $password_generator]);
    }

    public function edit($id){
        $user = User::find($id);
        
        $roles = Role::where('name', '!=' , 'all-access')->pluck('name', 'id');
        return view('admin.users.edit', compact('user','roles'));
    }




    public function update(UserUpdateRequest $request, $id){

        $user = User::find($id);
        $user->fill($request->all())->save();

        $user->roles()->sync($request->role);

        return redirect()->route('users.edit', $user->id)->with('flash', 'Usuario editado con éxito');
        
    }
    


    public function destroy(Request $request, $id){

        $user = User::find($id);

        if($request->ajax()){
            $user->delete($id);
            return response()->json([
                'flash' => 'Usuario eliminado con éxito',
            ]);
        }

    }

}
