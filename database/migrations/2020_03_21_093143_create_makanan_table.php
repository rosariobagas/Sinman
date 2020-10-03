<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaMakanan');
            $table->string('kategoriMakanan');
            $table->integer('takaranSajian');
            $table->double('Protein');
            $table->double('Lemak');
            $table->double('Karbohidrat');
            $table->double('jumlahKalori');
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
        Schema::dropIfExists('makanan');
    }
}
