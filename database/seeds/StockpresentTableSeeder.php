<?php

use Illuminate\Database\Seeder;

class StockpresentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'200','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precioventa'=>'2','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'150','nombre' =>'tabletas 500mg','porc_ganancia'=>'20','precioventa'=>'4','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'30','stockreal'=>'600','nombre' =>'ampolla 500ml','porc_ganancia'=>'20','precioventa'=>'8','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'30','stockreal'=>'500','nombre' =>'ampolla 100ml','porc_ganancia'=>'20','precioventa'=>'10','descripcion'=>'','estado'=>'Activo','producto_id'=>'2']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precioventa'=>'2','descripcion'=>'','estado'=>'Activo','producto_id'=>'2']);
        DB::table('stock_present')->insert(['stockmin'=>'200','stockreal'=>'400','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precioventa'=>'2','descripcion'=>'','estado'=>'Activo','producto_id'=>'3']);
        DB::table('stock_present')->insert(['stockmin'=>'200','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precioventa'=>'2','descripcion'=>'','estado'=>'Activo','producto_id'=>'4']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'200','nombre' =>'tabletas 300mg','porc_ganancia'=>'20','precioventa'=>'3','descripcion'=>'','estado'=>'Activo','producto_id'=>'4']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precioventa'=>'2','descripcion'=>'','estado'=>'Activo','producto_id'=>'5']);
    }
}
