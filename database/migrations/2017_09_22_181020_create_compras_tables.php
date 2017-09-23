<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',12)->unique();
            $table->string('fechacompra');
            $table->text('descripcion');
            $table->string('estado')->default('comprado');
            $table->double('totalcompra',8,2);
            $table->timestamps();

            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
        });

            Schema::create('detalle_compra', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cantidad');
                $table->string('fechavenc');
                $table->double('costounitario',8,2);
                $table->double('costototal',8,2);
                $table->timestamps();

                $table->integer('compra_id')->unsigned();
                $table->foreign('compra_id')->references('id')->on('compras');
                $table->integer('stock_present_id')->unsigned();
                $table->foreign('stock_present_id')->references('id')->on('stock_present');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
        Schema::dropIfExists('compras');
    }
}