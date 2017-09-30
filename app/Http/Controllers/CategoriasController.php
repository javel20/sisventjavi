<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::Search($request)->paginate(10);
        return view('admin.categoria.index')->with([
            'categorias' => $categorias,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria;
        return view('admin.categoria.create')->with([
            'categoria' => $categoria,
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
            'nombre' => 'required|unique:categorias|max:120',
            'descripcion' => 'max:250',
            
        ]);


        $categoria = new Categoria($request->all());
        $categoria->save();

        if($categoria->save()){
            return redirect("/admin/categorias");
        }else{
            return view("categorias.create",["categoria" => $categoria]);
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
        $categoria = Categoria::find($id);
        return view('admin.categoria.edit')->with([
            'categoria' => $categoria,
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
            'descripcion' => 'max:250',
            'estado' => 'required',
            
        ]);


        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;


        if($categoria->update()){
            return redirect("/admin/categorias");
        }else{
            return view("categoria.create",["categoria" => $categoria]);
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
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect('admin/categorias');
    }
}
