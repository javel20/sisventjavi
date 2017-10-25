<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RUC',12);
            $table->string('nombre_empresa',150);
            $table->string('direccion',150);
            $table->string('nombre_contacto',80);
            $table->string('apellidopat',80);
            $table->string('apellidomat',80);
            $table->string('celular_contacto',9);
            $table->string('operador',80);
            $table->string('email',100)->nullable();
            $table->string('estado',80)->default('Activo');
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
        Schema::dropIfExists('proveedors');
    }
}
