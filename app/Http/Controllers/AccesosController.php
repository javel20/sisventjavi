<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Acceso;

class AccesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accesos = Acceso::Search($request)->paginate(10);
        return view('admin.acceso.index')->with([
            'accesos' => $accesos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acceso = new Acceso;
        return view('admin.acceso.create')->with([
            'acceso' => $acceso,
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
            'nombre' => 'required|unique:accesos|max:120',
            
            
        ]);


        $acceso = new Acceso($request->all());
        $acceso->save();

        if($acceso->save()){
            return redirect("admin/accesos");
        }else{
            return view("accesos.create",["acceso" => $acceso]);
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
        $acceso = Acceso::find($id);
        return view('admin.acceso.edit')->with([
            'acceso' => $acceso,
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
            'nombre' => 'required|max:120',
            
        ]);


        $acceso = Acceso::find($id);
        $acceso->nombre = $request->nombre;


        if($acceso->update()){
            return redirect("/admin/accesos");
        }else{
            return view("acceso.create",["acceso" => $acceso]);
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
        $acceso = Acceso::find($id);
        $acceso->delete();
        return redirect('admin/accesos');
    }
}
