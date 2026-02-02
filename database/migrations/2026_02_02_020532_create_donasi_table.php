<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donatur_id')->constrained('donatur')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_donasi')->onDelete('cascade');
            $table->decimal('nominal', 15, 2);
            $table->text('pesan')->nullable();
            $table->dateTime('tanggal_donasi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
