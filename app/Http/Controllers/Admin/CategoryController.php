<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

use App\Category;
class CategoryController extends Controller
{   


    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permissions:create.categories',['only' => 'create', 'store']);
        $this->middleware('permissions:edit.categories',['only' => 'edit', 'update']);
        $this->middleware('permissions:destroy.categories',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.edit', $category->id)
                         ->with('flash', 'Categoria creada con éxito');
    }

    public function show($id)
    {   
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {   
        $category = Category::find($id);
        $category->fill($request->all())->save();

        return back()->with('flash', 'Categoria editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');        
            $category = Category::find($id);
            if($request->ajax()){
                $category->delete($id);
                return response()->json([
                    'flash' => 'Buen trabajo, categoria eliminada con éxito',
                ]);
            }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
