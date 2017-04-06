<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MainController extends Controller
{
    //
    public function getIndex() {

    	if(Auth::user()->isAdmin()){
    		$users['total'] = User::all()->count();
	    	$users['activos'] = User::where('status', 1)->count();
	    	$users['inactivos'] = $users['total'] - $users['activos'];

	    	return view('index')->with('users', $users);
    	}

    	return view('index');

    }
}
