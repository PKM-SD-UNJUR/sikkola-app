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
        max-height: 800px;
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

    .bt-checked{
        transition: 0.3s;
    }

    .bt-checked:hover{
        transform: scale(1.20)
    }
    .bt-checked:hover img{
        box-shadow: rgb(186, 255, 202) 0px 8px 14px;
    }
    .border-jawab{
       border: 6px solid ;
       border-color: #cbffa9;
       border-radius: 10px;
    }
</style>
<div class="container">
    <div class="py-2 mb-2">
        <a class="fw-bold" href="/kelas/materi/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}"><i class="fas fa-angle-double-left"></i> KEMBALI KE KELAS</a>
    </div>
    <div>
        <h5 class="fw-bold">&#129303; Selamat datang di ruang bertanya di kelas {{$mapel->kelas->nama}}</h5>
        <small>jangan sungkan untuk bertanya dan berikan jawaban terbaikmu</small>
    </div>
    <br>
    <div class="row p-4">
        <div class="col-md-10 col-sm-12 rounded qna-area container bg-white p-3 mb-3">
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
                    <form class="mb-2"  action="/kelas/materi/forum/mapel/{{$mapel->id}}/question" method="post" >
                        @csrf
                        @error('pertanyaan') 
                        <label class="py-2 text-danger" for="editor" class="mb-1 fw-bold container">{{$message}}</label>
                        @enderror
                        <input type="hidden" value="{{$mapel->id}}" name="mapel_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <textarea class="form-control ck-editor" name="pertanyaan" id="editor" cols="20" rows="30"></textarea>
                        <br>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark text-uppercase fw-bold"><i class="fas fa-paper-plane"></i>&nbsp; Ajukan pertanyaan saya</button>
                        </div>
                    </form>
                    </div>
                </div>
                <br><br>
                <div>
                    <h4>List pertanyaan</h4>
                </div>
                <hr>
                <div class="row question-list">
                @foreach ($pertanyaan as $ptr)
             
                @if ($ptr->user->id == Auth()->user()->id)
                <div class="col-md-2"></div>
                @endif
                <div class="col-md-10 col-sm-12 mb-5 py-3 rounded" style="position: relative;">
                <div class="d-flex justify-content-start">
                    <small><i class="fas fa-calendar-alt"></i>
                        &nbsp;{{\Carbon\Carbon::parse($ptr->updated_at)->format('d F y')}}  
                        &nbsp; <i class="fas fa-clock"></i>
                        &nbsp;{{\Carbon\Carbon::parse($ptr->updated_at)->format('H:i')}} WIB
                        &nbsp;
                        @if($ptr->terjawab)
                        <b class="text-success"><i class="fas fa-check-circle"></i> <b class="text-dark"> [TERJAWAB ]</b></b>  &nbsp;
                        @endif
                        @if ($ptr->created_at != $ptr->updated_at && !$ptr->terjawab)
                        <b class="text-warning">( DIUBAH )</b>
                        @endif
                    </small>
                    <div class="ms-auto">
                        @if (Auth::user()->id == $ptr->user->id)
                        <div class="manage-question" id="navbarNavLightDropdown">
                            <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                <a class="text-secondary" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-chevron-circle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                  @if(!$ptr->terjawab)
                                    <li><a class="dropdown-item edit-question fw-bold" href="/kelas/materi/forum/mapel/{{$mapel->id}}/question/{{$ptr->id}}/edit"><i class="fas fa-pen"></i> Edit</a></li>
                                  @endif
                                  <li><a class="dropdown-item delete-question fw-bold" data-bs-toggle="modal" data-bs-target="#delete{{$ptr->id}}"><i class="fas fa-trash"></i> Hapus</a></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                          @endif
                    </div>
                </div>

                 {{--modal hapus--}}
                 <div class="modal fade" id="delete{{$ptr->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content modalhapus" style="background-color: white;">
                        <div class="modal-body">
                          <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                          <h2 class="text-center">Apakah kamu yakin?</h2>
                          <p class="text-center text-muted container">Pertanyaan yang dihapus tidak dapat dipulihkan</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                          <form action="/kelas/materi/forum/mapel/{{$mapel->id}}/question/{{$ptr->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus pertanyaan saya</button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                {{--modal hapus end--}}

                <div class="p-3 border rounded border-3">
                    <div class="d-flex justify-content-start">
                        <img src="{{asset('gambar/leader.png')}}" alt="" width="25px">&nbsp;&nbsp;
                        <h6 class=" text-secondary">{{$ptr->user->name}} ({{$ptr->user->role}})</h6>
                        <br>
                        <div class="ms-auto">
                            <small class="text-muted fw-bold">{{Carbon\Carbon::parse($ptr->updated_at)->diffForHumans()}}</small>
                        </div>
                    </div>
                    <div class="mt-3" >
                        <div class="" style="text-align: justify;">
                        <h4 >
                           {!!$ptr->pertanyaan!!}
                        </h4>
                        </div>
                        {{-- <a href="/kelas/materi/{{$mapel->id}}/forum/question">klik</a> --}}
                        <div class="" id="form-question{{$ptr->id}}">
                            <form class="mb-2" action="/kelas/materi/forum/question/{{$ptr->id}}/jawab" method="post" >
                                @csrf
                                <input type="hidden" value="{{$ptr->id}}" name="pertanyaan_id">
                                <input type="hidden" value="{{$mapel->id}}" name="mapel">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                @error('jawaban')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <textarea class="form-control ck-editor" name="jawaban" id="editor{{$ptr->id}}" cols="20" rows="30">{{old('jawaban')}}</textarea>
                                <br>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm text-uppercase fw-bold text-secondary"><i class="fas fa-paper-plane"></i>&nbsp; Kirim jawaban</button>
                                </div>
                            </form>
                            </div>
                       </div>

                       @if ($ptr->jawaban->count() > 0)
                       <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#jawaban{{$ptr->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                              Lihat jawaban &nbsp;<span class="badge bg-danger"  data-toggle="tooltip" title="Terdapat {{$ptr->jawaban->count()}} jawaban pada pertanyaan ini ( klik untuk melihat )">{{$ptr->jawaban->count()}}</span>
                            </a>
                          </h2>
                          <div id="jawaban{{$ptr->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                @foreach ($ptr->jawaban as $jwb)
                                <div class="p-3 mb-3 @if($jwb->menjawab) border-jawab @else border border-3 rounded @endif">
                                    <div class="d-flex justify-content-start ">
                                        <img src="{{asset('gambar/leader.png')}}" alt="" width="18px">&nbsp;&nbsp;
                                        <h6 class=" text-secondary">{{$jwb->user->name}} ({{$jwb->user->role}})</h6>
                                        <br>
                                        <div class="ms-auto">
                                            <small class="text-muted fw-bold">{{Carbon\Carbon::parse($jwb->updated_at)->diffForHumans()}}</small>
                                        </div>
                                        </div>
                                        <div class="mt-2">
                                            {!!$jwb->jawaban!!}
                                        </div>
                                        <div class="d-flex justify-content-end mt-2" >
                                            @if($jwb->menjawab && Auth::user()->id == $jwb->user->id)
                                            <div class="me-auto">
                                               <a class="btn btn-sm fw-bold border border-1 border-danger" href="/kelas/materi/forum/accept/{{$mapel->id}}/{{$ptr->id}}/{{$status = 0}}/{{$jwb->id}}">  <small class="text-danger"><i class="fas fa-check-circle"></i> <small class="text-dark">BATAL TERIMA JAWABAN</small></small> </a>
                                            </div>
                                            @elseif(Auth::user()->id == $jwb->user->id)
                                            <div class="me-auto">
                                               <a class="btn btn-sm fw-bold border border-1 border-success" href="/kelas/materi/forum/accept/{{$mapel->id}}/{{$ptr->id}}/{{$status = true}}/{{$jwb->id}}">  <small class="text-success"><i class="fas fa-check-circle"></i> <small class="text-dark"> TERIMA JAWABAN</small></small> </a>
                                            </div>
                                            @endif
                                            {{-- @if ()
                                                
                                            @endif --}}
                                            @if($jwb->menjawab)
                                            <a  class="mt-2 bt-checked mb-2" data-placement="left" data-toggle="tooltip" data-type="primary" title=" Jawaban dari pertanyaan" style="max-width: 26px;">
                                                <img class="w-100  rounded-circle" src="{{asset('/gambar/checked.png')}}" alt="">
                                            </a>
                                            @elseif(Auth::user()->id == $jwb->user->id)
                                            <a class="delete-question fw-bold" data-bs-toggle="modal" data-bs-target="#tarik{{$jwb->id}}"><small><i class="fas fa-comment-slash"></i> Tarik jawaban</small></a>
                                            @endif
                                        </div>
                                    </div>

                                         {{--modal hapus jawaban--}}
                                        <div class="modal fade" id="tarik{{$jwb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content modalhapus" style="background-color: white;">
                                                <div class="modal-body">
                                                <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                                                <h2 class="text-center">Apakah kamu yakin?</h2>
                                                <p class="text-center text-muted container">Jawaban yang ditarik tidak dapat dipulihkan</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                                <form action="/kelas/materi/forum/{{$mapel->id}}/{{$ptr->id}}/{{$jwb->id}}/delete" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Tarik jawaban saya</button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                {{--modal hapus end--}}

                                @endforeach
                            </div>
                          </div>
                        </div>
                       </div>
                       @else
                       <small class="fst-italic">&#128549; Belum ada jawaban</small>
                       @endif

                    <br><br>
                    <div class="btn-question-area">
                        <a id="btn-question" class="btn-question{{$ptr->id}} text-dark rounded rounded-circle" data-placement="left" data-toggle="tooltip" data-type="primary" title="Jawab pertanyaan ini">
                            <img src="{{asset('gambar/answer.png')}}" alt="" width="40px">
                        </a>
                    </div>
                    </div>
                </div>
                @if ($ptr->user->id != Auth()->user()->id)
                <div class="col-md-2"></div>
                @endif
                @endforeach
            </div>
                <br><br>
            </div>
        </div>
        <div class="col-md-2 col-sm-10 other-forum container ">
            <div class="bg-white w-100 p-3">
                 <b class="mb-3"><i class="fas fa-chalkboard"></i> Mapel lainnya</b>
                 <div class="mt-3 ">
                @foreach ($mapelList as $mls)
                 <div class="p-2 mb-1 border border-1 rounded mapel-list">
                    <a href="/kelas/materi/forum/mapel/{{$mls->id}}/question" class="tx-main"><i class="fas fa-book"></i> {{$mls->nama}}</a>
                 </div>
                 @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@include('ruangbertanya/function/answer-form')

@endsection