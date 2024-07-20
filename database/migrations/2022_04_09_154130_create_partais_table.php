<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partais', function (Blueprint $table) {
            $table->id();
            $table->integer('nourut');
            $table->string('partai');
            $table->string('jenis');
            $table->string('foto');
            $table->string('nama');
            $table->string('alamat');
            $table->string('jeniskelamin');
            $table->string('agama');
            $table->integer('usia');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('tahun');
            $table->foreign('created_by')->references('id')->on('users'); // Relasi ke tabel users
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
        Schema::dropIfExists('partais');
    }
};
