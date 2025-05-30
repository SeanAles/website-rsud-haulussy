<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Iklan extends Model
{
    use HasFactory, SoftDeletes; // Gunakan SoftDeletes dan HasFactory

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iklans'; // Opsional jika nama model jamak dari nama tabel

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_akhir',
        'aktif',
        'link',
        'is_permanent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
        'aktif' => 'boolean',
        'is_permanent' => 'boolean',
    ];
}
