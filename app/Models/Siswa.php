<?php

namespace App\Models;

use App\Models\Ortu;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'no_pendaf',
        'nama',
        'nisn',
        'tempat_lahir',
        'tgl_lahir',
        'jenis kelamin',
        'agama',
        'anak_ke',
        'dari',
        'alamat',
        'asal_sekolah',
        'alamat_sekolah',
        'no_telp',
        'hobi',
        'jarak',
        'transport',
        'informasi',
        'jurusan',
        'alasan',
        'ortu_id',
    ];

    public function ortu() {
        return $this->hasOne(Ortu::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class,'siswa_id');
    }
}
