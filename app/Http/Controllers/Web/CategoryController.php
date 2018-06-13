<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    public function show(Request $request, $slug)
    {
    	$category = Category::where('slug', $slug)->first();
    	$posts = $category->posts()->orderBy('id', 'DESC')->paginate(4);
    	if($request->ajax()){
    		return view('blog.data.posts', compact('posts'))->render();
    	}
    	return view('blog.categories', compact('category', 'posts'));
    }
}
