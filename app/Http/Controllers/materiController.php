<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\kelas;
use App\Models\materi;

class materiController extends Controller
{
    public function materiList(mapel $mapel){

        return view('mapel',[
            'mapel' => $mapel
        ]);
    }
}
