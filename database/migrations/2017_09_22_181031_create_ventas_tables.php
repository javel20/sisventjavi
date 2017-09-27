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
            $table->string('fechaventa',10);
            $table->text('descripcion');
            $table->string('estado')->default('vendido');
            $table->double('totalventa',8,2);
            $table->timestamps();

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');
            
        });

            Schema::create('detalle_venta', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cantidad');
                
                $table->double('costounitario',8,2);
                $table->double('costototal',8,2);
                $table->timestamps();

                $table->integer('venta_id')->unsigned();
                $table->foreign('venta_id')->references('id')->on('ventas');
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
        Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('ventas');
    }
}
