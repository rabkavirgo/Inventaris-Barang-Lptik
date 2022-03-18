<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardPjController extends Controller
{
    public function dashboard(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barang = count(Barang::join('ruangans','ruangans.id','barangs.ruangId')
                                ->where('penanggungJawabId',Auth::user()->id)
                                ->get());
        $ruang = count(Ruangan::where('penanggungJawabId',Auth::user()->id)->get());
        $elektronik = count(Barang::where('jenisBarang','elektronik')
                                ->join('ruangans','ruangans.id','barangs.ruangId')
                                ->where('penanggungJawabId',Auth::user()->id)
                                ->get());
        $nonelektronik = count(Barang::where('jenisBarang','nonelektronik')
                                ->join('ruangans','ruangans.id','barangs.ruangId')
                                ->where('penanggungJawabId',Auth::user()->id)
                                ->get());

        $perJenis = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('jenisBarang',DB::raw('count(barangs.id) as jumlah'))
                            ->where('penanggungJawabId',Auth::user()->id)
                            ->groupBy('jenisBarang')->get();
        return view('pj/layouts/dashboardpj',compact('barang','ruang','elektronik','nonelektronik','perJenis'));
    }
}
