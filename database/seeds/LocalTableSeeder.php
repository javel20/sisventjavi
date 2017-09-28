<?php

use Illuminate\Database\Seeder;

class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locals')->insert(['nombre' =>'almacen','direccion' =>'b.leguia','telefono' =>'2867543','estado'=>'activo']);
    }
}
