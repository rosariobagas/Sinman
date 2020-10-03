<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuharian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('profile_id');
            $table->string('sarapan');
            $table->double('kaloriSarapan');
            $table->string('makanSiang');
            $table->double('kaloriMakanSiang');
            $table->string('makanMalam');
            $table->double('kaloriMakanMalam');
            $table->string('snack1');
            $table->double('kaloriSnack1');
            $table->string('snack2');
            $table->double('kaloriSnack2');
            $table->string('snack3');
            $table->double('kaloriSnack3');
            $table->double('totalKalori');
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
        Schema::dropIfExists('menuharian');
    }
}
