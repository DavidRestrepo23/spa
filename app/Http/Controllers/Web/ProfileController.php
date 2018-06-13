<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
class ProfileController extends Controller
{
    public function index()
    {
      $users = User::all();
      return view('blog.profiles', compact('users'));
    }

    public function show(Request $request, $nickname)
    {
    	 $user = User::where('nickname', $nickname)->first();
         $postLast = $user->posts()->where('status', 'PUBLISHED')->orderBy('id', 'DESC')->first();
      	 $posts = $user->posts()->where('status', 'PUBLISHED')->orderBy('id', 'DESC')->paginate(4);      	
    	 if($request->ajax()){
    	 	return view('blog.data.posts', compact('posts'))->render();
    	 }
   		return view('blog.profile', compact('user','posts','postLast'));
    }
}
