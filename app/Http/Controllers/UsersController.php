<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use sisventjavi\Http\Requests;
use sisventjavi\Http\Controllers\Controller;
use sisventjavi\TipoTrabajador;
use sisventjavi\User;
use sisventjavi\Acceso;
use sisventjavi\Local;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::Search($request)->paginate(10);
        $users->each(function($users){
            $users->accesos;
            $users->tipoTrabajador;
            $users->local;
        });
        //dd($users);

        return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotrabs = TipoTrabajador::all()->pluck('nombre','id');
        $accesos = Acceso::all()->pluck('nombre','id');
        $locals = Local::all()->pluck('nombre','id');
        //dd($accesos)->first();
        return view('admin.user.create')->with([
            'tipotrabs' =>$tipotrabs,
            'accesos' =>$accesos,
            'locals' =>$locals,

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
            'email' => 'required',
            'password' =>'required',
            'nombre' =>'required|max:80',
            'apellidopat' =>'required|max:80',
            'apellidomat' =>'required|max:80',
            'DNI' =>'required|max:8',
            'direccion' =>'required|max:80',
            'celular' =>'required|max:9',
            'operador' =>'required',
            'tipotrabajador' =>'required',
            'local' =>'required',
            //'password' =>'required',
            //'trabajador' => 'required',
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->tipo_trabajador_id = $request->tipotrabajador;
        $user->local_id = $request->local;
        //dd($user);
        //dd($request->all());

        
        
        if($user->save()){

            $user->accesos()->sync($request->accesos);

            return redirect("admin/users");
        }else{
            return view("users.create",["user" => $user]);
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
        $user = User::find($id);
        $tipotrabs = TipoTrabajador::all()->pluck('nombre','id');
        $accesos = Acceso::all()->pluck('nombre','id');
        $locals = Local::all()->pluck('nombre','id');
        $my_users = $user->accesos->pluck('id')->ToArray();
        return view('admin.user.edit')->with([
            'user' => $user,
            'accesos' => $accesos,
            'tipotrabs' => $tipotrabs,
            'locals' => $locals,
            'my_users' => $my_users
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

            'email' => 'required',
            //'password' =>'required',
            'nombre' =>'required|max:80',
            'apellidopat' =>'required|max:80',
            'apellidomat' =>'required|max:80',
            'DNI' =>'required|max:8',
            'direccion' =>'required|max:80',
            'celular' =>'required|max:9',
            'operador' =>'required',
            'tipotrabajador' =>'required',
            'accesos' => 'required',
            'local' =>'required',
            'estado' =>'required',
            'descripcion' =>'max:250',

        ]);

        $user = User::find($id);    
        $user->password = bcrypt($request->password);
        $user->fill($request->all());
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->tipo_trabajador_id = $request->tipotrabajador;
        $user->local_id = $request->local;
        //dd($user);
        //dd($request->all());
        if($user->update()){

            $user->accesos()->sync($request->accesos);

            return redirect("admin/users");
        }else{
            return view("users.edit",["user" => $user]);
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
        $users = User::find($id);  
        $users->delete();
        //users::Destroy($id);
        return redirect('admin/users');
    }
}
