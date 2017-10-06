<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Comp;
use sisventjavi\DetalleComp;
use sisventjavi\Proveedor;
use sisventjavi\Trabajador;
use sisventjavi\StockPresent;
use sisventjavi\Producto;

use DB;

class CompsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $compras = Comp::Search($request)->paginate(10);
        $compras->each(function($compras){
            $compras->trabajador;
            $compras->proveedor;
            $compras->detallecomp;
        });
        /*$detallecomp = DetalleComp::all();
        $detallecomp->each(function($detallecomp){
            $detallecomp->comp;
            $detallecomp->stockpresent;
            //$compras->detallecomp;
        });
        dd($detallecomp);
        */
        //dd($compras);

        return view('admin.compra.index')->with([
            'compras' => $compras,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = Proveedor::all()->pluck('nombre_empresa','id');
        $stockpresents = StockPresent::all()->pluck('nombre','id');
        $productos = Producto::all()->pluck('nombre','id');
        $compra = new Comp;
        //dd($stockpresents);
        return view('admin.compra.create')->with([
            'compra' => $compra,
            'proveedors' =>$proveedors,
            'stockpresents' =>$stockpresents,
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
            'codigo' => 'required|max:100',
            'fechacompra' => 'required|max:100',
            'totalcompra' => 'required|max:100',
            'descripcion' => 'max:250',
            'proveedor' => 'required',
            //'producto' => 'required',
            
        ]);
        //dd($request->all());

        try{
            DB::beginTransaction();

                $comp = new Comp($request->all());
                $comp->proveedor_id = $request->proveedor;
                $comp->trabajador_id = \Auth::user()->id;
                //dd($comp);
                $comp->save();
/*
                $cantidad = $request->cantidad;
                $fechaven = $request->fechaven;
                $costounitario = $request->costounitario;
                $costototal = $request->costototal;
                $comp_id = $request->compra;
                $stockpresent_id = $request->stockpresent;

                    $cont=0;

                    while($cont < count($stockpresent_id)){
                        $detalle_comp = new Comp();
                        $detalle_comp->cantidad = $cantidad[$cont];
                        $detalle_comp->fechaven = $fechaven[$cont];
                        $detalle_comp->costounitario = $costounitario[$cont];
                        $detalle_comp->costototal = $costototal[$cont];
                        $detalle_comp->comp_id = $comp_id[$cont];
                        $detalle_comp->stockpresent_id = $stockpresent_id[$cont];
                        $detalle_comp->save();
                        $cont=$cont+1;
                    }

*/



            DB::commit();
        }catch(\Exception $e){
            
            DB::rollBack();
    
        }
    return redirect("/admin/compras");
        
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
        $compra = Comp::find($id);

        $proveedors = Proveedor::all()->pluck('nombre_empresa','id');
        $stockpresents = StockPresent::all()->pluck('nombre','id');
        $productos = Producto::all()->pluck('nombre','id');
        //dd($stockpresents);
        return view('admin.compra.edit')->with([
            'compra' => $compra,
            'proveedors' =>$proveedors,
            'stockpresents' =>$stockpresents,
            'productos' =>$productos,
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
            'codigo' => 'required|max:100',
            'fechacompra' => 'required|max:100',
            'totalcompra' => 'required|max:100',
            'descripcion' => 'max:250',
            'proveedor' => 'required',
            //'producto' => 'required',
            'estado' => 'required',
            
        ]);
        //dd($request->all());
        $compra = Comp::find($id);
        $compra->fill($request->all());
        $compra->proveedor_id = $request->proveedor;
        $compra->trabajador_id = \Auth::user()->id;

        if($compra->update()){
            return redirect("admin/compras");
        }else{
            return view("compras.edit",["compra" => $compra]);
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
        $compra= Comp::find($id);  
        $compra->delete();
        //compra::Destroy($id)
        return redirect('/admin/compras');
    }
}
