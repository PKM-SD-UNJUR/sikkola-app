<?php

namespace App\Http\Controllers;

use App\Models\latihan;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\materi;
use App\Http\Requests\StorelatihanRequest;
use App\Http\Requests\UpdatelatihanRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function latihanList(mapel $mapel, $tgl) {
        $materi = materi::where('mapel_id',$mapel->id)->whereMonth('tanggal',$tgl)->get();

        $latihan = latihan::where('mapel_id',$mapel->id)->whereMonth('waktumulai',$tgl)->get();

        return view('latihan.mapel',[
            'mapel' => $mapel,
            'materi' => $materi,
            'latihan' => $latihan,
            'tg' => $tgl
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(mapel $mapel)
    {
        return view('latihan.tambah-latihan',[
            'mapel' => $mapel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, mapel $mapel)
    {
        $validasi = [
            'judul' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'link' => 'required',
            'keterangan' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ];



        $data = $request->validate($validasi);

        $back = $mapel->id;
        $tanggal = \Carbon\Carbon::parse($data['waktumulai'])->format('m');

        latihan::create($data);

    
        return redirect("/kelas/latihan/$back/$tanggal")->with('success','Latihan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function show(latihan $lth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function edit($id, latihan $latihan)
    {
        $mapel = mapel::where('id',$id)->first();

        return view('latihan.ubah-latihan',[
            'mapel' => $mapel,
            'latihan' => $latihan
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelatihanRequest  $request
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, latihan $latihan)
    {
        $validasi = [
            'judul' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'link' => 'required',
            'keterangan' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ];

        $mapel = mapel::where("id",$id)->first();

        $data = $request->validate($validasi);

        $back = $id;
        $tanggal = \Carbon\Carbon::parse($data['waktumulai'])->format('m');
        // return $tanggal;

        latihan::where('id',$latihan->id)->update($data);

        return redirect("/kelas/latihan/$back/$tanggal")->with('success','Latihan berhasil dibubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, latihan $latihan)
    {
        latihan::destroy($latihan->id);
        return redirect("/kelas/latihan/$id/01")->with('success','Latihan berhasil dihapus');
    }
}
