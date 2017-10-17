<?php

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert(['codigo'=>'123123','nombre' =>'Amoxil','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'1']);
        DB::table('productos')->insert(['codigo'=>'321321','nombre' =>'Amoxil','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'1']);
        DB::table('productos')->insert(['codigo'=>'232323','nombre' =>'Amoxil','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'1']);
        DB::table('productos')->insert(['codigo'=>'333333','nombre' =>'Penisilina','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'2']);
        DB::table('productos')->insert(['codigo'=>'343434','nombre' =>'Ibupofreno','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'2']);
        DB::table('productos')->insert(['codigo'=>'454545','nombre' =>'Naproxeno','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'3']);
        DB::table('productos')->insert(['codigo'=>'545454','nombre' =>'Panadol','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'4']);
        DB::table('productos')->insert(['codigo'=>'565656','nombre' =>'Cero Dolor','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'4']);
        //DB::table('productos')->insert(['codigo'=>'342424','nombre' =>'tabletas 100mg','imagen'=>'qwe123.png','descripcion'=>'','estado'=>'Activo','categoria_id'=>'5']);
        
    }
}
