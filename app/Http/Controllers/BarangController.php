<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    public function dashboard(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barang='barang';
        return view('layouts/dashboard',['barang'=> $barang]);
    }

    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barangs = Barang::select('id','namaBarang','ruangId','keterangan','tanggalMasuk','status')->get();
        return view('barang/index',compact('barangs'));
    }

    public function add(){
        $barang = Barang::all();
        $ruang = Ruangan::all();
        return view('barang.add',compact('barang'));
    }

    public function post(Request $request){
    // return $request->all();
        $barang = new Barang;
        $barang->namaBarang = $request->namaBarang;
        $barang->ruangId = $request->ruangId;
        $barang->keterangan = $request->keterangan;
        $barang->statusPerbaikan = $request->statusPerbaikan;
        $barang->status = $request->status;
        $barang->tanggalMasuk = $request->tanggalMasuk;
        $barang->save();

        return redirect()->route('barang')->with(['success' => 'Data barang sudah ditambahkan !']);

    }
    public function edit($id){
        $data = Barang::where('id',$id)->first();
        return view('barang/.edit',compact('data'));
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
                'keterangan'    =>  $request->keterangan,
                'statusPerbaikan'    =>  $request->statusPerbaikan,
                'status'    =>  $request->status,
                'tanggalMasuk'    =>  $request->tanggalMasuk,
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
