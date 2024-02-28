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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('kategori_id');
            // $table->foreign('kategori_id')->references('kategori_id')->on('kategoris');
            // $table->foreignId('kategori_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
