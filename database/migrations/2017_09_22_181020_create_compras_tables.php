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
        Schema::create('comps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',12)->unique();
            //$table->bigInteger('codigo')->unsigned();
            //$table->primary('codigo');
            $table->string('fechacompra',10);
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('Comprado');
            $table->double('totalcompra',8,2);
            $table->timestamps();

            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
        });

            Schema::create('detalle_compra', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cantidad',8);
                $table->string('fechavenc',10);
                $table->double('costounitario',8,2);
                $table->double('costototal',8,2);
                $table->timestamps();

                //$table->bigInteger('comp_codigo')->unsigned();
                //$table->foreign('comp_codigo')->references('codigo')->on('comps');
                $table->integer('comp_id')->unsigned();
                $table->foreign('comp_id')->references('id')->on('comps');
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
        Schema::dropIfExists('detalle_compra');
        Schema::dropIfExists('comps');
    }
}
