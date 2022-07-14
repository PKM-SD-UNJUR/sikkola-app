<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\kelas;
use Storage;
use Alert;


class forumController extends Controller
{
    
    public function index(){

        $mapel = mapel::where('id','!=',0)->first();
      

        return view('ruangbertanya/forum',[
            'mapel' => $mapel
        ]);

    }
}
