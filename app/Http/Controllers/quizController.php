<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\mapel;
use App\Models\soal;
use Auth;
use App\Models\quizResult;
use Illuminate\Http\Request;

class quizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(mapel $mapel)
    {
        $quiz = quiz::latest()->where('mapel_id',$mapel->id)->get();

        return view('quiz.quiz',[
            'quiz' => $quiz,
            'mapel' => $mapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(mapel $mapel)
    {
        $quiz = quiz::latest()->where('mapel_id',$mapel->id)->get();

        return view('quiz.tambah-quiz',[
            'quiz' => $quiz,
            'mapel' => $mapel
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
            'nama' => 'required|min:3',
            'mapel_id' => 'required',
            'user_id' => 'required',
            'deadline' => 'required',
            'keterangan' => 'nullable',
        ];

        $data = $request->validate($validasi);
        $mapel = $data['mapel_id'];
        quiz::create($data);

        return redirect("/kelas/materi/forum/mapel/$mapel/quiz")->with('success','Quiz berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel, quiz $quiz)
    {   
        $soal = soal::where('quiz_id',$quiz->id)->get();
        $start = soal::where('quiz_id',$quiz->id)->first();
        $myResult = quizResult::where('quiz_id',$quiz->id)->where('user_id',Auth::user()->id)->first();
        $allResult = quizResult::where('quiz_id',$quiz->id)->get();

        return view('quiz.detail-quiz',[
            'mapel' => $mapel,
            'quiz' => $quiz,
            'soal' => $soal,
            'start' => $start,
            'myresult' => $myResult,
            'allResult' => $allResult
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request,$id, quiz $quiz)
    {
        // return $request;
       $data = $request->validate([
        'status' => 'required'
       ]);

        quiz::where('id',$quiz->id)->update($data);
        return redirect()->back()->with('success','Seluruh soal telah diterapkan pada quiz ini');
    }

    public function edit(mapel $mapel, quiz $quiz)
    {
        return view('quiz.edit-quiz',[
            'mapel' => $mapel,
            'quiz' => $quiz
        ]);
    }

    public function updateNilai(Request $request,$id)
    {
    //    return $request;

       $myResult = quizResult::find($id);
       $myResult->nilai = $request->nilai;
       $myResult->save(); 

    //    return $myResult->nilai;
       
       return redirect()->back()->with('success','Nilai berhasil diupdate')->with('nilai','$request->nilai');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,mapel $mapel, quiz $quiz)
    {
        $validasi = [
            'nama' => 'required|min:3',
            'mapel_id' => 'required',
            'user_id' => 'required',
            'deadline' => 'required',
            'keterangan' => 'nullable',
        ];

        $data = $request->validate($validasi);

        $mapel = $data['mapel_id'];
        
        quiz::where('id',$quiz->id)->update($data);

        return redirect("/kelas/materi/forum/mapel/$mapel/quiz")->with('success','Quiz berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel, quiz $quiz)
    {
        quiz::destroy($quiz->id);
        return redirect("/kelas/materi/forum/mapel/$mapel->id/quiz")->with('success', 'Quiz berhasil dihapus');
    }
}
