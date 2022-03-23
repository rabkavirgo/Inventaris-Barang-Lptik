<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $pinjams = Pinjam::join('barangs','barangs.id','pinjams.barangId')
                            ->select('pinjams.id','namaBarang','nik','peminjam','keterangan','waktuPinjam','waktuKembali')->get();
        return view('admin/peminjaman/index',compact('pinjams'));
    }

}
