<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama',30);
            $table->string('jabatan',30);
            $table->string('nama_ormawa',30);
            $table->string('tujuan');
            $table->string('nama_ruangan');
            $table->date('tanggal_pinjam');
            $table->time('mulai');
            $table->time('selesai');
            $table->enum('status_kemahasiswaan',['Diterima','Ditolak','Menunggu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangan');
    }
}
