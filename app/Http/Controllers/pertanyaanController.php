<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use App\Models\mapel;
use App\Models\jawaban;
use Illuminate\Http\Request;

class pertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(mapel $mapel)
    {

        
        $pertanyaan = pertanyaan::latest('updated_at')->where('mapel_id',$mapel->id)->get();
        $mapelList = mapel::where('kelas_id',$mapel->kelas_id)->orderBy('nama','asc')->get();

        return view('ruangbertanya/forum',[
            'mapel' => $mapel,
            'pertanyaan' => $pertanyaan,
            'mapelList' => $mapelList
        ]);

    }

    public function accept($id, pertanyaan $pertanyaan, $status, $jwb)
    {   
        // $status = true;

        $question = pertanyaan::find($pertanyaan->id);
        $question->terjawab = $status;
        $question->save();

        $answer = jawaban::find($jwb);
        $answer->menjawab = $status;
        $answer->save();

        if($status){
            return redirect("/kelas/materi/forum/mapel/$id/question")->with('success', 'Jawaban telah diterima');
        }else{
            return redirect("/kelas/materi/forum/mapel/$id/question")->with('success', 'Terima jawaban telah dibatalkan');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, mapel $mapel)
    {
        $validasi = [
            'pertanyaan' => 'required|min:3',
            'user_id' => 'required',
            'mapel_id' => 'required',
        ];

        $data = $request->validate($validasi);

        pertanyaan::create($data);

        return redirect("/kelas/materi/forum/mapel/$mapel->id/question")->with('success','Pertanyaan berhasil diajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(pertanyaan $pertanyaan)
    {
        return view('ruangbertanya/edit-forum',[
            'mapel' => $mapel,
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel, pertanyaan $question,)
    {
        // return $question;
        return view('ruangbertanya/edit-forum',[
            'mapel' => $mapel,
            'ptr' => $question
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,mapel $mapel, pertanyaan $question)
    {
        $validasi = [
            'pertanyaan' => 'required|min:3',
            'user_id' => 'required',
            'mapel_id' => 'required',
        ];

        $data = $request->validate($validasi);

        pertanyaan::where('id',$question->id)->update($data);

        return redirect("/kelas/materi/forum/mapel/$mapel->id/question")->with('success','Pertanyaan berhasil diperbatui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel,pertanyaan $question)
    {
        pertanyaan::destroy($question->id);
        return redirect("/kelas/materi/forum/mapel/$mapel->id/question")->with('success', 'Pertanyaan berhasil dihapus');
    }
}
