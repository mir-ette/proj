<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('national_id');
            $table->integer('wsp');
            $table->string('phone_no');
            $table->string('email');
            $table->string('role');
            $table->string('church_name');  
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
        Schema::dropIfExists('servants');
    }
}
