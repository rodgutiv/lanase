<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index() {
    	$users['total'] = User::all()->count();
    	$users['activos'] = User::where('status', 1)->count();
    	$users['inactivos'] = $users['total'] - $users['activos'];
    	// dd($users);
    	return view('admin.index')->with('users', $users);
    }
}
