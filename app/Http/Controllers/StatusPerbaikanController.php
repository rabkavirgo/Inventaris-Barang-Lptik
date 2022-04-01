<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusPerbaikanController extends Controller
{
    public function index($id){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barang = Barang::where('id',$id)->first();
        $riwayats = Riwayat::join('barangs','barangs.id','riwayats.barangId')
                            ->select('riwayats.id','tanggal','tanggal','tempat','namaBarang','keterangan')
                            ->where('barangId',$id)
                            ->get();
        return view('admin/barang/riwayat/index',compact('riwayats','barang','id'));
    }

    public function add(){
        return view('admin/riwayat.add');
    }

    public function post(Request $request, $id){
        // return $request->all();
        Riwayat::create([
            'barangId'  =>  $id,
            'keterangan'  =>  $request->keterangan,
            'tanggal'  =>  $request->tanggal,
            'tempat'  =>  $request->tempat,
        ]);
                return redirect()->route('barang.riwayat',[$id])->with(['success' => 'riwayat perbaikan sudah ditambahkan !']);
    }

    public function edit($id){
        $data = Riwayat::where('id',$id)->first();
        return view('admin/riwayat/.edit',compact('data'));
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


            Riwayat::where('id',$id)->update([


                'name'    =>  $request->name,
                'email' => $request->email,
            ]);

            $notification = array(
                'message' => 'Berhasil, data Penanggung Jawab berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('riwayat')->with($notification);

    }

    public function delete($id){
        Riwayat::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Penanggung Jawab berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('riwayat')->with($notification);
    }
}
