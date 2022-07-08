<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\mapel;

class berandaController extends Controller
{
    public function index(){
        return view('beranda',[
            'kelas' => kelas::orderBy('created_at','asc')->get()
        ]);
    }

    public function listMapel(kelas $kela)
    {
        $mapel = mapel::where('kelas_id',$kela->id)->get();

        return view('kelas',[
            'mapel' => $mapel,
            'kelas' => $kela
        ]);
    }
}
