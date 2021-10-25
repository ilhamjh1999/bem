<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanSurat extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $fillable = ['nama','jabatan','tujuan_surat','tujuan_pengirim','lampiran'];
}
