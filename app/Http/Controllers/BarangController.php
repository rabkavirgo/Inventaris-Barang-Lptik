<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    public function dashboard(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barang = count(Barang::all());
        $ruang = count(Ruangan::all());
        $elektronik = count(Barang::where('jenisBarang','elektronik')->get());
        $nonelektronik = count(Barang::where('jenisBarang','nonelektronik')->get());

        $perRuang = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('namaRuangan',DB::raw('count(barangs.id) as jumlah'))
                            ->groupBy('ruangans.id')->get();
        return view('admin/layouts/dashboard',compact('barang','ruang','elektronik','nonelektronik','perRuang'));
    }

    public function pj(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barang = count(Barang::all());
        $ruang = count(Ruangan::all());
        $elektronik = count(Barang::where('jenisBarang','elektronik')->get());
        $nonelektronik = count(Barang::where('jenisBarang','nonelektronik')->get());

        $perRuang = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('namaRuangan',DB::raw('count(barangs.id) as jumlah'))
                            ->groupBy('ruangans.id')->get();
        return view('admin/layouts/dashboardpj',compact('barang','ruang','elektronik','nonelektronik','perRuang'));
    }

    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','catatan','waktuMasuk')->get();
        return view('admin/barang/index',compact('barangs'));
    }

    public function add(){
        $ruang = Ruangan::all();
        return view('admin/barang.add',compact('ruang'));
    }

    public function post(Request $request){
    // return $request->all();
        $barang = new Barang;
        $barang->ruangId = $request->ruangId;
        $barang->namaBarang = $request->namaBarang;
        $barang->kodeBarang = $request->kodeBarang;
        $barang->jenisBarang = $request->jenisBarang;
        $barang->kondisi = $request->kondisi;
        $barang->statusPerbaikan = $request->statusPerbaikan;
        $barang->merk = $request->merk;
        $barang->asalPerolehan = $request->asalPerolehan;
        $barang->bahan = $request->bahan;
        $barang->harga = $request->harga;
        $barang->catatan = $request->catatan;
        $barang->waktuMasuk = $request->waktuMasuk;
        $barang->statusPerbaikan = false;
        $barang->save();

        return redirect()->route('pj.barang')->with(['success' => 'Data barang sudah ditambahkan !']);

    }
    public function edit($id){
        $data = Barang::where('id',$id)->first();
        return view('admin/barang/.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [

        ];
        $this->validate($request, [

        ],$messages,$attributes);


            Barang::where('id',$id)->update([


                'namaBarang'    =>  $request->namaBarang,
                'ruangId'    =>  $request->ruangId,
                'kodeBarang'    =>  $request->kodeBarang,
                'jenisBarang'    =>  $request->jenisBarang,
                'kondisi'    =>  $request->kondisi,
                'statusPerbaikan'    =>  $request->statusPerbaikan,
                'merk'    =>  $request->merk,
                'asalPerolehan'    =>  $request->asalPerolehan,
                'bahan'    =>  $request->bahan,
                'harga'    =>  $request->harga,
                'catatan'    =>  $request->catatan,
                'waktuMasuk'    =>  $request->waktuMasuk,
            ]);

            $notification = array(
                'message' => 'Berhasil, data Barang berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('barang')->with($notification);

    }
    public function delete($id){
        Barang::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Barang berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('barang')->with($notification);
    }
}
