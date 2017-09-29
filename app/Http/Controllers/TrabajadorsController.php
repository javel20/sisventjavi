<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Trabajador;
use sisventjavi\TipoTrabajador;
use sisventjavi\Local;


class TrabajadorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trabajadors = Trabajador::Search($request)->paginate(10);
        $trabajadors->each(function($trabajadors){
            $trabajadors->local;
            $trabajadors->tipoTrabajador;
        });
        //dd($trabajadors);

        return view('admin.trabajador.index')->with([
            'trabajadors' => $trabajadors,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locals = Local::all()->pluck('nombre','id');
        $tipotrabs = TipoTrabajador::all()->pluck('nombre','id');
        $trabajador = new Trabajador;
        return view('admin.trabajador.create')->with([
            'trabajador' => $trabajador,
            'locals' =>$locals,
            'tipotrabs' =>$tipotrabs,
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
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellidopat' => 'required|max:100',
            'apellidomat' => 'required|max:100',
            'DNI'=>'required|integer|digits:8',
            'direccion' => 'required|max:100',
            'celular'=>'required|integer|digits:9',
            'operador' => 'required|max:80',
            'descripcion' => 'max:250',
            'local' => 'required',
            'tipotrab' => 'required',
            
        ]);
        //dd($request->all());
        $trabajador = new Trabajador($request->all());
        $trabajador->local_id = $request->local;
        $trabajador->tipo_trabajador_id = $request->tipotrab;

        if($trabajador->save()){
            return redirect("/admin/trabajadors");
        }else{
            return view("/trabajadors.create",["trabajador" => $trabajador]);
        }
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
        $trabajador = Trabajador::find($id);

        $locals = Local::all()->pluck('nombre','id');
        $tipotrabs = TipoTrabajador::all()->pluck('nombre','id');

        return view('admin.trabajador.edit')->with([
            'trabajador' => $trabajador,
            'locals' => $locals,
            'tipotrabs' => $tipotrabs,
        ]);
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
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellidopat' => 'required|max:100',
            'apellidomat' => 'required|max:100',
            'DNI'=>'required|integer|digits:8',
            'direccion' => 'required|max:100',
            'celular'=>'required|integer|digits:9',
            'operador' => 'required|max:80',
            'estado' => 'required',
            'descripcion' => 'max:250',
            'local' => 'required',
            'tipotrab' => 'required',
        ]);

        $trabajador = Trabajador::find($id);
        //dd($request->all());
        $trabajador->nombre = $request->nombre;
        $trabajador->apellidopat = $request->apellidopat;
        $trabajador->apellidomat = $request->apellidomat;
        $trabajador->DNI = $request->DNI;
        $trabajador->direccion = $request->direccion;
        $trabajador->celular = $request->celular;
        $trabajador->operador = $request->operador;
        $trabajador->estado = $request->estado;
        $trabajador->descripcion = $request->descripcion;
        $trabajador->tipo_trabajador_id = $request->tipotrab;
        $trabajador->local_id = $request->local;
        //dd($trabajador);
        
        if($trabajador->update()){
            return redirect("/admin/trabajadors");
        }else{
            return view("trabajadors.edit",["trabajador" => $trabajador]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::find($id);  
        $trabajador->delete();
        //trabajador::Destroy($id)
        return redirect('/admin/trabajadors');
    }
}

