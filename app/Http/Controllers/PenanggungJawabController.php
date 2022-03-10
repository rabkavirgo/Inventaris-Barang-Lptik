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
}
