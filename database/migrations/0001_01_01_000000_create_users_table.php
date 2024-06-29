<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('google_id')->nullable()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->index();
            $table->string('token')->index();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->index();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->index();
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('user_agent')->nullable(); // Ubah menjadi 'text' jika ingin menangani user agent sebagai teks
            $table->longText('payload')->nullable(); // Ubah panjang maksimum berdasarkan kebutuhan, dan sesuaikan indeks sesuai kebutuhan aplikasi
            $table->integer('last_activity')->index();
            $table->timestamps(); // Jika diperlukan, tambahkan timestamp untuk pelacakan waktu pembuatan dan pembaruan record
        });

        // Menghindari penambahan indeks yang sudah ada
        Schema::table('sessions', function (Blueprint $table) {
            if (!Schema::hasColumn('sessions', 'user_agent')) {
                $table->index('user_agent', 'sessions_user_agent_index');
            }
            if (!Schema::hasColumn('sessions', 'payload')) {
                $table->index('payload', 'sessions_payload_index');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};


