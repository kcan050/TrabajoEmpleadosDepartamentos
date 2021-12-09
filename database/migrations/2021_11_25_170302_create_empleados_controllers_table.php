<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_puesto')->unsigned();
            //$table->bigInteger('id_departamento')->unsigned();
            $table->date('fecha_contrato')->useCurrent();
            
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100)->unique();
            $table->string('telefono', 9)->unique();
            $table->timestamps();
            
            $table->foreign('id_puesto')->references('id')->on('puesto')->onUpdate('cascade')->onDelete('cascade');
           
            
            //$table->unique('id_departamento');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
