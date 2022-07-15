<div class="collapse" id="collapseTugas">
    <div class="card card-body">
        <form class="" action="/kelas/submitForm/{{$mapel->id}}" enctype="multipart/form-data" method="post">
            @csrf
            <div>
                <input type="hidden" name="mapel_id" value="{{$mapel->id}}">
                <input type="hidden" name="kelas_id" value="{{$mapel->kelas->id}}">
            </div>
            <div class="row">
                <div class="col-md-6 mt-2">
                    <label for="judul" class="mb-1 fw-bold container">Judul @error('judul')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                    <input id="judul" value="{{old('judul')}}" name="judul" class="form-control form-sm @error('judul')is-invalid @enderror" type="text" placeholder="Masukkan judul latihan disini...">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="deadline" class="mb-1 fw-bold container">Batas Waktu @error('deadline')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                    <input id="deadline" value="{{old('deadline')}}" name="deadline" class="form-control form-sm @error('deadline')is-invalid @enderror" type="datetime-local">
                </div>
                <div class="col-md-12 mt-3 mb-2">
                    <label for="editor" class="mb-1 fw-bold container">Deskripsi Tugas @error('deskripsi')<span class="text-danger" style="font-weight: 10px;"><i class="fas fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
                    <textarea class="form-control ck-editor @error('deskripsi')is-invalid @enderror" name="deskripsi" id="edit-w" cols="20" rows="30">{{ old('deskripsi')}} </textarea>
                </div>
                <div class="col-md-6 mt-3 ">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Tambah</button>
                    <a type="reset" class="btn btn-secondary" href="back()"><i class="fas fa-angle-double-left"></i> Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>


