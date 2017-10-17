<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',12)->unique();
            //$table->bigInteger('codigo')->unsigned();
            //$table->primary('codigo');
            $table->string('fechaventa',10);
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('Vendido');
            $table->double('totalventa',8,2);
            $table->timestamps();

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');
            
        });

            Schema::create('detalle_venta', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cantidad',8);
                
                $table->double('costounitario',8,2);
                $table->double('costototal',8,2);
                $table->timestamps();

                //$table->bigInteger('venta_codigo')->unsigned();
                //$table->foreign('venta_codigo')->references('codigo')->on('ventas');
                $table->integer('venta_id')->unsigned();
                $table->foreign('venta_id')->references('id')->on('ventas');
                $table->integer('stockpresent_id')->unsigned();
                $table->foreign('stockpresent_id')->references('id')->on('stock_present');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('ventas');
    }
}
