<?php

namespace App\Http\Controllers\Admin\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

class RolController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
        
        $this->middleware('permissions:index.roles',['only' => 'index']);
        $this->middleware('permissions:create.roles',['only' => 'create', 'store']);
        $this->middleware('permissions:edit.roles',['only' => 'edit', 'update']);
        $this->middleware('permissions:destroy.roles',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Role::where('name', '!=' , 'all-access')->get();
        return view('admin.permissions.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $rol = Role::create($request->all())->save();
        return redirect()->route('roles.index')->with('flash', 'Buen trabajo, el rol se ha creado con éxito');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $rol = Role::find($id);
        return view('admin.permissions.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $rol = Role::find($id);
        $rol->fill($request->all())->save();

        return redirect()->route('roles.index')->with('flash', 'Buen trabajo, rol editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rol = Role::find($id);

        if($rol['name'] == 'all-access')
            return back();

        if($request->ajax()){
            $rol->delete($id);
            return response()->json([
                'flash' => 'Buen trabajo, el rol se ha eliminado con éxito',
            ]);
        }
    }
}
