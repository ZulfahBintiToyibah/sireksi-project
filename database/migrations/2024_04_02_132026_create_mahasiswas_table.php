<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nim')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('prodis_id');
            $table->foreign('prodis_id')->references('id')->on('prodis')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('role', ['1', '2']);
            $table->string('password')->nullable();
            $table->enum('jenkel', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
}
