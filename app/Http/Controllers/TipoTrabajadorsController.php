<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\TipoTrabajador;

class TipoTrabajadorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipotrabs = TipoTrabajador::Search($request)->paginate(10);
        return view('admin.tipotrabajador.index')->with([
            'tipotrabs' => $tipotrabs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotrab = new TipoTrabajador;
        return view('admin.tipotrabajador.create')->with([
            'tipotrab' => $tipotrab,
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
            'descripcion' => 'max:250',

            
        ]);

        $tipotrabs = new TipoTrabajador($request->all());

        if($tipotrabs->save()){
            return redirect("/admin/tipotrabajador");
        }else{
            return view("/tipotrabajador.create",["tipotrabs" => $tipotrabs]);
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
        $tipotrabs = TipoTrabajador::find($id);
        return view('admin.tipotrabajador.edit')->with([
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
            'descripcion' => 'max:250',

        ]);

        $tipotrabs = TipoTrabajador::find($id);
        //dd($request->all());
        $tipotrabs->nombre = $request->nombre;
        $tipotrabs->descripcion = $request->descripcion;
        
        if($tipotrabs->update()){
            return redirect("/admin/tipotrabajador");
        }else{
            return view("tipotrabajador.edit",["tipotrabs" => $tipotrabs]);
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
        $tipotrabs = TipoTrabajador::find($id);  
        $tipotrabs->delete();
        //tipotrabs::Destroy($id)
        return redirect('/admin/tipotrabajador');
    }
}
