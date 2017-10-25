<?php

use Illuminate\Database\Seeder;

class TipoTrabajadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_trabajadors')->insert(['nombre' =>'root','descripcion'=>'administrador-dueño']);
    }
}
