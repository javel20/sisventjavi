<?php

use Illuminate\Database\Seeder;

class AccesoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acceso_user')->insert(['acceso_id' =>'1','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'2','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'3','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'4','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'5','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'6','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'7','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'8','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'9','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'10','user_id'=>'1']);
        DB::table('acceso_user')->insert(['acceso_id' =>'11','user_id'=>'1']);
        
    }
}
