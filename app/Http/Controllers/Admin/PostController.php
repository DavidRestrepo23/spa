<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\Category;
use App\Tag;
use App\Meta;
use App\Publicity;

class PostController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all()->pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {   
        $post = Post::create($request->all());

        if($request->file('file')){
            $path = \Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        
        $post->tags()->attach($request->get('tags'));

        /*METADATA*/
        Meta::create([
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'author' => $request->get('author'),
            'post_id' => $post->id,
        ]);
        /*METADATA*/

        return redirect()
                ->route('posts.edit', $post->id)
                ->with('flash', 'Buen trabajo, Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::find($id);

        $this->authorize('verify_user_post', $post);

        $tags = Tag::all()->pluck('name', 'id');
        $categories = Category::orderBy('name','ASC')->pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'tags', 'categories', 'metadata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {   
        $post = Post::find($id);
        
        $this->authorize('verify_user_post', $post);

        $post->fill($request->all())->save();
        
        if($request->file('file')){
            $path = \Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        $post->tags()->sync($request->get('tags'));


        /*METADATA*/

        $meta = Meta::where('post_id', $id)->first();
        $meta->fill($request->only('description', 'keywords'))->save();

        /*METADATA*/

    
        return back()->with('flash', 'Buen trabajo, Entrada editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $post = Post::find($id);
        $this->authorize('verify_user_post', $post);

        if($request->ajax()){

            $post->delete($id);

            return response()->json([
                'flash' => 'Buen trabajo, Entrada eliminada con éxito',
            ]);
        }

    
    }
}
