<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockPresentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_present', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stockmin',8);
            $table->string('stockreal',8);
            $table->string('nombre',100)->unique();
            $table->double('porc_ganancia',8,2);
            $table->double('precioventa',8,2);
            $table->string('estado',100)->default('activo');
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_present');
    }
}
