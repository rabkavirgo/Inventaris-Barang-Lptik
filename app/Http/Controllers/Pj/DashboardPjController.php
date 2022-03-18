<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPjController extends Controller
{
    public function dashboard(){
        return view('pjawab/dashboard');
    }
}
