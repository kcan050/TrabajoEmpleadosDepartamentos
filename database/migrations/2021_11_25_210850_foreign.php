<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->bigInteger('id_departamento')->unsigned(); /*primero creamos el esquema de las tablas sin las foraneas columna y referencia*/

            $table->foreign('id_departamento')->references('id')->on('departamento')->onDelete('cascade'); /*php artisan make:migration foreign2 --table=departamento
            
            con este comando asignamos las foraneas
            */
            
            
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            //
        });
    }
}
