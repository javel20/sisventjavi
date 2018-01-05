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
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'200','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'150','nombre' =>'tabletas 500mg','porc_ganancia'=>'20','precio'=>'1.5','precioventa'=>'30','ganancia'=>'28.5','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'30','stockreal'=>'600','nombre' =>'ampolla 500ml','porc_ganancia'=>'20','precio'=>'3','precioventa'=>'60','ganancia'=>'57','descripcion'=>'','estado'=>'Activo','producto_id'=>'1']);
        DB::table('stock_present')->insert(['stockmin'=>'30','stockreal'=>'500','nombre' =>'ampolla 100ml','porc_ganancia'=>'20','precio'=>'4','precioventa'=>'80','ganancia'=>'76','descripcion'=>'','estado'=>'Activo','producto_id'=>'2']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'2']);
        DB::table('stock_present')->insert(['stockmin'=>'200','stockreal'=>'400','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'3']);
        DB::table('stock_present')->insert(['stockmin'=>'200','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'4']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'200','nombre' =>'tabletas 300mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'4']);
        DB::table('stock_present')->insert(['stockmin'=>'100','stockreal'=>'300','nombre' =>'tabletas 100mg','porc_ganancia'=>'20','precio'=>'2','precioventa'=>'40','ganancia'=>'38','descripcion'=>'','estado'=>'Activo','producto_id'=>'5']);
    }
}
