<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\StockPresent;
use sisventjavi\Producto;

class StockPresentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stockpresents = StockPresent::Search($request)->paginate(10);
        $stockpresents->each(function($stockpresents){
            $stockpresents->producto;
        });
        //dd($stockpresent);

        return view('admin.stockpresent.index')->with([
            'stockpresents' => $stockpresents,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all()->pluck('nombre','id');
        $stockpresent = new stockpresent;
        return view('admin.stockpresent.create')->with([
            'stockpresent' => $stockpresent,
            'productos' =>$productos,
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
            'stockmin' => 'required|max:10',
            'stockreal' => 'required|max:10',
            'nombre' => 'required|max:80',
            'porc_ganancia' => 'required|numeric',
            'precioventa'=>'required|numeric',
            'descripcion' => 'max:250',
            'producto' => 'required',
            
        ]);
        //dd($request->all());
        $stockpresent = new StockPresent($request->all());
        $stockpresent->producto_id = $request->producto;
        $stockpresent->porc_ganancia = $request->porc_ganancia;

        if($stockpresent->save()){
            return redirect("/admin/stockpresent");
        }else{
            return view("/stockpresent.create",["stockpresent" => $stockpresent]);
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
        $stockpresent = StockPresent::find($id);
        
        $productos = Producto::all()->pluck('nombre','id');

        return view('admin.stockpresent.edit')->with([
            'stockpresent' => $stockpresent,
            'productos' => $productos,

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
            'stockmin' => 'required|max:10',
            'stockreal' => 'required|max:10',
            'nombre' => 'required|max:80',
            'porc_ganancia' => 'required|numeric',
            'precioventa'=>'required|numeric',
            'estado' => 'required|max:80',
            'descripcion' => 'max:250',
            'estado' => 'required|max:100',
            'producto' => 'required',
            
        ]);
        //dd($request->all());
        $stockpresent = StockPresent::find($id);
        $stockpresent->fill($request->all());
        $stockpresent->producto_id = $request->producto;

        if($stockpresent->save()){
            return redirect("/admin/stockpresent");
        }else{
            return view("/stockpresent.create",["stockpresent" => $stockpresent]);
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
        $stockpresent = StockPresent::find($id);  
        $stockpresent->delete();
        //stockpresent::Destroy($id)
        return redirect('/admin/stockpresent');
    }
}
