<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kursusPengguna extends Model
{
    protected $table = 'kursus';
    protected $primaryKey = 'kursusid';
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'poto'
        
    ];

    // Relasi: Satu Kursus memiliki banyak Materi
    public function materi()
    {
        return $this->hasMany(materi::class, 'kursusid', 'kursusid');
    }

    // Relasi: Satu Kursus bisa memiliki banyak pembayaran
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class, 'kursusid', 'kursusid');
    }

    public function kursus()
    {
        return $this->belongsTo(kursus::class, 'kursusid');
    }
}
