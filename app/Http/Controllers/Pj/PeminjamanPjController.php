<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Pinjam;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PeminjamanPjController extends Controller
{
    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $pinjams = Pinjam::join('barangs','barangs.id','pinjams.barangId')
                            ->select('pinjams.id','namaBarang','nik','peminjam','keterangan','waktuPinjam','waktuKembali')->get();
        return view('pj/peminjaman/index',compact('pinjams'));
    }

    public function add(){

        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','foto','catatan','waktuMasuk')
                            ->orderBy('id','desc')
                            ->get();
        $pj = Ruangan::all();
        $barang = Barang::all();
        return view('pj/peminjaman.add',compact('barang','barangs','pj'));
    }

    public function post(Request $request){
        // return $request->all();
            $pinjam = new Pinjam;
            $pinjam->nik = $request->nik;
            $pinjam->barangId = $request->barangId;
            $pinjam->peminjam = $request->peminjam;
            $pinjam->keterangan = $request->keterangan;
            $pinjam->waktuPinjam = $request->waktuPinjam;
            $pinjam->waktuKembali = $request->waktuKembali;

            $pinjam->save();

            return redirect()->route('pj.peminjaman')->with(['success' => 'Data Ruangan sudah ditambahkan !']);

     }

     public function edit($id){
        $data = Pinjam::where('id',$id)->first();
        $barang = Barang::all();
        return view('pj/peminjaman/.edit',compact('data','barang'));
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


            Pinjam::where('id',$id)->update([


                'nik'    =>  $request->nik,
                'barangId' => $request->barangId,
                'peminjam' => $request->peminjam,
                'keterangan' => $request->keterangan,
                'waktuPinjam' => $request->waktuPinjam,
                'waktuKembali' => $request->waktuKembali,
            ]);

            $notification = array(
                'message' => 'Berhasil, data Ruangan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('pj.peminjaman')->with($notification);

    }

    public function delete($id){
        Pinjam::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Pinjam berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('pj.peminjaman')->with($notification);
    }
}
