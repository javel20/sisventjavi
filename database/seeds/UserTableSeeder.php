<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['email' =>'javier@gmail.com','password' =>bcrypt('javier'),'nombre' =>'javier','apellidopat'=>'elias','apellidomat'=>'balladares','DNI'=>'45615420','direccion'=>'tacna','celular'=>'957803813','operador'=>'movistar','estado'=>'Activo','descripcion'=>'admi-dueño','tipo_trabajador_id'=>'1','local_id'=>'1']);
    }
}
