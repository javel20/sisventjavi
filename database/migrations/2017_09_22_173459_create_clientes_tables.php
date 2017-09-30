<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('DNI',8)->nullable();
            $table->string('RUC',12)->nullable();
            $table->string('nombre',100);
            $table->string('apellidopat',100);
            $table->string('apellidomat',100);
            $table->string('direccion',100);
            $table->string('celular',9);
            $table->string('operador',50);
            $table->string('email',100)->nullable();
            $table->string('estado',80)->default('activo');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
