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
        Schema::create('sejarahs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('tahunpemilu');
            $table->string('jumlahpartai');
            $table->string('totalsuara');
            $table->string('suaradimenangkan');
            $table->string('presiden');
            $table->string('wakilpresiden');
            $table->string('foto');
            $table->string('linkpartai');
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
        Schema::dropIfExists('sejarahs');
    }
};
