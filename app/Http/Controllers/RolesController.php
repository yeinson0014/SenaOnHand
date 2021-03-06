<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Http\Requests\RequestRol;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Rol::search($request->descripcion)->orderBy('id','desc')->paginate(5);
        return view('admin.roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRol $request)
    {
        $roles = new Rol($request->all());
        $roles->save();
       // Flash::success(' '.$tipos_denuncias->name.' se registro correctamente')->important();
        return '{ "estado": 1, "mensaje": "Registro creado"}';
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
        $rol = Rol::find($id);
        // DD($user);
        return view('admin.roles.edit')->with('rol',$rol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRol $request, $id)
    {
        $rol = Rol::find($id);
        $rol->descripcion = $request->descripcion;

        if ($rol->save()){
           //Flash::success('el tipo_denuncia fue editado')->important();
            return '{ "estado": 1, "mensaje": "Registro actualizado"}';
        }else{
           // Flash::success('el tipo_denuncia no se edito')->important();
           return '{ "estado": 0, "mensaje": "Registro no pudo actualizarse"}';
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        //Flash::warning('el tipo_denuncia '.$tipo_denuncia->descripcion.' fue destroyer')->important();
        return redirect()->route('roles.index');
    }
}
