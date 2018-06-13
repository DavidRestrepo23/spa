<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{	

	public function __construct(){

		$this->middleware('auth'); //Solo pueden entrar a esta vista los usuario autenticados
	}


    public function index(){
    	return view('admin.dashboard.dashboard');
    }
}
