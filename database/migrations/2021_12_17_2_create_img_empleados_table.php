<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgEmpleado', function (Blueprint $table) {
          
            $table->id()->autoIncrement();
            $table->string('nombreArchivo', 200)->unique();
            $table->string('nombreImagen',200);
            $table->string('mimeType', 200);
            $table->timestamps();
            $table->bigInteger('id_empleado')->unsigned();
            $table->foreign('id_empleado')->references('id')->on('empleado')->onDelete('cascade')->onUpdate('cascade');
           
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imgEmpleado');
    }
}
