<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Project;
use App\Dataset;

class MainController extends Controller
{
    //
    public function getIndex() {

    	if(Auth::user()->isAdmin()){
    		$users['total'] = User::count();
            $users['projects'] = Project::count();
            $users['datasets'] = Dataset::count();

	    	return view('panel.index')->with('users', $users);
    	}

    	return view('panel.index');

    }
}
