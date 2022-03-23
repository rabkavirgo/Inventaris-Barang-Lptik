<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table ='pinjams';
    use HasFactory;
    protected $fillable=[
        'barangId',
        'nik',
        'peminjam',
        'waktuPinjam',
        'waktuKembali',
        'keterangan',
    ];
}
