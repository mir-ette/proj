<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('education'); 
            $table->string('grade'); 
            $table->date('graduation_year');
            $table->string('certifications'); 
            $table->date('date_of_certificate'); 
            $table->string('name_of_courses'); 
            $table->enum('got_certificate', ['yes','no'])->default('yes');
            $table->string('centrename_of_givencourse'); 
            $table->date('start_course'); //?
            $table->string('skills_aquired'); 
            $table->string('projects'); 
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
        Schema::dropIfExists('courses');
    }
}
