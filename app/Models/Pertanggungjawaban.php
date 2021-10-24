<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanggungjawaban extends Model
{
    use HasFactory;
    protected $table = 'laporan_pertanggungjawaban';
    protected $fillable = ['nama','jabatan','nama_ormawa','nama_laporan_pertanggungjawaban','lampiran','status_bem'];
}
