<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $ruangs = Ruangan::select('id','namaRuangan')->get();
        return view('ruang/index',compact('ruangs'));
    }

    public function add(){
        $barang = Barang::all();
        $ruang = Ruangan::all();
        return view('ruang.add',compact('ruang'));
    }

    public function post(Request $request){
        // return $request->all();
            $ruang = new Ruangan;
            $ruang->namaRuangan = $request->namaRuangan;
         
            $ruang->save();
    
            return redirect()->route('ruang')->with(['success' => 'Data Ruangan sudah ditambahkan !']);
    
     }

     public function edit($id){
        $data = Ruangan::where('id',$id)->first();
        return view('ruang/.edit',compact('data'));
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


            Ruangan::where('id',$id)->update([

                
                'namaRuangan'    =>  $request->namaRuangan,
            ]);

            $notification = array(
                'message' => 'Berhasil, data Ruangan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('ruang')->with($notification);

    }

    public function delete($id){
        Ruangan::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Ruangan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('ruang')->with($notification);
    }
}

