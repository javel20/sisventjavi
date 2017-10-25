<?php

use Illuminate\Database\Seeder;

class AccesoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accesos')->insert(['nombre' =>'Categorias']);
        DB::table('accesos')->insert(['nombre' =>'Productos']);
        DB::table('accesos')->insert(['nombre' =>'Stock-Presentacion']);
        DB::table('accesos')->insert(['nombre' =>'Compra']);
        DB::table('accesos')->insert(['nombre' =>'Venta']);
        DB::table('accesos')->insert(['nombre' =>'Proveedor']);
        DB::table('accesos')->insert(['nombre' =>'Cliente']);
        DB::table('accesos')->insert(['nombre' =>'Users']);
        DB::table('accesos')->insert(['nombre' =>'Licencias']);
        DB::table('accesos')->insert(['nombre' =>'Tipo Trabajadores']);
        DB::table('accesos')->insert(['nombre' =>'Locales']);
    }
}
