<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
class SearchController extends Controller
{
    public function show(Request $request)
    {	
    	$query = $request->get('query');
    	$posts = Post::where('title', 'like', "%$query%")->get();
    	 if($request->ajax()){
            return view('blog.data.posts', compact('posts', 'query'))->render();
        }
    	return view('blog.search', compact('posts','query'));
    }

    public function data()
    {
  
        $posts = Post::where('status', 'PUBLISHED')->pluck('title');
       
    	return $posts;
    
    }
}
