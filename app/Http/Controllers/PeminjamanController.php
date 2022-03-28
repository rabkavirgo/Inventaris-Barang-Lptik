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

    public function add(){
        $barang = Barang::all();
        return view('admin/peminjaman.add',compact('barang'));
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

            return redirect()->route('pinjam')->with(['success' => 'Data Ruangan sudah ditambahkan !']);

     }

     public function edit($id){
        $data = Pinjam::where('id',$id)->first();
        $barang = Barang::all();
        return view('admin/peminjaman/.edit',compact('data','barang'));
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
            return redirect()->route('pinjam')->with($notification);

    }

    public function delete($id){
        Pinjam::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Pinjam berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('pinjam')->with($notification);
    }
}


