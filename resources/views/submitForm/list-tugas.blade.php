@if(Auth::user()->role=='guru')
<form class="" action="/kelas/submitForm/{{$mapel->id}}/{{$m->id}}/update" enctype="multipart/form-data" method="post">
    @csrf
    @endif

    <div class="row">
        <div class="col-md-11 card-materi-desc bg-white p-4">


            <div class="row">
                <div class="col-md-3 py-2" style="max-width: 60px;">
                    <img class="img-materi-card" src="{{asset("icon/tugas.png")}}" alt="">
                    <div class="line-tugas-card mt-2"></div>
                </div>

                <div class="col-md-11 mt-1 text-center">
                    @if(Auth::user()->role=='siswa')
                    <h4 class="fw-bold mb-3">{{$m->judul}}</h4>
                    @else
                    <input type="text" name="judul" class="form-control text-center mb-3 fs-4" value="{{$m->judul}}">
                    @endif
                    <table class="table table-hover hero text-start">
                        <tr>
                            <th>Batas Pengumpulan</th>
                            <td>:</td>
                            @if(Auth::user()->role=='siswa')
                            <td>{{$m->deadline}}</td>
                            @else
                            <td><input name="deadline" type="datetime-local" class="form-control" value="{{$m->deadline}}"></td>
                            @endif
                        </tr>
                        <tr>
                            <th>Waktu Pengingat</th>
                            <td>:</td>
                            <td>
                                @php
                                $time = \Carbon\Carbon::now()->diffForHumans($m->deadline);
                                str_replace('after','more',$m->deadline);
                                @endphp
                                {{$time}}
                            </td>
                        </tr>
                    </table>
                    @if ($m->deskripsi != null)
                    <div class="mt-2">
                        @if(Auth::user()->role=='siswa')
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button rounded collapsed border border-1 border-info fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#deskripsi{{$m->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Deskripsi Tugas
                                    </button>
                                </h2>
                                <div id="deskripsi{{$m->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-start">
                                        {!!$m->deskripsi!!}
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                        @else
                        <label for="editor" class="mb-1 fw-bold container text-start">Deskripsi Tugas @error('deskripsi')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                        <textarea class="form-control ck-editor @error('deskripsi')is-invalid @enderror text-start" name="deskripsi" id="edit-x">{{ old('deskripsi',$m->deskripsi)}} </textarea>
                        @endif
                    </div>

                    @endif

                    <div class="mt-3 border border-2 py-3 px-3">
                        @include('submitForm.tambah-submission')
                    </div>

                </div>
            </div>


        </div>
        <div class="col-md-1">

            @if(Auth::user()->role == 'guru')
            <div class="p-2 mb-2 bg-white menu-materi-card">
                <button type="submit" class="btn fw-bold"><i class="fas fa-edit"></i> UBAH</button>
            </div>

            <div class="p-3 bg-white  menu-materi-card">
                <a class="fw-bold text-danger" data-bs-toggle="modal" data-bs-target="#delete{{$m->id}}"><i class="fas fa-trash"></i> HAPUS</a>
            </div>
            @endif

            {{--modal hapus--}}
            <div class="modal fade" id="delete{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modalhapus" style="background-color: white;">
                        <div class="modal-body">
                            <h1 class="text-center text-warning warning"><i class="fas fa-exclamation-triangle"></i></h1>
                            <h2 class="text-center">Apakah kamu yakin?</h2>
                            <p class="text-center text-muted container">Tugas yang dihapus tidak dapat dipulihkan</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                            <a href="/kelas/submitForm/{{$mapel->id}}/{{$m->id}}/delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--modal hapus end--}}

            <div class="bg-white calendar  menu-materi-card mt-3">
                <div class="calender-block d-flex">
                    <button class="btn btn-sm btn-dark"></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-sm btn-dark"></button>
                </div>
                <img class="pin-icon" src="{{asset('icon/pin.png')}}" alt="">
                <div class="bg-danger text-center cal-title rounded px-2 py-1 text-sm fw-bold text-white text-uppercase">
                    {{\Carbon\Carbon::parse($m->deadline)->formatLocalized('%b')}}
                    {{\Carbon\Carbon::parse($m->deadline)->format('Y')}}
                </div>
                <div class="py-2 text-center">
                    <h1 class="text-secondary fw-bold">{{\Carbon\Carbon::parse($m->deadline)->format('d')}}</h1>
                    <small class="text-uppercase fw-bold text-sm">{{\Carbon\Carbon::parse($m->deadline)->format('l')}}</small>
                </div>
            </div>

        </div>
    </div>

    @if(Auth::user()->role=='guru')
</form>
@endif

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });
    });
</script>

<script>

    ClassicEditor
    .create( document.querySelector( '#edit-x' ) )
    .catch( error => {
        console.error( error );
    } );


</script>

<script>

    ClassicEditor
    .create( document.querySelector( '#edit-w' ) )
    .catch( error => {
        console.error( error );
    } );


  </script>