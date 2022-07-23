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

class dashboardLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $latihan = latihan::with('kelas','mapel')->get();
        $mapel = mapel::where('id',$request->id)->with('kelas','latihan')->get();
        return view('dashboard-layout.latihan.index',compact('latihan','mapel'),['title'=>'latihan']);
    }

    public function kelolaLatihan() {
        $latihan = latihan::with('kelas','mapel')->get();
        $kelas = kelas::latest()->with('latihan','mapel')->get();
        $mapel = mapel::with('kelas','latihan')->get();
        return view('dashboard-layout.latihan.kelola-latihan',compact('latihan','kelas','mapel'),['title'=>'latihan']);
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
    public function create(Request $request)
    {
        $mapel = mapel::where('id',$request->id)->with('kelas','latihan')->get();
        return view('dashboard-layout.latihan.create', ['data' => new latihan, 'mapel' => $mapel,'title'=>'latihan']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'link' => 'required',
            'keterangan' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);


        $latihan = new latihan();
        $latihan->judul = $request->judul;
        $latihan->waktumulai = $request->waktumulai;
        $latihan->waktuselesai = $request->waktuselesai;
        $latihan->link = $request->link;
        $latihan->keterangan = $request->keterangan;
        $latihan->kelas_id = $request->kelas_id;
        $latihan->mapel_id = $request->mapel_id;
        $latihan->save();

        return redirect()->route('kelolaLatihan.index',['id'=>$request->mapel_id])->with('success', 'Latihan Berhasil Dibuat!');
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
    public function edit($id, Request $request)
    {
        $latihan = latihan::find($id);
        $mapel = mapel::where('id',$request->id)->with('kelas','latihan')->get();
        return view('dashboard-layout.latihan.edit', compact('latihan','mapel'), ['id'=>$request->mapel_id,'title'=>'latihan']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelatihanRequest  $request
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'link' => 'required',
            'keterangan' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);

        $latihan = latihan::find($id);
        $latihan->judul = $request->judul;
        $latihan->waktumulai = $request->waktumulai;
        $latihan->waktuselesai = $request->waktuselesai;
        $latihan->link = $request->link;
        $latihan->keterangan = $request->keterangan;
        $latihan->kelas_id = $request->kelas_id;
        $latihan->mapel_id = $request->mapel_id;
        $latihan->save();

        return redirect()->route('kelolaLatihan.index',['id'=>$request->mapel_id])->with('success', 'Latihan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        latihan::find($id)->delete();
        
        return redirect()->route('kelolaLatihan.index',['id'=>$request->mapel_id])->with('success', 'Latihan Berhasil Dihapus!');
    }
}
