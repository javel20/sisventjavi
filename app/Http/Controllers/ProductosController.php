<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Producto;
use sisventjavi\Categoria;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::Search($request)->paginate(10);
        $productos->each(function($productos){
            $productos->categoria;
        });
        //dd($productos);

        return view('admin.producto.index')->with([
            'productos' => $productos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('estado','activo')->pluck('nombre','id');
        $producto = new Producto;
        return view('admin.producto.create')->with([
            'categorias' => $categorias,
            'producto' =>$producto,
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
            'codigo' => 'required|max:20',
            'nombre' => 'required|max:100',
            'imagen' => 'image|mimes:jpg,png',
            'descripcion' => 'max:250',

            
        ]);
        
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'product_' . time() . '.' . $file->getClientOriginalExtension();//nombre de la imagen
            $path = public_path() . '/images/productos/';//enlace donde piensa guardar las imagenes
            $file->move($path, $name);//movimiento de las imagenes
        }
        
        
        $producto = new Producto($request->all());
        //dd($request->all());

        $producto->categoria_id = $request->categoria;
        $producto->imagen = $name;
        //dd($producto);

        if($producto->save()){
            return redirect("/admin/productos");
        }else{
            return view("/productos.create",["trabajador" => $trabajador]);
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
        $producto = Producto::find($id);
        $categorias = Categoria::all()->pluck('nombre','id');
        
            return view('admin.producto.edit')->with([
                'producto' => $producto,
                'categorias' => $categorias,
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
            'codigo' => 'required|max:20',
            'nombre' => 'required|max:100',
            'estado' => 'required',
            'imagen' => 'require|image|mimes:jpg,png',
            'descripcion' => 'max:250',

            
        ]);

        $producto = Producto::find($id);

        
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'product_' . time() . '.' . $file->getClientOriginalExtension();//nombre de la imagen
            $path = public_path() . '/images/productos/';//enlace donde piensa guardar las imagenes
            $file->move($path, $name);//movimiento de las imagenes
        }

        $producto->fill($request->all());
        $producto->categoria_id = $request->categoria;
        $producto->imagen = $name;

        //$producto->imagen = $name;
        //dd($request->all());

        if($producto->update()){
            return redirect("/admin/productos");
        }else{
            return view("/productos.edit",["producto" => $producto]);
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
        $producto = Producto::find($id);  
        $producto->delete();
        //producto::Destroy($id)
        return redirect('/admin/productos');
    }
}
