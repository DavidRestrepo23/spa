<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
   public function show(Request $request, $slug)
    {
    	$tag = Tag::where('slug', $slug)->first();
    	$posts = $tag->posts()->where('status', 'PUBLISHED')->orderBy('id', 'DESC')->paginate(4);
    	if($request->ajax()){
    		return view('blog.data.posts', compact('posts'))->render();
    	}
    	return view('blog.tags', compact('tag', 'posts'));
    }
}
