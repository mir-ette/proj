<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); 
            $table->string('nationality'); 
            $table->string('email'); 
            $table->integer('phone-no'); 
            $table->integer('wsp'); 
            $table->string('church_name'); 
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['single', 'married']);
             $table->date('birthdate');
             $table->integer('age')->virtualAs('created_at - birthdate')->nullable();
            $table->string('address'); 
            $table->string('area'); 
            $table->bigInteger('national_id')->unique();
            $table->bigInteger('passport_number')->unique();
            $table->string('notes'); 
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
        Schema::dropIfExists('employees');
    }
}
