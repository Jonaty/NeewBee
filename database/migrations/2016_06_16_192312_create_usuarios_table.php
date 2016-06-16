<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->string('password');
            $table->date('fec_nac')->nullable();
            $table->string('edad')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->enum('est_civ', ['Soltero', 'Casado'])->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('tel_contacto')->nullable();
            $table->enum('niv_acad', ['Tecnico', 'Licenciatura', 'Maestria', 'Doctorado', 'Especialidad'])->nullable();
            $table->string('carrera')->nullable();
            $table->enum('ocupacion', ['Estudiante', 'Trabajador', 'Freelancer'])->nullable();
            $table->string('nombre_ocup')->nullable();
            $table->text('exp_lab')->nullable();
            $table->text('form_acad')->nullable();
            $table->text('cursos')->nullable();
            $table->text('certificaciones')->nullable();
            $table->text('idiomas')->nullable();
            $table->text('aptitudes')->nullable();
            $table->text('info_adic')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
