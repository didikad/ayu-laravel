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
        Schema::create('wisata_galery_post_galery', function (Blueprint $table) {
            $table->id();
            $table->string("caption");
            $table->string("gambar");
            $table->string("tanggal_kegiatan");
            $table->enum("status", ['proses','pending','diterima','ditolak','selesai'])->nullable();
            $table->enum('type', ['wisata', 'post']);
            $table->bigInteger('agenda_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata_galery_post_galery');
    }
};
