<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Cliente;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::Search($request)->paginate(10);
        return view('admin.cliente.index')->with([
            'clientes' => $clientes,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente;
        return view('admin.cliente.create')->with([
            'cliente' => $cliente,
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
            'DNI' => 'max:8',
            'RUC' => 'max:12',
            'nombre' => 'required|max:80',
            'apellidopat' => 'required|max:80',
            'apellidomat' => 'required|max:80',
            'direccion' => 'required|max:80',
            'celular' => 'required|max:9',
            'operador' => 'required|max:80',
            'email' => 'required|max:80',
            'descripcion' => 'max:250',

            
        ]);
        
        $cliente = new Cliente($request->all());

        if($request->DNI){
            $cliente->RUC = null;
        }else{
            $cliente->DNI = null;
        }
        //dd($request->all());
        if($cliente->save()){
            return redirect("/admin/clientes");
        }else{
            return view("/clientes.create",["clientes" => $clientes]);
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
        $cliente = Cliente::find($id);
        return view('admin.cliente.edit')->with([
            'cliente' => $cliente,
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
            'DNI' => 'max:8',
            'RUC' => 'max:12',
            'nombre' => 'required|max:80',
            'apellidopat' => 'required|max:80',
            'apellidomat' => 'required|max:80',
            'direccion' => 'required|max:80',
            'celular' => 'required|max:9',
            'operador' => 'required|max:80',
            'email' => 'required|max:80',
            'estado' => 'required|max:80',
            'descripcion' => 'max:250',

        ]);

        $cliente = Cliente::find($id);
        //dd($cliente);
        if($request->DNI){
            $cliente->DNI = $request->DNI;
            $request->RUC = null;
        }else{
            $cliente->RUC = $request->RUC;
            $request->DNI = null;
        }


        $cliente->nombre = $request->nombre;
        $cliente->apellidopat = $request->apellidopat;
        $cliente->apellidomat = $request->apellidomat;
        $cliente->direccion = $request->direccion;
        $cliente->celular = $request->celular;
        $cliente->operador = $request->operador;
        $cliente->email = $request->email;
        $cliente->estado = $request->estado;
        $cliente->descripcion = $request->descripcion;

        if($cliente->update()){
            return redirect("/admin/clientes");
        }else{
            return view("clientes.edit",["cliente" => $cliente]);
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
        $cliente = Cliente::find($id);  
        $cliente->delete();
        //cliente::Destroy($id)
        return redirect('/admin/clientes');
    }
}
