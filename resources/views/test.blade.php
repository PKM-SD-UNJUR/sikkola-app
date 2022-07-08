<div class="mainlist mt-4 mb-4">  
    <div class="col-10 container mt-4">
        <div class="list-group list-group-horizontal-sm " id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active fw-bold text-center" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home"><i class="fas fa-book"></i> Materi</a>
            <a class="@if (auth()->user()->level=="guru" || auth()->user()->kelas== 1)list-group-item list-group-item-action fw-bold text-center @else list-group-item list-group-item-action fw-bold text-center disabled @endif" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile"><i class="fas fa-pencil-alt"></i> Latihan</a>
            <a class="@if (auth()->user()->level=="guru" || auth()->user()->kelas== 1)list-group-item list-group-item-action fw-bold text-center @else list-group-item list-group-item-action fw-bold text-center disabled @endif" id="list-profile-list" data-bs-toggle="list" href="#submision" role="tab" aria-controls="list-profile"><i class="fas fa-calendar-check"></i> Tugas</a>
        </div>
     </div>
      <div class="container mt-2">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active container" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="row">

          {{-- Bulan     --}}
              <div class="col-12 container mb-2">
                <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
                  <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#januari" role="tab" aria-controls="list-home">Januari</a>
                  <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#februari" role="tab" aria-controls="list-profile">Februari</a>
                  <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#maret" role="tab" aria-controls="list-messages">Maret</a>
                  <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#april" role="tab" aria-controls="list-settings">April</a>
                  <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#mei" role="tab" aria-controls="list-home">Mei</a>
                  <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#juni" role="tab" aria-controls="list-profile">Juni</a>
                  <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#juli" role="tab" aria-controls="list-messages">July</a>
                  <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#agustus" role="tab" aria-controls="list-settings">Agustus</a>
                  <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#september" role="tab" aria-controls="list-home">September</a>
                  <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#oktober" role="tab" aria-controls="list-profile">Oktober</a>
                  <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#november" role="tab" aria-controls="list-messages">November</a>
                  <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#desember" role="tab" aria-controls="list-settings">Desember</a>
                </div>
              </div>
              <div class="container">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="januari" role="tabpanel" aria-labelledby="list-profile-list">
                    @foreach ($data as $item)
                    @if(\Carbon\Carbon::parse($item->tanggal)->format('F')=='January')
                      <div class="card activitycard">
                          <div class="card-header d-flex">
                              <h5>{{ $item->hari }}, {{ $item->tanggal }}</h5>
                              <div class="ms-auto" style="float: right;">
                                @if (auth()->user()->level=="guru")
                                <a href="/kelas1/ips/ubah/{{ $item->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                @endif
                                  {{-- Konfirmasi hapus materi modals --}}
                                  <!-- Modal -->
                                    <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content modalhapus" style="background-color: white;">
                                          <div class="modal-body">
                                            <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                                            <h2 class="text-center">Apakah kamu yakin?</h2>
                                            <p class="text-center text-muted container">Materi yang dihapus tidak dapat dipulihkan</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                            <a href="/kelas1/ips/hapus/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Materi</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                              </div>
                          </div>
                          <table class="">
                              <tr>
                                  <td><h5 class="card-title container" style="color: #1A5276;">Topik&nbsp;</h5></td>
                                  <td><h5 class="card-title" style="color: #1A5276;">:</h5></td>
                                  <td><h5 class="card-title container" style="color: #1A5276;">{{ $item->Topik }}</h5></td>
                              </tr>
                              <tr>
                                  <td><p class="container">Judul</p></td>
                                  <td><p class="">:</p></td>
                                  <td><p class="container">{{ $item->Judul }}</p></td>
                              </tr>
                              <tr>
                                  <td><p class="container" style="margin-top: -15px; color: #D4AC0D;"><i class="fas fa-clock"></i>Time</p></td>
                                  <td><p class="" style="margin-top: -15px; color: #D4AC0D;">:</p></td>
                                  <td><p class="container" style="margin-top: -15px; color: #D4AC0D;">{{ $item->waktumulai }} sampai {{ $item->waktuselesai }}</p></td>
                              </tr>
                          </table>
                          <div class="card-body">
                            {{-- <p class="card-text text-muted" style="margin-top: -15px;">Deskripsi : {!!$item->deskripsi!!}</p> --}}
                            @if ($item->deskripsi!=NULL)
                              <div class="accordion mb-2" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#des{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                      <i class="fas fa-info-circle"></i> &nbsp;Deskripsi
                                    </button>
                                  </h2>
                                  <div id="des{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <strong>Apa yang akan dilakukan siswa pada materi ini ?</strong><br>
                                      <p>{!!$item->deskripsi!!}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                            @if ($item->vidio != NULL)
                              <button class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#video{{ $item->id }}"><i class="fab fa-youtube"></i> Play Video</button>
                            @endif
                            @if ($item->file != NULL)
                              <a href="/kelas1/ips/download/{{$item->file}}" class="btn btn-outline-info"><i class="fas fa-file-alt"></i> Download Materi</a>
                            @endif

                          </div>
                        </div>
                        {{-- Modal Video --}}
                      <!-- Modal -->
                      <div class="modal fade" id="video{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content modalbl">
                            <div class="modal-header">
                              <img src="{{ asset('gambar/robotvideo.gif') }}" style="max-width: 60px;" alt=""> 
                            <h4 class="modal-title" id="exampleModalLabel">Tonton Video Yukk!</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="container col-12">
                              <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$item->vidio}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <br>
                        </div>
                        </div>
                    </div>
                    <br>
                    @endif
                  @endforeach
                  </div>
                  {{--end0fjanuary--}}
                 
                </div>
              </div>
            </div>
          </div>
          
          
         
        </div>
      </div>
    </div>
























 {{-- submision --}}
 <div class="tab-pane fade bg-light" id="submision" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card">
      <h5 class="card-header">
        @if (auth()->user()->level=="guru")
        <button id="tambahsubmitan" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah Submitan</button>
        @endif
        <a href="/kelas1/ips" class="btn btn-outline-secondary"><i class="fas fa-sync-alt refresh"></i></a>&nbsp;
      </h5>
      <div class="card-body">
      {{--alert error--}}
      <div class="container">
      </div>
        {{-- form tambah submission --}}
        <div class="card mb-4 formtambah">
          <div class="card-header text-center">
            Tambah Tugas
          </div>
          <div class="card-body container">
            {{-- alert error --}}
            <center>
            <form class="" action="/kelas1/ips/addsubmission" enctype="multipart/form-data" method="post" >
              {{ method_field('POST') }}
              @csrf
              <table cellpadding="2">
                <tr>
                  <td>Judul</td>
                  <td>:</td>
                  <td><input name="judul" class="form-control" type="text" placeholder="Masukkan judul submitan disini..."></td>
                </tr>
                <tr>
                  <td>Deadline</td>
                  <td>:</td>
                  <td><input name="bataswaktu" class="form-control" type="datetime-local"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Publish</button></td>
                </tr>
              </table>
          </form>
        </center>
          </div>
        </div>
      {{-- list submitan --}}
      @foreach ($submit as $sub)
      <div class="card text-center" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div class="card-body">
          <h5 class="card-title">{{$sub->judul}} <a data-bs-toggle="modal" data-bs-target="#deletekuis{{$sub->id}}" style="font-size: 15px;" class="text-muted"><i class="far fa-trash-alt"></i></a></h5>
          {{-- Konfirmasi hapus materi modals --}}
           <!-- Modal -->
            <div class="modal fade" id="deletekuis{{$sub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content modalhapus" style="background-color: white;">
                  <div class="modal-body">
                    <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                    <h2 class="text-center">Apakah kamu yakin?</h2>
                    <p class="text-center text-muted container">Submission yang dihapus tidak dapat dipulihkan</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                    <a href="/kelas1/ips/submisionform/delete/{{$sub->id}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Form Submit</a>
                  </div>
                </div>
              </div>
            </div>
            {{--end hapus--}}
          <div class="col-8 container">
          <table class="table table-striped table-hover container">
            <tr>
              <th>Batas Pengumpulan</th>
              <td>:</td>
              <td>{{$sub->bataswaktu}}</td>
            </tr>
            <tr>
              <th>Waktu Pengingat</th>
              <td>:</td>
              <td>
                @php
                $time = \Carbon\Carbon::now()->diffForHumans($sub->bataswaktu);
                str_replace('after','more',$sub->bataswaktu);
                @endphp
                {{$time}}
              </td>
            </tr>
          </table>
        </div>
          {{-- form-submitan = /kelas1/ips/addsubmit --}}
          <div class="col-8 container">
          <form class="container mb-2" action="/kelas1/ips/addsubmit" enctype="multipart/form-data" method="post" class="dropzone dz-clickable" >
            {{ method_field('POST') }}
            @csrf
            <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
            <input type="hidden" name="submit_id" value="{{$sub->id}}">
            <input id="file" name="file" class="form-control form-sm dropzone" type="file">
            <div class="dz-default dz-message">
            <span class="text-muted fw-bold"><i class="fas fa-cloud-upload-alt"></i> Seret atau jatuhkan file disini</span>
            </div>
            <br>
              <button type="submit" class="btn btn-outline-secondary kumpul-tugas{{$sub->id}}"><i class="fas fa-upload"></i> Kumpulkan Tugas</button>
              @if (auth()->user()->level=="guru")
              <a class="btn btn-outline-secondary" data-bs-toggle="offcanvas" href="#daftarsubmit{{$sub->id}}" role="button" aria-controls="offcanvasExample"><i class="fas fa-list-ul"></i> Daftar Tugas</a>
              @endif
          </form>
          </div>
     
          
          {{-- daftar submision --}}
          <div class="offcanvas offcanvas-start" tabindex="-1" id="daftarsubmit{{$sub->id}}" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Daftar Submision</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>File Tugas</th>
                  <th>Status</th>
                </tr>
                @php $i = 1 @endphp
                @foreach ($submited as $tugas)
                @if ($sub->id == $tugas->submit_id) 
                <tr>
                  <td>{{ $i }}</</td>
                  <td>{{$tugas->nama}}</td>
                  <td>
                    <a href="/kelas1/ips/submit/download/{{$tugas->file}}" class="link-secondary"><i class="fas fa-file-download"> {{$tugas->file}}</i></a>
                  </td>
                  @if ($tugas->created_at->isBefore($sub->bataswaktu))
                      <td class="table-success">Tepat Waktu</td>
                  @else
                      <td class="table-danger">Terlambat</td>
                  @endif
                </tr>
                @php
                $i++ 
             @endphp
                @endif
                @endforeach
              </table>
            </div>
          </div>
        </div>
        @foreach ($submited as $tugas)
        @if (Auth::user()->name == $tugas->nama &&  $sub->id == $tugas->submit_id)
        <a class="detail-submit{{$sub->id}}" style="cursor: pointer"><i class="fas fa-info-circle"></i> Detail Submitan ({{$tugas->nama}})</a><br>
        <div class="col-8 container detail-submitan{{$sub->id}}">
        <table class="table table-striped table-hover">
          <tr>
            <td>File</td>
            <td>:</td>
            <td><a href="/kelas1/ips/submit/download/{{$tugas->file}}" class="link-secondary"><i class="fas fa-file-download"> {{$tugas->file}}</i></a></td>
          </tr>
          <tr>
            <td>Waktu Pengumpulan</td>
            <td>:</td>
            <td>{{$tugas->created_at}}</td>
          </tr>
          @if ($tugas->created_at->isBefore($sub->bataswaktu))
          <tr class="table-success">
            <td>Status</td>
            <td>:</td>
            <td>Tepat waktu</td>
          </tr>
          @else
          <tr class="table-danger">
            <td>Status</td>
            <td>:</td>
            <td>Telat</td>
          </tr>
          @endif
          <tr>
            <td>
              <a href="/kelas1/ips/submit/ubah/{{$tugas->id}}" class="link-secondary"><i class="fas fa-edit"></i> Edit</a>&nbsp;
            </td>
            <td></td>
            <td>
              <a class="text-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$tugas->id}}"><i class="far fa-trash-alt"></i> Hapus</a>
              {{-- Konfirmasi hapus materi modals --}}
              <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$tugas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content modalhapus" style="background-color: white;">
                      <div class="modal-body">
                        <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                        <h2 class="text-center">Apakah kamu yakin?</h2>
                        <p class="text-center text-muted container">Tugas yang dihapus tidak dapat dipulihkan</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                        <a href="/kelas1/ips/destroysubmit/{{$tugas->id}}" id="#deletekuis{{$sub->id}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Tugas</a>
                      </div>
                    </div>
                  </div>
                </div>
              {{--end hapus--}}
            </td>
          </tr>
        </table>
        </div> 
        @endif
        @endforeach
        <div class="card-footer text-muted mt-1">
          {{$sub->created_at->diffForHUmans()}}
        </div>
      </div>  
      @endforeach 
    </div>
  </div>
</div>



























    {{--latihan--}}
    <div class="tab-pane fade bg-light" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
              <li class="nav-item ">
                <div class="d-flex">
                  @if (auth()->user()->level=="guru")
                  <a class="btn btn-primary fw-bold ms-auto" href="/kelas1/ips/kuis/tambah"><i class="fas fa-plus-square"></i> Tambah Quis</a>&nbsp;
                  @endif
                  <a href="/kelas1/ips" class="btn btn-outline-secondary"><i class="fas fa-sync-alt refresh"></i></a>&nbsp;
                  <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#policy"><i class="fas fa-tasks"></i></button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="policy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="background-image: url('{{asset('gambar/chalkboard.jpg')}}'); border: 12px solid #784212;">
                      <div class="modal-body">
                        <ul class="" style="color: #F9E79F;">
                          <h4 class="text-center">Keterangan :</h4>
                          <li>Diharapkan untuk memasuki ruang kuis 10 menit sebelum kuis dimulai</li><br>
                          <li>Tombol untuk memasuki kuis tidak akan tersedia lagi jika waktu sudah tepat dengan waktu yang ditentukan</li><br>
                          <li>jika anda menekan tombol <span class="text-warning">"Masuk Kuis Sekarang"</span> anda akan dialihkan ke web Kahoot dan tunggu instruksi selanjutnya dari guru</li>
                        </ul>
                        <center><br>
                          <button type="button" class="btn btn-sm border border-2 text-light" data-bs-dismiss="modal">Oke, Saya mengerti</button>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>

              </li>
            </ul>
          </div>
          <style>
            .btn-quiz{
              transition: 0.3s;
            }
            .btn-quiz:hover{
              transform: scale(1.08);
            }
          </style>
          <div class="card-body container">
            {{-- area kuis --}}
            <div class="contianer row">

              @forelse ($kuis as $quiz)
              @if($quiz->tanggal <= \Carbon\Carbon::now("Asia/Jakarta")->toDateString())
              <div class="col-md-4 container card-quiz" style="width: 18rem;">
                <div class="card-body">
                    <small class="text-muted">
                      @php
                         $result =  \Carbon\Carbon::parse($quiz->waktumulai)->diffForHumans(\Carbon\Carbon::now("Asia/Jakarta")->toTimeString());
                         Str::replace('setelahnya', 'lagi', $result);
                      @endphp
                      @if ($quiz->tanggal < \Carbon\Carbon::now("Asia/Jakarta")->toDateString())
                          Selesai
                        @else
                          {{$result}}
                      @endif
                    </small>


                    @if ($quiz->tanggal >= \Carbon\Carbon::now("Asia/Jakarta")->toDateString())
                      @if ($quiz->waktumulai  > \Carbon\Carbon::now("Asia/Jakarta")->toTimeString())
                          {{$quiz->waktumulai > \Carbon\Carbon::now("Asia/Jakarta")->hour }}
                        <small class="bg-success rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-bolt"></i>Baru</small> 
                        @else
                        <small class="bg-danger rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-check-circle"></i>Sudah Dimulai</small>
                      @endif
                    @else
                    <small class="bg-danger rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-check-circle"></i>Selesai</small>
                    @endif

                  <h5 class="quiz-time fw-bold text-dark">{{$quiz->topik}}</h5>
                  <div class="d-flex">
                    <h6 class="quiz-time"><i class="fas fa-stopwatch"></i> {{$quiz->waktumulai}} WIB</h6>&nbsp;
                    @if ($quiz->keterangan != NULL)
                    <a class="link-info fw-bold" style="margin-top: -3px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#keterangan{{$quiz->id}}"><i class="fas fa-info-circle"></i> info</a>
                    @endif
                     <!-- Modal -->
                      <div class="modal fade" id="keterangan{{$quiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="text-center">Keterangan :</h4>
                                {!!$quiz->keterangan!!}
                              <center><br>
                                <button type="button" class="btn btn-primary btn-sm text-light" data-bs-dismiss="modal">Oke, Saya mengerti</button>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  {{-- <div class="d-flex"> --}}
                  <a href="{{$quiz->link}}" class="btn btn btn-quiz text-light fw-bold mt-1 @if($quiz->tanggal < \Carbon\Carbon::now("Asia/Jakarta")->toDateString()) disabled @endif" style="background-color: #F39C12; align-item: left;">
                     Masuk Quiz Sekarang 
                  <i class="fas fa-sign-in-alt">
                  </i></a><br>
                  <div class="d-flex mt-1 p-1">
                    <small class="text-muted" style="font-size: 12px"><i class="fas fa-calendar-alt"></i> {{$quiz->tanggal}}</small>&nbsp;&nbsp;
                    @if (auth()->user()->level=="guru")
                    <a href="" class="text-muted" style="font-size: 12px; cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#deletekuis{{$quiz->id}}"><i class="far fa-trash-alt"></i> Hapus</a>
                  {{-- Konfirmasi hapus materi modals --}}
                  <!-- Modal -->
                    <div class="modal fade" id="deletekuis{{$quiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content modalhapus" style="background-color: white;">
                          <div class="modal-body">
                            <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                            <h2 class="text-center">Apakah kamu yakin?</h2>
                            <p class="text-center text-muted container">Materi yang dihapus tidak dapat dipulihkan</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                            <a href="/kelas1/ips/kuis/hapus/{{ $quiz->id }}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Materi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                  {{-- </div> --}}
                </div>
              </div>
                @else
                <div class="card card-quiz text-center container  mb-2" style="width: 18rem;">
                  <div class="card-body">
                    <center><small class="bg-secondary rounded-pill text-light" style="width: max-content; padding-right: 3px; padding-left: 3px; font-size: 10px;"><i class="fas fa-bolt"></i>Segera Hadir</small> </center>
                    <h5 class="card-title">{{$quiz->topik}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="far fa-calendar-alt"></i> {{$quiz->tanggal}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-stopwatch"></i> {{$quiz->waktumulai}}</h6>
                    <h5 class="card-text text-muted"><i class="far fa-smile-beam"></i> Quiz Coming Soon</h5>
                  </div>
                </div>
                @endif  
                @empty
                <h1 class="container text-muted">Belum ada Kuis</h1>          
              @endforelse
                 

            </div>
          </div>
        </div>
      </div>
    {{--end of latihan--}}