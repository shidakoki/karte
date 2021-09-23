<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('name');
            $table->integer('gender');
            $table->integer('birthday_y');
            $table->integer('birthday_m');
            $table->integer('birthday_d');
            $table->integer('bloodtype');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('keyperson');
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
        Schema::dropIfExists('patients');
    }
}
