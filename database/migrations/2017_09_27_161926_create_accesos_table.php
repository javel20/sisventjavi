<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100)->unique();
            $table->timestamps();
        });

            Schema::create('acceso_user', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                
                $table->integer('acceso_id')->unsigned();
                $table->foreign('acceso_id')->references('id')->on('accesos');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acceso_user');
        Schema::dropIfExists('accesos');
    }
}
