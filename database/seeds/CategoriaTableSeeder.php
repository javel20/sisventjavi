<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre' =>'antibioticos','descripcion'=>'','estado'=>'Activo']);
        DB::table('categorias')->insert(['nombre' =>'analgesicos','descripcion'=>'','estado'=>'Activo']);
        DB::table('categorias')->insert(['nombre' =>'antipireticos','descripcion'=>'','estado'=>'Activo']);
        DB::table('categorias')->insert(['nombre' =>'antistaminicos','descripcion'=>'','estado'=>'Activo']);

    }
}
