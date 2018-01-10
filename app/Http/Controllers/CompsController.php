<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Comp;
use sisventjavi\DetalleComp;
use sisventjavi\Proveedor;
use sisventjavi\User;
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
        $compras = Comp::Search($request)->where('estado','=','Comprado')->paginate(10);
        $compras->each(function($compras){
            $compras->user;
            $compras->proveedor;
            //$compras->detallecomp;
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
        
        //$prods = StockPresent::all();
        //dd($stockpresents[0]->stockreal);
        $compra = new Comp;
        //dd($stockpresents);
        return view('admin.compra.create')->with([
            'compra' => $compra,
            'proveedors' =>$proveedors,
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
            'fechacompra' => 'required',
            'totalcompra' => 'required',
            'descripcion' => 'max:250',
            'proveedor' => 'required',
            //'producto' => 'required',
        
        ]);
        //dd($stockpresent);

        try{
            DB::beginTransaction();

                $comp = new Comp($request->all());
                $comp->proveedor_id = $request->proveedor;
                $comp->codigo = $request->codigo;
                $comp->user_id = \Auth::user()->id;
                //dd($comp);
                $comp->save();
                
                $cantidad = $request->cantidad;
                $fechaven = $request->fechaven;
                $costounitario = $request->costounitario;
                $costototal = $request->costototal;
                $comp_id = $request->codigo;
                $stockpresent_id = $request->stockpresent;

                $insertedId= $comp->id;
                //dd($insertedId+1);
                
                //dd($request);
                $cont=0;
                
                while($cont < count($stockpresent_id)){
                    //dd(count($stockpresent_id));
                    $detalle_comp = new DetalleComp();
                    $detalle_comp->cantidad = $cantidad[$cont];
                    $detalle_comp->fechavenc = $fechaven[$cont];
                    $detalle_comp->costounitario = $costounitario[$cont];
                    $detalle_comp->costototal = $costototal[$cont];
                    $detalle_comp->comp_id = $insertedId;
                    $detalle_comp->stockpresent_id = $stockpresent_id[$cont];
                    //dd($fechaven[$cont]);
                    //dd($stockpresent_id[$cont]);
                    //dd($detalle_comp);
                    $detalle_comp->save();
                    
                    $stockpresent = Stockpresent::find($stockpresent_id[$cont]);
                    $postst=$stockpresent->stockreal;
                    //dd($postst);
                    //$poststockreal=$stockpresents[$detalle_comp->stockpresent_id]->stockreal;
                    $stockpresent->stockreal = $postst+$cantidad[$cont];
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
            //'estado' => 'required',
            
        ]);
        //dd($request->all());
        $compra = Comp::find($id);
        $compra->fill($request->all());
        $compra->proveedor_id = $request->proveedor;
        $compra->user_id = \Auth::user()->id;

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
    public function delete(Request $request, $id)
    {
         try{
            DB::beginTransaction();
 
            $comp= Comp::find($id);
            $comp->estado = "Eliminado";
            $comp->update();

            //$detalle_comp = $comp->detallecomp()->where('comp_id','=',$id)->get();
            //dd($detalle_comp->pluck('cantidad','id'));
            $detalle_comp2 = $comp->detallecomp()->where('comp_id','=',$id)->get();
            $detallecomp = $detalle_comp2->pluck('cantidad','stockpresent_id')->all();
            //dd($detallecomp);
                foreach($detalle_comp2 as $dc){
                    $dc;
                    //var_dump($dc->id);
                    //var_dump($dc->estado);
                    $dc->estado= "Eliminado";
                    $dc->update();
                    $st_id=$dc->stockpresent_id;

                    $cont=0;
                }
                    //dd($detallecomp);
                    foreach($detallecomp as $dc2 => $value){
                        //var_dump($dc2);
                        //dd($dc2);
                        $cantidad[$cont]=$detallecomp[$dc2];
                        //dd($cantidad[$cont]);

                        $stockpresent = Stockpresent::find($dc2);
                       // $detalle_comp->cantidad = $cantidad[$cont];
                        //dd($stockpresent);
                        
                        $postst=$stockpresent->stockreal;
                        //dd($cantidad);
                        $stockpresent->stockreal = $postst-$cantidad[$cont];
                        //dd($stockpresent->stockreal);

                        $stockpresent->update();
                        
                        $cont=$cont+1;
                    
                      //  }
                }
                //dd($dc);

            

             DB::commit();
        }catch(\Exception $e){
            
            DB::rollBack();
    
        } 

        return redirect('/admin/compras');
    }
}
