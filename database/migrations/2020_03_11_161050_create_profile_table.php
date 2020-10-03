<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaDepan');
            $table->string('namaBelakang');
            $table->integer('usia');
            $table->string('jenisKelamin');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('beratBadan');
            $table->integer('tinggiBadan');
            $table->double('bmi');
            $table->string('statusBmi');
            $table->double('kalori');
            $table->double('kaloriDiet');
            $table->double('Protein');
            $table->double('Lemak');
            $table->double('Karbohidrat');
            $table->string('aktifitas');
            $table->double('valueAktifitas');
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
        Schema::dropIfExists('profile');
    }
}
