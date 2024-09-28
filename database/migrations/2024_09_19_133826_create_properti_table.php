<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properti', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('alamat');
            $table->string('notelp');
            $table->unsignedBigInteger('kota_id'); 
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('cascade');
            $table->string('harga');
            $table->unsignedBigInteger('sertifikat_id'); 
            $table->foreign('sertifikat_id')->references('id')->on('sertifikat')->onDelete('cascade');
            $table->string('lb')->nullable();
            $table->string('lt');
            $table->string('kt')->nullable();
            $table->string('km')->nullable();
            $table->string('garasi')->nullable();
            $table->text('deskripsi');
            $table->text('gambar');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properti');
    }
};
