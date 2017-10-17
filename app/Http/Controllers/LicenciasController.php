<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

//use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Http\Requests;
use sisventjavi\Licencia;
use sisventjavi\Trabajador;

class LicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $licencias = Licencia::Search($request)->paginate(10);
        $licencias->each(function($licencias){
            $licencias->trabajador;

        });
        //dd($licencias);

        return view('admin.licencia.index')->with([
            'licencias' => $licencias,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajadors = Trabajador::where('estado','activo')->pluck('nombre','id');
        $licencia = new licencia;
        return view('admin.licencia.create')->with([
            'trabajadors' => $trabajadors,
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
            'fechai' => 'required|max:10',
            'fechaf' => 'required|max:10',
            'descripcion' => 'max:250',
            'trabajador' => 'required',

        ]);
        
        $licencia = new licencia($request->all());
        //dd($request->all());

        $licencia->trabajador_id = $request->trabajador;
        //dd($licencia);

        if($licencia->save()){
            return redirect("admin/licencias");
        }else{
            return view("licencias.create",["trabajador" => $trabajador]);
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
        $licencia = licencia::find($id);
        $trabajadors = Trabajador::all()->pluck('nombre','id');
        
            return view('admin.licencia.edit')->with([
                'licencia' => $licencia,
                'trabajadors' => $trabajadors,
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
            'fechai' => 'required|max:10',
            'fechaf' => 'required|max:10',
            'estado' => 'required',
            'descripcion' => 'max:250',
            'trabajador' => 'required',
            
        ]);

        $licencia = licencia::find($id);

        $licencia->fill($request->all());
        $licencia->trabajador_id = $request->trabajador;

        //$licencia->imagen = $name;
        //dd($request->all());

        if($licencia->update()){
            return redirect("admin/licencias");
        }else{
            return view("licencias.edit",["licencia" => $licencia]);
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
        $licencia = licencia::find($id);  
        $licencia->delete();
        //licencia::Destroy($id)
        return redirect('admin/licencias');
    }
}
