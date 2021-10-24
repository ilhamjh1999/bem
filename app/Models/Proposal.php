<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $fillable = ['nama','jabatan','nama_ormawa','nama_proposal','lampiran','status_kemahasiswaan','status_bem','status_dpm'];
}
