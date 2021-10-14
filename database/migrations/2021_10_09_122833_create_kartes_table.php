<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id');//karteの患者IDを保存するカラム
            $table->integer('writer_type'); // karteの職種を保存するカラム
            $table->string('text');  // karteの本文を保存するカラム
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
        Schema::dropIfExists('kartes');
    }
}
