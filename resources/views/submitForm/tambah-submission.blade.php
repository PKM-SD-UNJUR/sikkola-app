<form class="container mb-3 mt-3" action="/kelas/submission/{{$mapel->id}}" enctype="multipart/form-data" method="post" class="dropzone dz-clickable">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="submitForm_id" value="{{$m->id}}">


    @if (auth()->user()->role=="siswa")

    <input id="file" name="file" class="form-control form-sm dropzone @error('file')is-invalid @enderror" type="file">
    <div class="dz-default dz-message @error('file')is-invalid @enderror">
        <span class="text-muted fw-bold"><i class="fas fa-cloud-upload-alt"></i> Seret atau jatuhkan file disini</span>
        <br>
        @error('file')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror
    </div>
    <br>
    <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-upload"></i> Kumpulkan Tugas</button>

    &nbsp;&nbsp;&nbsp;
    @endif

</form>



@if (auth()->user()->role=="guru")

<a class="btn btn-outline-secondary" data-bs-toggle="offcanvas" href="#daftarsubmit{{$m->id}}" role="button" aria-controls="offcanvasExample"><i class="fas fa-list-ul"></i> Lihat Daftar Tugas Siswa</a>

<div class="offcanvas offcanvas-start" tabindex="-1" id="daftarsubmit{{$m->id}}" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel">Daftar Tugas Siswa</h5>
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
            <?php $i = 1 ?>
            @foreach ($submission->where('submitForm_id',$m->id) as $sub)
            <tr>
                <td>{{$i}}</td>
                <td>{{$sub->user->name}}</td>
                <td><a href="{{asset("storage/$sub->file")}}" class="link-secondary" target="_blank"><i class="fas fa-file-download"> file-{{$i}}</i></a></td>
                @if ($sub->updated_at->isBefore($m->deadline))
                <td class="table-success">Tepat Waktu</td>
                @else
                <td class="table-danger">Terlambat</td>
                @endif
            </tr>
            <?php $i++ ?>
            @endforeach
        </table>
    </div>
</div>

@else

@foreach ($submission->where('submitForm_id',$m->id)->where('user_id',Auth::user()->id) as $tugas)
<a data-bs-toggle="collapse" href="#collapseTugas{{$tugas->id}}" role="button" aria-expanded="false" aria-controls="collapseTugas{{$tugas->id}}" style="cursor: pointer"><i class="fas fa-info-circle"></i> Lihat Submitan</a><br>
<div class="col-10 container collapse mt-3" id="collapseTugas{{$tugas->id}}">
    <table class="table table-striped table-hover">
        <tr>
            <td>File</td>
            <td>:</td>
            <td><a  href="{{asset("storage/$tugas->file")}}" class="link-secondary" target="_blank"><i class="fas fa-file-download"> Tugas Saya</i></a></td>
        </tr>
        <tr>
            <td>Waktu Pengumpulan</td>
            <td>:</td>
            <td>{{$tugas->updated_at}}</td>
        </tr>
        @if ($tugas->updated_at->isBefore($m->deadline))
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahTugas{{$tugas->id}}"><i class="fas fa-edit"></i> Ubah</button>&nbsp;

                {{-- Form Ubah Tugas --}}
                <!-- Modal -->
                <div class="modal fade" id="ubahTugas{{$tugas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" action="/kelas/submission/{{$mapel->id}}/{{$tugas->id}}/update" method="post">
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Tugas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mt-3">
                                        <div class="d-flex justify-content-center">
                                            <label class="mx-4 w-10">File</label>
                                            <input type="file" name="filebaru" class="form-control mx-4" autofocus autocomplete="off">
                                        </div>
                                        @error('filebaru')
                                        <div class="text-start text-danger alert-danger mt-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer d-flex">
                                    <button style="width: 40%" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
                                    <button style="width: 40%" type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{--END---}}

            </td>
            <td></td>
            <td>
                <a class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$tugas->id}}"><i class="far fa-trash-alt"></i> Hapus</a>

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
                                <a href="/kelas/submission/{{$mapel->id}}/{{$tugas->id}}/delete" id="#deletekuis{{$m->id}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Hapus Tugas</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--end hapus--}}


            </td>
        </tr>
    </table>
    <div class="card-footer text-muted mt-1">
        {{$tugas->updated_at->diffForHUmans()}}
    </div>
</div>
@endforeach

@endif