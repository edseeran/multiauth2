<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->boolean('year_lvl');
            $table->boolean('department');
            $table->bigInteger('age');
            $table->string('address');
            $table->boolean('sex');
            $table->string('email')->unique();
            $table->bigInteger('student_phone');
            $table->string('guardian_name');
            $table->bigInteger('guardian_phone');
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
        Schema::dropIfExists('students');
    }
}
