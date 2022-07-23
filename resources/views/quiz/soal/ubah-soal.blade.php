@extends('template.main')

@section('container')
<div class="container card-kelas text-center p-2 px-5" style="" >
    <h4>Tambah Soal</h4>
    <small>{{$quiz->mapel->nama}} : {{$quiz->nama}}</small>
<div class="container">
<a class="btn btn-sm mt-3 btnkelas bg-transparent text-light" href="/kelas/latihan/{{$quiz->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-left"></i> Kembali</a>
</div>
</div>

<div class="container formtambah mt-3 col-10 p-5 bg-light" style="max-width: 800px;">
  <form action="/kelas/materi/forum/quiz/{{$quiz->id}}}/soal/{{$soal->id}}" enctype="multipart/form-data" method="post" class="form-group">
      @csrf
      @method('put')
      <div>
        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
        <input type="hidden" name="mapel_id" value="{{$quiz->mapel->id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      </div>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Soal @error('soal')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
        <textarea class="form-control ck-editor" value="" name="soal" id="editorSoal" cols="20" rows="30">{{ old('soal',$soal->soal)}}</textarea><br>
        <img src="{{asset("/storage/$soal->soalGambar")}}" alt="" width="100"><br><br>
        <input type="file" class="form-control" value="{{$soal->soalGambar}}" name="soalGambar">
      </div><br>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Opsi 1 @error('opsi1')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
        <textarea class="form-control ck-editor" value="" name="opsi1" id="editor1" cols="20" rows="30">{{ old('opsi1',$soal->opsi1)}} </textarea>
      </div><br>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Opsi 2 @error('opsi2')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
        <textarea class="form-control ck-editor" value="" name="opsi2" id="editor2" cols="20" rows="30">{{ old('opsi2',$soal->opsi2)}} </textarea>
      </div><br>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Opsi 3 @error('opsi3')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
        <textarea class="form-control ck-editor" value="" name="opsi3" id="editor3" cols="20" rows="30">{{ old('opsi3',$soal->opsi3)}} </textarea>
      </div><br>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Opsi 4 @error('opsi4')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
        <textarea class="form-control ck-editor" value="" name="opsi4" id="editor4" cols="20" rows="30">{{ old('opsi4',$soal->opsi4)}} </textarea>
      </div><br>
      <div>
        <label for="editor" class="mb-1 fw-bold container">Jawaban @error('jawaban')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
       <select class="form-select" value="" name="jawaban" id="">
          <option value="" selected>Pilih jawaban</option>
          <option @if(old('jawaban',$soal->jawaban) == 'a') selected @endif value="a">Opsi 1</option>
          <option @if(old('jawaban',$soal->jawaban) == 'b') selected @endif value="b">Opsi 2</option>
          <option @if(old('jawaban',$soal->jawaban) == 'c') selected @endif value="c">Opsi 3</option>
          <option @if(old('jawaban',$soal->jawaban) == 'd') selected @endif value="d">Opsi 4</option>
       </select>
      </div><br>
      <div>
        <div>
          <label for="editor" class="mb-1 fw-bold container">Pembahasan @error('pembahasan')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i>  {{$message}}</span>@enderror</label>
          <textarea class="form-control ck-editor" value="" name="pembahasan" id="pembahasan" cols="20" rows="30">{{ old('pembahasan')}} </textarea>
        </div><br>
        <img src="{{asset("/storage/$soal->jawabanGambar")}}" alt="" width="100"><br><br>
        <input type="file" value="{{$soal->jawabanGambar}}" name="jawabanGambar" class="form-control">
      </div>
      <br>
      <div class="col-md-6 mt-3 ">
        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Simpan</button>
        <a type="reset" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-angle-double-left"></i> Batal</a>
    </div>
 
  </form>
</div>
<br><br>

@include('quiz/function/soal-js')
@endsection