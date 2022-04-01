<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPjController extends Controller
{
    public function index(){
        $ruangans = Ruangan::all();
        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','catatan','waktuMasuk')->get();
        return view('pj/laporan.index',compact('ruangans','barangs'));
    }

    public function cari(Request $request){
        $ruangans = Ruangan::all();
        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','catatan','waktuMasuk')
                            ->where('ruangId',$request->ruangId)
                            ->get();
        $perRuang = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('jenisBarang',DB::raw('count(barangs.id) as jumlah'))
                            ->where('ruangId',$request->ruangId)
                            ->groupBy('jenisBarang')->get();
                            // return $perRuang;
        return view('pj/laporan.index',compact('barangs','ruangans','perRuang'));
    }
}
