<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class SiteController extends Controller
{
    public function index(){
    	$projects = Project::all();
    	return view('site.index')->with('projects', $projects);
    }
}
