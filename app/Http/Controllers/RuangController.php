<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(){
        $ruangs = Ruangan::join('users','users.id','ruangans.penanggungJawabId')->select('ruangans.id','namaRuangan','name as penanggungJawab')->get();
        return view('admin/ruang/index',compact('ruangs'));
    }

    public function add(){
        $pj = User::where('role','pj')->get();
        return view('admin/ruang.add',compact('pj'));
    }

    public function post(Request $request){
        // return $request->all();
            $ruang = new Ruangan;
            $ruang->namaRuangan = $request->namaRuangan;
            $ruang->penanggungJawabId = $request->penanggungJawabId;

            $ruang->save();

            return redirect()->route('ruang')->with(['success' => 'Data Ruangan sudah ditambahkan !']);

     }

     public function edit($id){
        $data = Ruangan::where('id',$id)->first();
        $pj = User::all();
        return view('admin/ruang/.edit',compact('data','pj'));
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
                'penanggungJawabId' => $request->penanggungJawabId,
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

