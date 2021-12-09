<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
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
            $table->bigInteger('iddepartamento')->unsigned()->nullable();
            $table->bigInteger('idpuesto')->unsigned()->nullable();
            $table->string('name', 50);
            $table->string('surname', 100);
            $table->string('email', 120)->unique();
            $table->integer('phone')->unsigned()->unique();
            $table->date('datecontract')->useCurrent();
            $table->timestamps();
            $table->foreign('iddepartamento')->references('id')->on('departamento');
            $table->foreign('idpuesto')->references('id')->on('puesto');
        });
        Schema::table('departamento', function(Blueprint $table) {
            $table->foreign('idempleadojefe')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
