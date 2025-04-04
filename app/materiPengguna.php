<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materiPengguna extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'materiid';
    protected $fillable = [
        'kursusid',
        'nama',
        'deskripsi',
        'durasi'
    ];

    // Relasi: Materi dimiliki oleh satu Kursus
    public function kursus()
    {
        return $this->belongsTo(kursus::class, 'kursusid', 'kursusid');
    }
}
