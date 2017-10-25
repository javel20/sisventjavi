<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Local;

class LocalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locals = Local::Search($request)->paginate(10);
        return view('admin.local.index')->with([
            'locals' => $locals,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $local = new Local;
        return view('admin.local.create')->with([
            'local' => $local,
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
            'direccion' => 'required|max:150',
            'telefono'=>'required|integer|digits:8',
            
        ]);

        $local = new Local($request->all());

        if($local->save()){
            return redirect("/admin/locals");
        }else{
            return view("/locals.create",["local" => $local]);
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
        $local = Local::find($id);
        return view('admin.local.edit')->with([
            'local' => $local,
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
            'direccion' => 'required|max:150',
            'telefono'=>'required|integer|digits:8',
            'estado'=>'required',
        ]);

        $local = Local::find($id);
        //dd($request->all());
        $local->nombre = $request->nombre;
        $local->direccion = $request->direccion;
        $local->telefono = $request->telefono;
        $local->estado = $request->estado;
        
        if($local->update()){
            return redirect("/admin/locals");
        }else{
            return view("locals.edit",["local" => $local]);
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
        $local = Local::find($id);  
        $local->delete();
        //Local::Destroy($id)
        return redirect('/admin/locals');
    }
}
