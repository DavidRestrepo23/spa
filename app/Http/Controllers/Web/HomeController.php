<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{  

   
   public function index(Request $request)
   {  	

      $postLast = Post::where('status', 'PUBLISHED')->orderBy('id', 'DESC')->first();
      $posts = Post::where('status', 'PUBLISHED')->orderBy('id', 'DESC')->paginate(4);

      if($request->ajax()){
        return view('blog.data.posts', compact('posts'))->render();
      }

   	  return view('blog.index', compact('postLast', 'posts'));
   }


 

  
}
