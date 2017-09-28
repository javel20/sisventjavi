<?php

use Illuminate\Database\Seeder;

class TrabajadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trabajadors')->insert(['nombre' =>'javier','apellidopat'=>'elias','apellidomat'=>'balladares','DNI'=>'45615420','direccion'=>'tacna','celular'=>'957803813','operador'=>'movistar','estado'=>'activo','descripcion'=>'admi-dueño','tipo_trabajador_id'=>'1','local_id'=>'1']);
    }
}
