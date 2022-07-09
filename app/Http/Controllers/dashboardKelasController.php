<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Storage;

class dashboardKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard-layout.kelas.kelas',[
            'kelas' => kelas::latest()->get(),
            'title' => 'kelas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-layout.kelas.tambah-kelas',['title' => 'kelas']);
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
        'gambar' => 'required'
       ]; 

       $data = $request->validate($validasi);

       if($request->has('gambar')){
            $file = $request->file('gambar');
            $namafile = time() . '.' . $file->extension();
            $file->move(public_path('kelas'), $namafile);

            $data['gambar'] = $namafile;
       }

    //    return $data['gambar'];

       kelas::create($data);

       return redirect('/dashboard/kelas')->with('success','Kelas berhasil dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(kelas $kela)
    {   
       return view('dashboard-layout.kelas.edit-kelas',[
            'kelas' => $kela,
            'title' => 'kelas'
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelas $kela)
    {
        $validasi = [
            'nama' => 'required|max:50|min:5',
            'deskripsi' => 'required|max:255|min:5',
            'gambar' => 'nullable'
           ]; 
    
           $data = $request->validate($validasi);
    
           if($request->file('gambar')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $data['gambar'] = $request->file('gambar')->store('kelas');
        }
    
           kelas::where('id',$kela->id)->update($data);
    
           return redirect('/dashboard/kelas')->with('success','Kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelas $kela)
    {
        if($kela->image){
            Storage::delete($kela->image);
        }

        kelas::destroy($kela->id);
        return redirect('/dashboard/kelas')->with('success','Kelas berhasil dihapus');
    }
}
