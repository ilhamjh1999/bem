<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;
    protected $table = 'laporan_kegiatan';
    protected $fillable = ['nama','jabatan','nama_ormawa','nama_laporan_kegiatan','lampiran','status_bem'];
}
