@extends('template.main')

@section('container')
<style>
    .qna-area{
        box-shadow: rgb(214, 234, 255) 0px 8px 24px;
    }
    #btn-question{
        width:30px; 
        max-height:25px; 
        padding: 23px; 
        padding-right: 14px; 
        padding-left: 14px;
        box-shadow: rgb(210, 241, 248) 0px 5px 10px;
        transition: 0.3 ease;
        background-color: #FFF9C4;
        border: 1px solid #fae208;
    }

    .btn-question-area{
        position: absolute; 
        margin-left: 83%;
        transition: 0.3s;
    }

    .btn-question-area:hover{
        transform: scale(1.15);
    }

    .question-list{
        overflow-y: auto;
        max-height: 500px;
    }
    .edit-question{
        color: rgb(164, 162, 162);
        transition: 0.3s;
    }
    .edit-question:hover{
        color: rgb(255, 187, 0);
    }
    .delete-question{
        color: rgb(164, 162, 162);
        transition: 0.3s;
    }
    .delete-question:hover{
        color: rgb(235, 0, 0);
    }
    .manage-question{
        display: none;
    }
    .question-list:hover .manage-question{
        display:block;
    }
</style>
<div class="container">
    <br>
    <div class="fw-bold container">
        <a href="/kelas/materi/forum/mapel/{{$mapel->id}}/question">Ruang bertanya {{$mapel->nama}}</a> / <a class="text-secondary">Ubah pertanyaan</a>
    </div>
    <div class="row p-4 container">
        <div class="col-md-12 rounded qna-area container bg-white p-3">
            <div class="container">
                <table>
                    <tr>
                        <td><h1 class="fw-bold text-xl p-3">&#128161;</h1></td>
                        <td><h1 class="fw-bold text-xl p-3">Ruang bertanya {{$mapel->nama}}</h1></td>
                    </tr>
                </table>
                <br>
                <div class="container">
                    <div class="d-flex justify-content-start">
                        <img src="{{asset('gambar/leader.png')}}" alt="" width="40px">&nbsp;&nbsp;
                        <h4 class="fw-bold text-secondary">{{Auth::user()->name}}</h4>&nbsp;( 
                        <small class="text-secondary">{{Auth::user()->role}}</small> )
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="">
                    <form class="mb-2"  action="/kelas/materi/forum/mapel/{{$mapel->id}}/question/{{$ptr->id}}" method="post" >
                        @csrf
                        @method('put')
                        @error('pertanyaan') 
                        <label class="py-2 text-danger" for="editor" class="mb-1 fw-bold container">{{$message}}</label>
                        @enderror
                        <input type="hidden" value="{{$mapel->id}}" name="mapel_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <textarea class="form-control ck-editor" name="pertanyaan" id="edit-q" cols="20" rows="30">{{$ptr->pertanyaan}}</textarea>
                        <br>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark text-uppercase fw-bold"><i class="fas fa-paper-plane"></i>&nbsp; Ubah pertanyaan saya</button>
                        </div>
                    </form>
                    </div>
                </div>
                <br><br>
                <br><br>
            </div>
        </div>
    </div>

</div>

<script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>

    ClassicEditor
    .create( document.querySelector( '#edit-q' ) )
    .catch( error => {
        console.error( error );
    } );


  </script>

@endsection