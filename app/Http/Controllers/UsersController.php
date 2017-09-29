<?php

namespace sisventjavi\Http\Controllers;

use Illuminate\Http\Request;
use sisventjavi\Http\Requests;
use sisventjavi\Http\Controllers\Controller;
use sisventjavi\Trabajador;
use sisventjavi\User;

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
            $users->trabajador;
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
        $trabs = Trabajador::all()->pluck('nombre','id');
        return view('admin.user.create')->with([
            'trabs' =>$trabs,
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
            'password' =>'required',
            'email' => 'required',
            'trabajador' => 'required',
        ]);

        $user= new User($request->all());
        $user->password = bcrypt($request->password);
        $user->trabajador_id = $request->trabajador;
        //dd($user);
        //dd($request->all());
        if($user->save()){
            return redirect("/admin/users");
        }else{
            return view("/users.create",["user" => $user]);
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
        $trabs = Trabajador::all()->pluck('nombre','id');
        return view('admin.user.edit')->with([
            'user' => $user,
            'trabs' => $trabs,
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
            'estado' => 'required',
            'trabajador' => 'required',
        ]);

        $user = User::find($id);    
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->trabajador_id = $request->trabajador;
        $user->estado = $request->estado;
        //dd($user);
        //dd($request->all());
        if($user->update()){
            return redirect("/admin/users");
        }else{
            return view("/users.edit",["user" => $user]);
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
        //
    }
}
