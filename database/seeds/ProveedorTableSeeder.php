<?php

use Illuminate\Database\Seeder;

class ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedors')->insert(['RUC'=>'657357684737','nombre_empresa' =>'recursos tienda','direccion' =>'b.leguia','nombre_contacto'=>'juan','apellidopat'=>'perez','apellidomat'=>'huaman','celular_contacto' =>'928675431','operador'=>'Movistar','email'=>'qwe@gmail.com','estado'=>'activo']);
        DB::table('proveedors')->insert(['RUC'=>'543545345433','nombre_empresa' =>'ExtShop','direccion' =>'nicanor','nombre_contacto'=>'luis','apellidopat'=>'altamirano','apellidomat'=>'huaman','celular_contacto' =>'945633421','operador'=>'Claro','email'=>'asd@gmail.com','estado'=>'activo']);
    }
}
