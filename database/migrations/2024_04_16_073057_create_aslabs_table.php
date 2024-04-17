<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAslabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aslabs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswas_id');
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('jabatan');
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
        Schema::dropIfExists('aslabs');
    }
}
