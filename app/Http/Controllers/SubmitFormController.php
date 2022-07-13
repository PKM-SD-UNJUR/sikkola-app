<?php

namespace App\Http\Controllers;

use App\Models\submitForm;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\materi;
use App\Http\Requests\StorelatihanRequest;
use App\Http\Requests\UpdatelatihanRequest;
use App\Models\submission;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubmitFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    public function submitList(mapel $mapel, $tgl)
    {
        $materi = materi::where('mapel_id', $mapel->id)->whereMonth('tanggal', $tgl)->get();

        $submitForm = submitForm::where('mapel_id', $mapel->id)->whereMonth('deadline', $tgl)->get();

        $submission = submission::all();


        return view('submitForm.mapel', [
            'mapel' => $mapel,
            'materi' => $materi,
            'submitForm' => $submitForm,
            'submission' => $submission,
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
            'deadline' => 'required',
            'deskripsi' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ];


        $data = $request->validate($validasi);

        $back = $mapel->id;
        $tanggal = \Carbon\Carbon::parse($data['deadline'])->format('m');

        submitForm::create($data);


        return redirect("/kelas/submitForm/$back/$tanggal")->with('success', 'Tugas berhasil dibuat');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelatihanRequest  $request
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, submitForm $submitForm)
    {


        $validasi = [
            'judul' => 'required',
            'deadline' => 'required',
            'deskripsi' => 'required'
        ];

        $mapel = mapel::where("id", $id)->first();

        $data = $request->validate($validasi);

        $back = $id;
        $tanggal = \Carbon\Carbon::parse($data['deadline'])->format('m');
        // return $tanggal;

        submitForm::where('id', $submitForm->id)->update($data);



        return redirect("/kelas/submitForm/$back/$tanggal")->with('success', 'Tugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, submitForm $submitForm)
    {
        submitForm::destroy($submitForm->id);
        return redirect("/kelas/submitForm/$id/01")->with('success', 'Tugas berhasil dihapus');
    }
}
