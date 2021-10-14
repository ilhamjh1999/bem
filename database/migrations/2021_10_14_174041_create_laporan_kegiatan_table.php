<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama',30);
            $table->string('jabatan',30);
            $table->string('nama_ormawa',30);
            $table->string('nama_laporan_kegiatan');
            $table->string('lampiran'); 
            $table->enum('status_bem',['Diterima','Ditolak','Menunggu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
}
