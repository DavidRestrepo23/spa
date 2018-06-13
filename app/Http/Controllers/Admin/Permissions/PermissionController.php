<?php

namespace App\Http\Controllers\Admin\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionUpdateRequest;

class PermissionController extends Controller
{   

     public function __construct(){

        $this->middleware('auth');
        $this->middleware('permissions:create.permissions',['only' => 'create', 'store']);
        $this->middleware('permissions:add.permissions',['only' => 'edit', 'update']);
        $this->middleware('permissions:edit.permissions',['only' =>'update']);
        $this->middleware('permissions:destroy.permissions',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=' , 'all-access')->pluck('name', 'id');
        $permissions = Permission::all();
        return view('admin.permissions.add_permission.create', compact('roles','permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id = $request->get('role_id');
        $role = Role::find($role_id);
        $permission = $request->get('permission');
        $role->givePermissionTo($permission);
        return back()->with('flash', 'Permisos asignados con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $role_has_permission = Role::find($id)->permissions;
        $role = Role::find($id);

        $this->authorize('verify_role_all_access', $role, $id);

        $permissions = Permission::all();
        $permission = Permission::find($id);
        return view('admin.permissions.add_permission.edit',compact('permission', 'role_has_permission', 'permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        $permission = $request->get('permission');

        $role->revokePermissionTo($permission);
        $role->givePermissionTo($permission);

        return back()->with('flash', 'Permisos asignados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {      
          $role = Role::find($id);
          $permissions = $request->get('role_permission');
          if($request->ajax()){
            $role->revokePermissionTo($permissions);
            return response()->json([
                'flash' => 'Permisos revocados con éxito',
            ]);
        }

      
    }
}
