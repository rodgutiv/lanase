<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Research_Area;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('panel.projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Research_Area::all()->pluck('title_es', 'id');
        $users = User::all()->pluck('name', 'id');

        return view('panel.projects.create')->with([
                'researchareas'  => $areas,
                'users'     => $users
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $project = new Project($request->all());
        unset($project->image);
        if($request->file('image')){
            $title = strtolower($request->title_es);
            $image=$request->file('image');
            $image_name=$title.time().'.'.$image->getClientOriginalExtension();
            // $path="../".public_path()."/images/projects/".$title; //server version
            $path=public_path()."/images/projects/".$title;
            $request->image=$image_name;
            $project->image=$image_name;
        }
        if($project->save()){
            if($request->file('image')){
                $image->move($path, $image_name);
            }
            Flash::overlay('Se ha registrado '.$project->title_es.' de forma exitosa.', 'Alta exitosa');
        }else{
            Flash::overlay('Ha ocurrido un error al registrar '.$project->title_es, 'Error');
        }

        return redirect()->route('projects.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $researchareas = Research_Area::all()->pluck('title_es', 'id');
        $users = User::all()->pluck('name', 'id');

        return view('panel.projects.edit', compact('project', 'researchareas', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $image_name=$project->image;
        $project->fill($request->all());

        $title = strtolower($request->title_es);

        // if($request->title_es != $project->title_es){

        //     Storage::makeDirectory(public_path().'/carpeta/'. 0777);

        // }

        if($request->hasFile('image')) {

            $path=public_path()."/images/projects/".$title;
            $foto_file=$request->file('image');
            
            // Storage::disk('local')->delete($image_name);
            if(File::exists('images/projects/'.$title.'/'.$image_name) && $image_name!="") {

                File::delete('images/projects/'.$title.'/'.$image_name);

            }

            $image_name=$request->title_es.time().'.'.$foto_file->getClientOriginalExtension();
            $foto_file->move($path,$image_name);
            $project->image = $image_name;
        }

        if($project->save()){
            Flash::overlay('Se ha modificado ' . $project->title_es . ' de forma exitosa', 'Operación exitosa');
        }else{
            Flash::overlay('Ha ocurrido un erro al modificar el proyecto ' . $project->title_es, 'Error');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
