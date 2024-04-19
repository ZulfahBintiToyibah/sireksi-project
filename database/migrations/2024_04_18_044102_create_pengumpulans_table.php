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
            $table->unsignedBigInteger('skripsis_id');
            $table->foreign('skripsis_id')->references('id')->on('skripsis')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('aslabs_id');
            $table->foreign('aslabs_id')->references('id')->on('aslabs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status_pengumpulan');
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
