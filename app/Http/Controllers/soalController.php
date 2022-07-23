<?php

namespace App\Http\Controllers;

use App\Models\soal;
use App\Models\quiz;
use App\Models\jawabanQuiz;
use App\Models\quizResult;
use Illuminate\Http\Request;
use Session;
// use Illuminate\Http\quizResult;
use Auth;
use Carbon;

class soalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }



    public function question(Request $request,soal $soal/*,soal $soal*/)
    {   

        $validasi = [
            'skor' => 'nullable',
            'jawaban' => 'required',
            'status' => 'nullable',
            'soal_id' => 'required',
            'user_id' => 'required',
            'quiz_id' => 'nullable',
            'kunci' => 'nullable',
        ];

       

        $jumlahSoal = soal::where('quiz_id', $request->quiz)->get();

        $data = $request->validate($validasi);

        $data['quiz_id'] = $request->quiz;

        if( $request->jawaban != $request->key ){
            $data['status'] = false;
            $data['skor'] = 0;
        }else{
            $data['status'] = true;
            $data['skor'] = 100 / $jumlahSoal->count();
        }

        $jawabanku = jawabanQuiz::where('soal_id',$soal->id)->where('user_id',Auth::user()->id)->first();
        // return $jawabanku = jawabanQuiz::where('quiz_id',$request->quiz)->where('user_id',Auth::user()->id)->get()
        ;

        if($request->hasil_jawaban == null){
            jawabanQuiz::create($data); 
            // return 'dibuat'.$data['status'].$data['skor'];
        }else{
            jawabanQuiz::where('id',$jawabanku->id)->update($data);
            // return 'diubah'.$data['status'].$data['skor'];
        }

        return redirect()->back();

    }




    public function next(Request $request,soal $soal)
    { 
  
        Session::put('nomor', $request->number);
        return redirect("/kelas/materi/forum/quiz/$request->quiz/soal/$request->next");
    }

    public function submit(Request $request,soal $soal)
    { 
        $validasi = [
            'submit' => 'nullable',
            'nilai' => 'nullable',
            'quiz_id' => 'required',
            'user_id' => 'required',
        ];

        $nilai = jawabanQuiz::where('quiz_id',$request->quiz_id)->where('user_id',Auth::user()->id)->sum('skor');
        $jawabanku = jawabanQuiz::where('quiz_id',$request->quiz_id)->where('user_id',Auth::user()->id)->get();
        $jawabanku = jawabanQuiz::latest()->get();


        $data = $request->validate($validasi);

        $data['nilai'] = $nilai;

        $data['submit'] = \Carbon\Carbon::now();

        
        quizResult::create($data);

        return redirect("/kelas/materi/forum/mapel/$request->mapel/quiz/$request->quiz_id")->with('success','Jawaban kamu telah berhasil dikirim');
    }




    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(quiz $quiz, soal $soal)
    {
        return view('quiz.soal.tambah-soal',[
            'quiz' => $quiz,
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
            'soal' => 'required:min:3',
            'soalGambar' => 'nullable',
            'opsi1' => 'required:min:3',
            'opsi2' => 'required:min:3',
            'opsi3' => 'required:min:3',
            'opsi4' => 'required:min:3',
            'score' => 'nullable',
            'jawaban' => 'required',
            'jawabanGambar' => 'nullable',
            'pembahasan' => 'nullable',
            'quiz_id' => 'required'
       ];


       $data = $request->validate($validasi);

    //    return $request->soalGambar;

       if($request->file('soalGambar')){
        $data['soalGambar'] = $request->file('soalGambar')->store('soal/');
       }

       

       if($request->file('jawabanGambar')){
        $data['jawabanGambar'] = $request->file('jawabanGambar')->store('jawaban/');
       }

    //    return  $data['jawabanGambar'];
       
       $quiz = $data['quiz_id'];

       $mapel = $request->mapel_id;

       soal::create($data);

       return redirect("/kelas/materi/forum/mapel/$mapel/quiz/$quiz")->with('success', 'Soal berhasil dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz, soal $soal)
    {
        $listSoal = soal::where('quiz_id',$quiz->id)->get();
        $jawabanku = jawabanQuiz::where('soal_id',$soal->id)->where('user_id',Auth::user()->id)->first();
        $jawabanku2 = jawabanQuiz::where('quiz_id',$quiz->id)->where('user_id',Auth::user()->id)->get();

        // return  $jawabanku2 ;
        return view('quiz.soal-jawab',[
            'quiz' => $quiz,
            'soal' =>$soal,
            'listSoal' => $listSoal,
            'jawabanku' =>  $jawabanku,
            'jawabanku2' =>  $jawabanku2
        ]);
    }

    public function review(quiz $quiz)
    {   
        // return $quiz;
        $listSoal = soal::where('quiz_id',$quiz->id)->get();
        $myanswer = jawabanQuiz::where('quiz_id',$quiz->id)->where('user_id',Auth::user()->id)->get();

        return view('quiz.soal-pembahasan',[
            'quiz' => $quiz,
            'listSoal' => $listSoal,
            'jawabanku' =>  $myanswer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz,soal $soal)
    {

        return view('quiz.soal.ubah-soal',[
            'quiz' => $quiz,
            'soal' =>$soal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,quiz $quiz, soal $soal)
    {
        $validasi = [
            'soal' => 'required:min:3',
            'soalGambar' => 'nullable',
            'opsi1' => 'required:min:3',
            'opsi2' => 'required:min:3',
            'opsi3' => 'required:min:3',
            'opsi4' => 'required:min:3',
            'score' => 'nullable',
            'jawaban' => 'required',
            'jawabanGambar' => 'nullable',
            'pembahasan' => 'nullable',
            'quiz_id' => 'required'
       ];


       $data = $request->validate($validasi);

    //    return $request->soalGambar;

       if($request->file('soalGambar')){
        $data['soalGambar'] = $request->file('soalGambar')->store('soal/');
       }

       

       if($request->file('jawabanGambar')){
        $data['jawabanGambar'] = $request->file('jawabanGambar')->store('jawaban/');
       }

    //    return  $data['jawabanGambar'];
       
       $quiz = $data['quiz_id'];

       $mapel = $request->mapel_id;

       soal::where('id',$soal->id)->update($data);

       return redirect("/kelas/materi/forum/mapel/$mapel/quiz/$quiz")->with('success', 'Soal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, quiz $quiz, soal $soal)
    {
    
        $jawaban = jawabanQuiz::where('soal_id',$soal->id)->count();

        if($jawaban == 0) {
            soal::destroy($soal->id);
            return redirect("/kelas/materi/forum/mapel/$request->mapel/quiz/$quiz->id")->with('success', 'Soal berhasil dihapus');
        } else {
            return redirect("/kelas/materi/forum/mapel/$request->mapel/quiz/$quiz->id")->with('warning', 'Soal Gagal Dihapus, Soal Sedang Digunakan!');
        }
    }
}
