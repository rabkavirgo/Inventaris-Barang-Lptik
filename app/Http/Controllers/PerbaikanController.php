<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{

    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $perbaikans = Riwayat::join('barangs','barangs.id','riwayats.barangId')
                            ->select('riwayats.id','keterangan','tanggal','tempat','namaBarang')->get();
        return view('admin/riwayat/index',compact('perbaikans'));
    }
}
