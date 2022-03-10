<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{   
    protected $table = 'barangs';
    use HasFactory;
    protected $fillable=[
	'ruangId',
	'kodeBarang',
	'namaBarang',
	'jenisBarang',
	'kondisi',
	'statusPerbaikan',
	'merk',
	'asalPerolehan',
	'bahan',
	'harga' ,
	'catatan',
	'waktuMasuk',
    ];
}
