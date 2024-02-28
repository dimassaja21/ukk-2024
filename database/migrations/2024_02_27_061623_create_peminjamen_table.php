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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('buku_id')->nullable()->constrained()->cascadeOnUpdate();
            // $table->integer('user_id')->unsigned();
            // $table->integer('buku_id')->unsigned();
            $table->string('tanggal_peminjaman');
            $table->string('tanggal_pengembalian');
            $table->string('status_peminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
