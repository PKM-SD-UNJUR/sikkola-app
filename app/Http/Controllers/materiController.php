<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\mapel;
use App\Models\kelas;
use App\Models\materi;
use App\Models\latihan;
use Alert;  
use Carbon\Carbon;
use Storage;

class materiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function materiList(mapel $mapel, $tgl){

        $materi = materi::where('mapel_id',$mapel->id)->whereMonth('tanggal',$tgl)->get();

        $latihan = latihan::where('mapel_id',$mapel->id)->whereMonth('waktumulai',$tgl)->get();

        return view('materi.mapel',[
            'mapel' => $mapel,
            'materi' => $materi,
            'latihan' => $latihan,
            'tg' => $tgl
        ]);
    }

    public function create(mapel $mapel){

        return view('materi.tambah-materi',[
            'mapel' => $mapel
        ]);
    }

    public function store(Request $request, mapel $mapel){
        // return $tgl;

        // return $request;

        $validasi = [
            'topik'=>'required|min:3',
            'tanggal'=>'required',
            'judul'=>'required|min:5',
            'waktumulai'=>'required',
            'waktuselesai'=>'required',
            'video' => 'nullable',
            'file' => 'nullable',
            'deskripsi' => 'nullable',
            'mapel_id'=>'required',
            'kelas_id'=>'required'
        ];


        $data = $request->validate($validasi);

        if($request->has('file')){
            $data['file'] = $request->file('file')->store("materi/$mapel->nama");
       }

        $back = $mapel->id;
        $tanggal = \Carbon\Carbon::parse($data['tanggal'])->format('m');

        materi::create($data);

        return redirect("/kelas/materi/$back/$tanggal")->with('success','Materi berhasil dibuat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responseam
     */
    public function edit($id, materi $materi)
    {
        // return $id;
        $mapel = mapel::where('id',$id)->first();

        return view('materi.ubah-materi',[
            'mapel' => $mapel,
            'materi' => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, materi $materi)
    {
        $validasi = [
            'topik'=>'required|min:3',
            'tanggal'=>'required',
            'judul'=>'required|min:5',
            'waktumulai'=>'required',
            'waktuselesai'=>'required',
            'video' => 'nullable',
            'file' => 'nullable',
            'deskripsi' => 'nullable',
            'mapel_id'=>'required',
            'kelas_id'=>'required',
        ];

        $mapel = mapel::where("id",$id)->first();

        $data = $request->validate($validasi);
        // return $request->oldFile;
        if($request->has('file')){

            if($request->oldFile){
                Storage::delete($request->oldFile);
            }

            $data['file'] = $request->file('file')->store("materi/$mapel->nama");
       }

        $back = $id;
        $tanggal = \Carbon\Carbon::parse($data['tanggal'])->format('m');
        // return $tanggal;

        materi::where('id',$materi->id)->update($data);

        return redirect("/kelas/materi/$back/$tanggal")->with('success','Materi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, materi $materi)
    {
        if($materi->image){
            Storage::delete($materi->image);
        }
        materi::destroy($materi->id);
        return redirect("/kelas/materi/$id/01")->with('success','Materi berhasil dihapus');
    }
}
