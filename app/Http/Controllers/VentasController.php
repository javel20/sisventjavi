<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Venta;
use sisventjavi\DetalleVenta;
use sisventjavi\User;
use sisventjavi\Cliente;
use sisventjavi\StockPresent;
use sisventjavi\Producto;
use DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas = Venta::Search($request)->paginate(10);
        $ventas->each(function($ventas){
            $ventas->user;
            $ventas->cliente;
            //$ventas->detalleventa;
        });
        /*$detalleventa = Detalleventa::all();
        $detalleventa->each(function($detalleventa){
            $detalleventa->venta;
            $detalleventa->stockpresent;
            //$ventas->detalleventa;
        });
        dd($detalleventa);
        */
        //dd($ventas);

        return view('admin.venta.index')->with([
            'ventas' => $ventas,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all()->pluck('nombre','id');
        $stockpresents = StockPresent::all()->pluck('nombre','id');
        $productos = Producto::all()->pluck('nombre','id');
        
        //$prods = StockPresent::all();
        //dd($stockpresents[0]->stockreal);
        $venta = new Venta;
        //dd($stockpresents);
        return view('admin.venta.create')->with([
            'venta' => $venta,
            'clientes' =>$clientes,
            'stockpresents' =>$stockpresents,
            'productos' =>$productos,
            //'prods' =>$prods,
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
            'codigo' => 'required',
            'fechaventa' => 'required',
            'totalventa' => 'required',
            'descripcion' => 'max:250',
            'cliente' => 'required',
            //'producto' => 'required',
        
        ]);
        //dd($stockpresent);

        try{
            DB::beginTransaction();

                $venta = new Venta($request->all());
                $venta->cliente_id = $request->cliente;
                $venta->fechaventa = $request->fechaventa;
                $venta->codigo = $request->codigo;
                $venta->user_id = \Auth::user()->id;
                //dd($request);
                $venta->save();
                
                $cantidad = $request->cantidad;
                //$fechaven = $request->fechaven;
                $preciounitario = $request->preciounitario;
                $preciototal = $request->preciototal;
                //$venta_id = $request->codigo;
                $stockpresent_id = $request->stockpresent;

                $insertedId= $venta->id;
                //dd($insertedId);
                
                //dd($request);
                $cont=0;
                
                while($cont < count($stockpresent_id)){
                    //dd(count($stockpresent_id));
                    $detalle_venta = new DetalleVenta();
                    $detalle_venta->cantidad = $cantidad[$cont];
                    //$detalle_venta->fechavenc = $fechaven[$cont];
                    $detalle_venta->preciounitario = $preciounitario[$cont];
                    $detalle_venta->preciototal = $preciototal[$cont];
                    $detalle_venta->venta_id = $insertedId;
                    $detalle_venta->stockpresent_id = $stockpresent_id[$cont];
                    //dd($fechaven[$cont]);
                    //dd($stockpresent_id[$cont]);
                    //dd($detalle_venta);
                    $detalle_venta->save();
                    
                    $stockpresent = Stockpresent::find($stockpresent_id[$cont]);
                    $postst=$stockpresent->stockreal;
                    //dd($postst);
                    //$poststockreal=$stockpresents[$detalle_venta->stockpresent_id]->stockreal;
                    $stockpresent->stockreal = $postst-$cantidad[$cont];
                    //dd($stockpresent->stockreal);
                    //$stockpresent->fill($request->all());
                    //$stockpresents->stockreal+$cantidad[$cont];
                    //dd($stockpresent->stockreal);
                    //$fechaven[$cont];
                    $stockpresent->update();
                    
                    $cont=$cont+1;
                    
                }

            DB::commit();
        }catch(\Exception $e){
            
            DB::rollBack();
    
        }
        return redirect("/admin/ventas");
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
