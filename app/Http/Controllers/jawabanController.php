<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use App\Models\pertanyaan;
use Illuminate\Http\Request;


class jawabanController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $mapel = $request->mapel;

        $validasi = [
            'jawaban' => 'required|min:3',
            'user_id' => 'required',
            'pertanyaan_id' => 'required',
        ];

        $data = $request->validate($validasi);

        jawaban::create($data);

        return redirect("/kelas/materi/forum/mapel/$mapel/question")->with('success','jawaban berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function show(jawaban $jawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function edit(jawaban $jawaban)
    {
        return view('ruangbertanya/edit-forum',[
            // 'mapel' => $mapel,
            'pertanyaan' => $pertanyaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jawaban $jawaban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, pertanyaan $pertanyaan, $jwb)
    {   
        jawaban::destroy($jwb);
        return redirect("/kelas/materi/forum/mapel/$id/question")->with('success', 'Jawaban berhasil ditarik');
    }
}
