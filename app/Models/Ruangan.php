<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $fillable = ['nama','jabatan','nama_ormawa','tujuan','nama_ruangan','tanggal_pinjam','mulai','selesai'];
}
