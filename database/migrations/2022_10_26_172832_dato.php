<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class dato extends Migration
{
  
    public function up()
    {
        Schema::create('dato', function (Blueprint $table){
            $table->bigIncrements('id_llanta')->unsigned();
            $table->string('nombre');
            $table->integer('ancho_llanta');
            $table->integer('diametro_rin');
            $table->integer('presion_max');
            $table->string('fabricante');
            $table->integer('stock');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('dato');
    }
}
