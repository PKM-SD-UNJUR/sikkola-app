<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use App\Models\kelas;
use Illuminate\Http\Request;
use Storage;
use Alert;

class dashboardMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard-layout.mapel.mapel',[
            'kelas' => kelas::latest()->get(),
            'title' => 'mapel'
        ]);
    }

    public function listMapel(kelas $kela)
    {
        $mapel = mapel::where('kelas_id',$kela->id)->get();

        return view('dashboard-layout.mapel.list-mapel',[
            'mapel' => $mapel,
            'kelas' => $kela
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(kelas $kela)
    {
        return view('dashboard-layout.mapel.tambah-mapel',[
            'kelas' => $kela
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = [
            'nama' => 'required|max:50|min:5',
            'deskripsi' => 'required|max:255|min:5',
            'gambar' => 'required',
            'kelas_id' => 'required'
           ]; 
    
           $data = $request->validate($validasi);
    
           if($request->has('gambar')){
                $data['gambar'] = $request->file('gambar')->store('kelas');
           }
    
           $kelas = $data['kelas_id'];
    
           mapel::create($data);
    
           return redirect("/dashboard/mapel/kelas/$kelas")->with('success','Mata pelajaran berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel)
    {
        return view('dashboard-layout.mapel.edit-mapel',[
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mapel $mapel)
    {
        $validasi = [
            'nama' => 'required|max:50|min:5',
            'deskripsi' => 'required|max:255|min:5',
            'gambar' => 'nullable',
            'kelas_id' => 'nullable'
        ]; 
    
           $data = $request->validate($validasi);
    
           if($request->file('gambar')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $data['gambar'] = $request->file('gambar')->store('kelas');
        }

            $kelas = $data['kelas_id'];
    
           mapel::where('id',$mapel->id)->update($data);
    
           return redirect("/dashboard/mapel/kelas/$kelas")->with('success','Kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel)
    {   
        // return request('kelas_id');
        $data = $mapel->id;
        if($mapel->image){
            Storage::delete($mapel->image);
        }
        $kelas = request('kelas_id');
        mapel::destroy($data);
        return redirect("/dashboard/mapel/kelas/$kelas")->with('success','Mata pelajaran berhasil dihapus');
    }
}
