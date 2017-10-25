<?php

namespace sisventjavi\Http\Middleware;

use Closure;

class AccesoMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$perm)
    {
        // dd($request->session("accesos"));
        // dd($request);
        $ban='0';
        if(session("accesos")){
            foreach(session("accesos") as $acc){
                    // dd($acc);
                if($acc->id == $perm){
                    $ban=+1;
                    //acceder al id desde acc
                //  dd("asdasd");
                return $next($request);
                }
                
            }
        }
        
            if($ban==0){
                // dd("asdasd");

            return redirect("/admin");
            }
    }

}

