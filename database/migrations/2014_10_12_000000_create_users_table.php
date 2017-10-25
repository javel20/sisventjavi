<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('nombre',100);
            $table->string('apellidopat',100);
            $table->string('apellidomat',100);
            $table->string('DNI',8)->unique();
            $table->string('direccion',100);
            $table->string('celular',9);
            $table->string('operador',80);
            $table->string('estado',80)->default('Activo');
            $table->text('descripcion')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->integer('tipo_trabajador_id')->unsigned();
            $table->foreign('tipo_trabajador_id')->references('id')->on('tipo_trabajadors');
            $table->integer('local_id')->unsigned();
            $table->foreign('local_id')->references('id')->on('locals');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
