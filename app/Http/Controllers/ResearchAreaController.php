<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research_Area;
use Laracasts\Flash\Flash;
use App\Http\Requests\ResearchAreaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ResearchAreaController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $areas = Research_Area::all();
        return view('panel.researcharea.index')->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.researcharea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResearchAreaRequest $request)
    {
        //
        $area = new Research_Area($request->all());
        //cambiar nombre de la imagen
        unset($area->image);
        if($request->file('image')){
            $title = strtolower($request->title_es);
            $image=$request->file('image');
            $image_name=$title.time().'.'.$image->getClientOriginalExtension();
            // $path="../".public_path()."/images/researcharea/"; //server version
            $path=public_path()."/images/researcharea/";
            $request->image=$image_name;
            $area->image=$image_name;
        }
        if($area->save()){
            if($request->file('image')){
                $image->move($path, $image_name);
            }
            Flash::overlay('Se ha registrado '.$area->title_es.' de forma exitosa.', 'Alta exitosa');
        }else{
            Flash::overlay('Ha ocurrido un error al registrar '.$area->title_es, 'Error');
        }

        return redirect()->route('researcharea.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ra = Research_Area::find($id);
        $projects = "";
        // foreach ($ra->projects as $project) {
        //     $projects .= $project->title_es." ";
        // }

        $count = count($ra->projects);

        if( $count > 0 ){

            for ($i=0; $i < count($ra->projects) - 1 ; $i++) { 
                $projects .= $ra->projects[$i]->title_es." | ";
            }
            $projects .= $ra->projects[$i]->title_es;
            
        }else{
            $projects = "---";
        }


        return response()->json([
                "id" => $ra->id,
                "name" => $ra->title_es,
                "nameEn" => $ra->title,
                "display" => $ra->display,
                "image" => $ra->image,
                "projects" => $projects
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ra = Research_Area::find($id);
        return view('panel.researcharea.edit')->with('ra', $ra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearchAreaRequest $request, $id)
    {
        $ra = Research_Area::find($id);
        $image_name=$ra->image;
        $ra->fill($request->all());

        if($request->hasFile('image')) {
            $path=public_path()."/images/researcharea/";
            $foto_file=$request->file('image');
            
            // Storage::disk('local')->delete($image_name);
            if(File::exists('images/researcharea/'.$image_name) && $image_name!="") {

                File::delete('images/researcharea/'.$image_name);

            }

            $image_name=$request->title_es.time().'.'.$foto_file->getClientOriginalExtension();
            $foto_file->move($path,$image_name);
            $ra->image = $image_name;
        }

        if($ra->save()){
            Flash::overlay('Se ha modificado ' . $ra->title_es . ' de forma exitosa', 'Operación exitosa');
        }else{
            Flash::overlay('Ha ocurrido un erro al modificar al usuario ' . $ra->title_es, 'Error');
        }

        return redirect()->route('researcharea.index');
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
