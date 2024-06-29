<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('nama_instansi');
            $table->string('nama_tampilkan');
            $table->string('nomor_hp');
            $table->string('nomor_wa');
            $table->string('email');
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('alamat_instansi');
            $table->date('tanggal_reservasi');
            $table->string('jam_berkunjung');
            $table->text('topik');
            $table->string('tujuan_opd');
            $table->integer('jumlah_rombongan');
            $table->string('pimpinan_rombongan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('no_surat');
            $table->string('kepada');
            $table->string('surat_permohonan');
            $table->string('bukti_inap')->nullable();

            $table->enum('status', ['proses','pending','diterima','ditolak','selesai'])->nullable();

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
        Schema::dropIfExists('reservasis');
    }
}
