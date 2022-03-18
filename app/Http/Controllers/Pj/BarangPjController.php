<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangPjController extends Controller
{

    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $barangs = Barang::join('ruangans','ruangans.id','barangs.ruangId')
        ->join('users','users.id','ruangans.penanggungJawabId')
                            ->select('barangs.id','namaRuangan','kodeBarang','namaBarang','jenisBarang','kondisi','statusPerbaikan','merk','asalPerolehan','bahan','harga','catatan','waktuMasuk')
                            ->where('penanggungJawabId',Auth::user()->id)
                            ->get();
        return view('pj/barang/index',compact('barangs'));
    }

    public function add(){
        $ruang = Ruangan::where('penanggungJawabId',Auth::user()->id)->get();
        return view('pj/barang.add',compact('ruang'));
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
            return view('pj/barang/.edit',compact('data'));
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
                return redirect()->route('pj.barang')->with($notification);
        }

        public function delete($id){
            Barang::where('id',$id)->delete();
            $notification = array(
                'message' => 'Berhasil, data Barang berhasil dihapus!',
                'alert-type' => 'success'
            );
            return redirect()->route('pj.barang')->with($notification);
        }




}
