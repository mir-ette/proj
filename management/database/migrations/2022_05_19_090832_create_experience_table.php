<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->string('last_job'); 
            $table->float('last_salary', 8, 2);
            $table->integer('job_hours'); 
            $table->string('company'); 
            $table->string('about_job'); 
            $table->year('tod');
            $table->year('fromd');
             $table->integer('period')->virtualAs('tod - fromd'); 
            $table->enum('commission', ['yes','no'])->default('no');
            $table->enum('insurance', ['yes','no'])->default('no');
            $table->enum('transportation', ['yes','no'])->default('no');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('experience');
    }
}
