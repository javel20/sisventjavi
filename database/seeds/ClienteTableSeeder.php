<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert(['DNI'=>'65734312','nombre' =>'jose','apellidopat'=>'de la cruz','apellidomat'=>'diaz','direccion'=>'tacna','celular'=>'987475736','operador'=>'Movistar','email'=>'qwe@gmail.com','descripcion'=>'','estado'=>'Activo']);
        DB::table('clientes')->insert(['DNI'=>'87686675','nombre' =>'juan','apellidopat'=>'mozo','apellidomat'=>'parraguez','direccion'=>'francisco','celular'=>'984756348','operador'=>'Bitel','email'=>'zxc@gmail.com','descripcion'=>'wefwef','estado'=>'Activo']);
    }
}
