<?php

namespace App\Http\Controllers;

use App\Models\submission;
use App\Models\mapel;
use Illuminate\Http\Request;

class SubmissionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, mapel $mapel)
    {

        $validasi = [
            'file' => 'required',
            'user_id' => 'required',
            'submitForm_id' => 'required',
            'created_at' => 'nullable'
        ];


        $data = $request->validate($validasi);


        if ($request->has('file')) {
            $file = $request->file('file');
            $namafile = time() . '.' . $file->extension();
            $file->move(public_path('submission'), $namafile);

            $data['file'] = $namafile;
        }

        $submit = submission::create($data);

        $back = $mapel->id;
        $tanggal = \Carbon\Carbon::parse($submit->created_at)->format('m');


        return redirect("/kelas/submitForm/$back/$tanggal")->with('success', 'Tugas berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubmissionRequest  $request
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mapel $mapel, $id)
    {

        $request->validate([
            'filebaru' => 'required'
        ]);

        $submit = submission::find($id);
        $submit->file = $request->filebaru;
        $submit->save();


        if ($request->has('filebaru')) {
            $file = $request->file('filebaru');
            $namafile = time() . '.' . $file->extension();
            $file->move(public_path('submission'), $namafile);

            $data['filebaru'] = $namafile;
        }

        $back = $mapel->id;
        $tanggal = \Carbon\Carbon::parse($submit->updated_at)->format('m');

        return redirect("/kelas/submitForm/$back/$tanggal")->with('success', 'Tugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel,$id)
    {
        submission::destroy($id);
        return redirect("/kelas/submitForm/$mapel->id/01")->with('success','Tugas berhasil dihapus');
    }
}
