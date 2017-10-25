<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Proveedor;

class ProveedorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedors = Proveedor::Search($request)->paginate(10);
        return view('admin.proveedor.index')->with([
            'proveedors' => $proveedors,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = new Proveedor;
        return view('admin.proveedor.create')->with([
            'proveedor' => $proveedor,
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
            'RUC' => 'max:12',
            'nombreempresa' => 'required|max:100',
            'direccion' => 'required|max:80',
            'nombrecontacto' => 'required|max:80',
            'apellidopat' => 'required|max:80',
            'apellidomat' => 'required|max:80',
            'celularcont' => 'required|max:9',
            'operador' => 'required|max:80',
            'email' => 'required|max:80',
            'descripcion' => 'max:250',

            
        ]);
        
        $proveedor = new Proveedor($request->all());
        $proveedor->RUC = $request->RUC;
        $proveedor->nombre_empresa = $request->nombreempresa;
        $proveedor->nombre_contacto = $request->nombrecontacto;
        $proveedor->celular_contacto = $request->celularcont;

        //dd($request->all());
        if($proveedor->save()){
            return redirect("/admin/proveedor");
        }else{
            return view("/proveedor.create",["proveedors" => $proveedors]);
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
        $proveedor = Proveedor::find($id);
        return view('admin.proveedor.edit')->with([
            'proveedor' => $proveedor,
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
            'RUC' => 'max:12',
            'nombreempresa' => 'required|max:100',
            'direccion' => 'required|max:80',
            'nombrecontacto' => 'required|max:80',
            'apellidopat' => 'required|max:80',
            'apellidomat' => 'required|max:80',
            'celularcont' => 'required|max:9',
            'operador' => 'required|max:80',
            'email' => 'required|max:80',
            'descripcion' => 'max:250',

            
        ]);
        
        $proveedor = Proveedor::find($id);
        $proveedor->RUC = $request->RUC;
        $proveedor->nombre_empresa = $request->nombreempresa;
        $proveedor->direccion = $request->direccion;
        $proveedor->nombre_contacto = $request->nombrecontacto;
        $proveedor->apellidopat = $request->apellidopat;
        $proveedor->apellidomat = $request->apellidomat;
        $proveedor->celular_contacto = $request->celularcont;
        $proveedor->operador = $request->operador;
        $proveedor->email = $request->email;
        $proveedor->estado = $request->estado;
        $proveedor->descripcion = $request->descripcion;

        //dd($request->all());
        if($proveedor->save()){
            return redirect("/admin/proveedor");
        }else{
            return view("/proveedor.edit",["proveedors" => $proveedors]);
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
        $proveedor = Proveedor::find($id);  
        $proveedor->delete();
        //proveedor::Destroy($id)
        return redirect('/admin/proveedor');
    }
}
