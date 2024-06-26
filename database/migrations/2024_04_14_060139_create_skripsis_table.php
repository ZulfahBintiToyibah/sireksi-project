<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswas_id')->unique();
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul')->unique();
            $table->unsignedSmallInteger ('tahun');            
            $table->unsignedBigInteger('dosens_id');
            $table->foreign('dosens_id')->references('id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
            $table->text('abstrak');
            $table->unsignedBigInteger('kodeskripsis_id');
            $table->foreign('kodeskripsis_id')->references('id')->on('kodeskripsis')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['Diajukan', 'Dikonfirmasi'])->default('Diajukan');            
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
        Schema::dropIfExists('skripsis');
    }
}
