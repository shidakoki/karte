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
            $table->string('text')->nullable(); // karteの本文を保存するカラム
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); //karteの作成時間を保存するカラム
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));//karteの編集時間の時間を保存するカラム

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
