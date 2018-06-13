<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
class PostController extends Controller
{
    public function show(Request $request, $slug)
    {
    	$post = Post::where('slug', $slug)->where('status', 'PUBLISHED')->first();      

        if(!$post)
            return abort(401);

        $views = $post->views + 1;
        $post->update(['views' => $views]);

        $category_slug = $post->category->slug;
        $category = Category::where('slug', $category_slug)->first();
        $posts = $category->posts()->orderBy('id', 'DESC')->paginate(2);


        if($request->ajax()){
        	return view('blog.data.posts', compact('posts'))->render();
        }
   		return view('blog.post', compact('post', 'posts'));
    }
}
