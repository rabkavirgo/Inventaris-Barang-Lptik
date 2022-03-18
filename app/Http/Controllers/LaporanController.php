<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        $ruangans = Ruangan::all();
        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','catatan','waktuMasuk')->get();
        return view('admin/laporan.index',compact('ruangans','barangs'));
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
        return view('admin/laporan.index',compact('barangs','ruangans','perRuang'));
    }
}
