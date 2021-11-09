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
            $table->bigIncrements('id'); //patientのIDを保存するカラム
            $table->string('name'); //patientの名前を保存するカラム
            $table->integer('gender'); //patientの性別を保存するカラム
            $table->integer('birthday_y'); //patientの誕生日（年）を保存するカラム
            $table->integer('birthday_m'); //patientの誕生日（月）を保存するカラム
            $table->integer('birthday_d'); //patientの誕生日（日）を保存するカラム
            $table->integer('bloodtype')->nullable(); //patientの血液型を保存するカラム
            $table->integer('height')->nullable(); //patientの身長を保存するカラム
            $table->integer('weight')->nullable(); //patientの体重を保存するカラム
            $table->string('keyperson'); //patientのキーパーソンを保存するカラム
            $table->string('disease'); //patientの病名を保存するカラム
            $table->timestamps(); //patientの作成時間を保存するカラム
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
