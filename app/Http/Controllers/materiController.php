<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\kelas;
use App\Models\materi;
use Alert;

class materiController extends Controller
{
    public function materiList(mapel $mapel){

        return view('materi.mapel',[
            'mapel' => $mapel
        ]);
    }

    public function create(mapel $mapel){

        return view('materi.tambah-materi',[
            'mapel' => $mapel
        ]);
    }

    public function store(mapel $mapel){

        $back = $mapel->id;

        return redirect("/kelas/materi/$back")->with('success','Materi berhasil dibuat');
    }
}
