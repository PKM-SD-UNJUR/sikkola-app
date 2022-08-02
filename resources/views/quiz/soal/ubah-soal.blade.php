@extends('template.main')

@section('container')
<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
<script type="text/javascript" src="/richtexteditor/rte.js"></script>
<script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
<link rel="stylesheet" href="/richtexteditor/runtime/richtexteditor_preview.css" />


<div class="container card-kelas text-center p-2 px-5">
  <h4>Tambah Soal</h4>
  <small>{{$quiz->mapel->nama}} : {{$quiz->nama}}</small>
  <div class="container">
    <a class="btn btn-sm mt-3 btnkelas bg-transparent text-light" href="{{ url()->previous() }}"><i class="fas fa-angle-left"></i> Kembali</a>
  </div>
</div>

<div class="container formtambah mt-3 col-10 p-5 bg-light" style="max-width: 1000px;">
  <form action="/kelas/materi/forum/quiz/{{$quiz->id}}}/soal/{{$soal->id}}" enctype="multipart/form-data" method="post" class="form-group">
    @csrf
    @method('put')
    <div>
      <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
      <input type="hidden" name="mapel_id" value="{{$quiz->mapel->id}}">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    </div>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Soal @error('soal')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>

      <input name="soal" id="inp_soal" type="hidden" value="{{$soal->soal}}"/>


      <div id="div_editor1" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->soal!!}
      </div>

      <script>
        var editor1 = new RichTextEditor(document.getElementById("div_editor1"));

        editor1.attachEvent("change", function() {
          document.getElementById("inp_soal").value = editor1.getHTMLCode();
        });
      </script>



    </div><br>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Opsi 1 @error('opsi1')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>

      <input name="opsi1" id="inp_opsi1" type="hidden" value="{{$soal->opsi1}}"/>


      <div id="div_editor2" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->opsi1!!}
      </div>

      <script>
        var editor2 = new RichTextEditor(document.getElementById("div_editor2"));
        editor2.attachEvent("change", function() {
          document.getElementById("inp_opsi1").value = editor2.getHTMLCode();
        });
      </script>

    </div><br>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Opsi 2 @error('opsi2')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>

      <input name="opsi2" id="inp_opsi2" type="hidden" value="{{$soal->opsi2}}"/>


      <div id="div_editor3" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->opsi2!!}
      </div>

      <script>
        var editor3 = new RichTextEditor(document.getElementById("div_editor3"));
        editor3.attachEvent("change", function() {
          document.getElementById("inp_opsi2").value = editor3.getHTMLCode();
        });
      </script>

    </div><br>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Opsi 3 @error('opsi3')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
      <input name="opsi3" id="inp_opsi3" type="hidden" value="{{$soal->opsi3}}"/>


      <div id="div_editor4" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->opsi3!!}
      </div>

      <script>
        var editor4 = new RichTextEditor(document.getElementById("div_editor4"));
        editor4.attachEvent("change", function() {
          document.getElementById("inp_opsi3").value = editor4.getHTMLCode();
        });
      </script>
    </div><br>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Opsi 4 @error('opsi4')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
      <input name="opsi4" id="inp_opsi4" type="hidden" value="{{$soal->opsi4}}"/>


      <div id="div_editor5" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->opsi4!!}
      </div>

      <script>
        var editor5 = new RichTextEditor(document.getElementById("div_editor5"));
        editor5.attachEvent("change", function() {
          document.getElementById("inp_opsi4").value = editor5.getHTMLCode();
        });
      </script>
    </div><br>
    <div>
      <label for="editor" class="mb-1 fw-bold container">Jawaban @error('jawaban')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
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
        <label for="editor" class="mb-1 fw-bold container">Pembahasan @error('pembahasan')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
        <input name="pembahasan" id="inp_pembahasan" type="hidden" value="{{$soal->pembahasan}}"/>


      <div id="div_editor6" class="richtexteditor" style="width: 800px;margin:10px">
      {!!$soal->pembahasan!!}
      </div>

      <script>
        var editor6 = new RichTextEditor(document.getElementById("div_editor6"));
        editor6.attachEvent("change", function() {
          document.getElementById("inp_pembahasan").value = editor6.getHTMLCode();
        });
      </script>
      </div><br>
    </div>
    <br>
    <div class="col-md-6 mt-3 ">
      <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Simpan</button>
      <a type="reset" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-angle-double-left"></i> Batal</a>
    </div>

  </form>
</div>
<br><br>

@endsection