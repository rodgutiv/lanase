<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('panel.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        // dd($request->all());
        $user = new User($request->all());
        $user->password = bcrypt($user->password);
        // $user->status = 1;
        if($user->save()){
            Flash::overlay('Se ha registrado '.$user->name.' de forma exitosa.', 'Alta exitosa');            
        }else{
            Flash::overlay('Ha ocurrido un problema al registrar '.$user->name, 'Error');
        }

        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $projects = "";
        // foreach ($user->projects as $project) {
        //     $projects .= $project->title_es." ";
        // }

        $count = count($user->projects);

        if( $count > 0 ){

            for ($i=0; $i < count($user->projects) - 1 ; $i++) { 
                $projects .= $user->projects[$i]->title_es." | ";
            }
            $projects .= $user->projects[$i]->title_es;
            
        }else{
            $projects = "---";
        }


        return response()->json([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "display" => $user->display,
                "status" => $user->status,
                "role" => $user->role,
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
        $user = User::find($id);
        return view('panel.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        if($user->save()){
            Flash::overlay('Se ha modificado ' . $user->name . ' de forma exitosa', 'Operación exitosa');
        }else{
            Flash::overlay('Ha ocurrido un erro al modificar al usuario ' . $user->name, 'Error');
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        if($usuario->status == 0){
            $usuario->status = 1;
        }else{
            $usuario->status = 0;
        }
        if($usuario->save()) {
            Flash::overlay('Se ha modificado el status de ' . $usuario->name . ' de forma exitosa', 'Operación exitosa');
        } else {
            Flash::overlay('Ha ocurrido un error al modificar el status del usuario ' . $usuario->name, 'Error');
        }

        return redirect()->route('users.index');
    }


    public function getUsers(Request $req)
    {
        $type = $req->input('type');

        switch($type){
            case "all":
                $res = User::orderBy('id', 'asc')->get();
                break;
            case "admin":
                $res = User::where('role', 1)->orderBy('id', 'asc')->get();
                break;
            case "user":
                $res = User::where('role', 2)->orderBy('id', 'asc')->get();
                break;
        }

        // dd($res);

        $str = "";

        foreach ($res as $user) {
            $str .= "<tr><td>".$user->name."</td><td>".$user->email."</td><td>";

            if($user->status == 1){
                $str .= "<span class='badge1 green white-text'>Activo</span>"; 
            }else{ 
                $str .= "<span class='badge1 grey white-text'>Inactivo</span>";
            }

            $str .="</td><td>";

            if($user->role == 1){
                $str .= "<span class='badge1 teal white-text'>Admin</span>"; 
            }else{ 
                $str .= "<span class='badge1 blue white-text'>User</span>";
            }

            $str .= "<td>
                        <a href='#!' class='user-view tooltipped' data-tooltip='Detalles' data-position='top' data-delay='50' data-id='".$user->id."'><i class='material-icons brown-text'>receipt</i></a>
                        <a href='".route('users.edit', $user->id)."' class='user-edit tooltipped' data-tooltip='Editar' data-position='top' data-delay='50'><i class='material-icons teal-text'>edit</i></a>
                    ";
            if($user->id != \Auth::user()->id){
                if($user->status == 1){
                    $str .= "<a href='#!' class='user-delete tooltipped' data-id='".$user->id."' data-tooltip='Deshabilitar' data-position='top' data-delay='50'><i class='material-icons red-text'>close</i></a>
                    </td>";
                }else{
                    $str .= "<a href='#!' class='user-delete tooltipped' data-id='".$user->id."' data-tooltip='Habilitar' data-position='top' data-delay='50'><i class='material-icons green-text'>check</i></a>
                    </td>";
                }
            }
        }

        if($str == ""){
            $str = "Sin resultados";
        }

        return $str;
        // return response()->json([

        // ]);
    }
}
