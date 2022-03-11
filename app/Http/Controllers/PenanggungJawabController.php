<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenanggungJawabController extends Controller
{
    public function index(){
        // $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
        $pj = User::where('role','pj')->get();
        return view('pj/index',compact('pj'));
    }

    public function add(){
        return view('pj.add');
    }

    public function post(Request $request){
        // return $request->all();
        User::create([
            'name'  =>  $request->name,
            'email'  =>  $request->email,
            'password'  =>  bcrypt("password"),
            'role'  =>  'pj',
        ]);
            return redirect()->route('pj')->with(['success' => 'Data penanggung jawab sudah ditambahkan !']);
    }

    public function edit($id){
        $data = User::where('id',$id)->first();
        return view('pj/.edit',compact('data'));
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


            User::where('id',$id)->update([


                'name'    =>  $request->name,
                'email' => $request->email,
            ]);

            $notification = array(
                'message' => 'Berhasil, data Penanggung Jawab berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('pj')->with($notification);

    }

    public function delete($id){
        User::where('id',$id)->delete();
        $notification = array(
            'message' => 'Berhasil, data Penanggung Jawab berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('pj')->with($notification);
    }


}
