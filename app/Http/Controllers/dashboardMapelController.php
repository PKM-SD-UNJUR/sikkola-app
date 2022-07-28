<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use App\Models\kelas;
use Illuminate\Http\Request;
use Storage;
use Alert;
use App\Models\latihan;

class dashboardMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard-layout.mapel.mapel', [
            'kelas' => kelas::latest()->get(),
            'title' => 'mapel'
        ]);
    }

    public function listMapel(kelas $kela)
    {
        $mapel = mapel::where('kelas_id', $kela->id)->get();

        return view('dashboard-layout.mapel.list-mapel', [
            'mapel' => $mapel,
            'kelas' => $kela,
            'title' => 'mapel'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(kelas $kela)
    {
        return view('dashboard-layout.mapel.tambah-mapel', [
            'kelas' => $kela,
            'title' => 'mapel'
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
            'deskripsi' => 'required|min:5',
            'gambar' => 'required',
            'kelas_id' => 'required'
        ];

        $data = $request->validate($validasi);

        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $namafile = time() . '.' . $file->extension();
            $file->move(public_path('mapel'), $namafile);

            $data['gambar'] = $namafile;
        }

        $kelas = $data['kelas_id'];

        mapel::create($data);

        return redirect("/dashboard/mapel/kelas/$kelas")->with('success', 'Mata Pelajaran Berhasil Dibuat!');
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
        return view('dashboard-layout.mapel.edit-mapel', [
            'mapel' => $mapel,
            'title' => 'mapel'
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
            'deskripsi' => 'required|min:5',
            'gambar' => 'nullable',
            'kelas_id' => 'nullable'
        ];

        $data = $request->validate($validasi);

        if ($request->file('gambar')) {

            $file = $request->file('gambar');
            $namafile = time() . '.' . $file->extension();
            $file->move(public_path('mapel'), $namafile);

            $data['gambar'] = $namafile;
        }

        $kelas = $data['kelas_id'];

        mapel::where('id', $mapel->id)->update($data);

        return redirect("/dashboard/mapel/kelas/$kelas")->with('success', 'Mata Pelajaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel)
    {
        $data = $mapel->id;

        $latihan = latihan::where('mapel_id',$data)->count();

        $kelas = request('kelas_id');
        if($latihan == 0) {
            mapel::destroy($data);
            return redirect("/dashboard/mapel/kelas/$kelas")->with('success', 'Mata Pelajaran Berhasil Dihapus!');
        } else {
            return redirect("/dashboard/mapel/kelas/$kelas")->with('warning', 'Mata Pelajaran Gagal Dihapus, Mata Pelajaran Sedang Digunakan!');
        }
    }
}
