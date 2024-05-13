<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumpulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswas_id')->unique();
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('skripsis_id');
            $table->foreign('skripsis_id')->references('id')->on('skripsis')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pengumpulans');
    }
}
