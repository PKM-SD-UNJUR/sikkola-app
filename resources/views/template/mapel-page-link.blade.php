<div class="col-10 container mt-4">
    <div class="list-group list-group-horizontal-sm " id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active fw-bold text-center" href="/kelas/materi/{{$mapel->id}}/{{\Carbon\Carbon::now()->format('m')}}" aria-controls="list-home"><i class="fas fa-book"></i> Materi</a>
        <a class="list-group-item list-group-item-action fw-bold text-center" href="/latihan" aria-controls="list-profile"><i class="fas fa-pencil-alt"></i> Latihan</a>
        <a class="list-group-item list-group-item-action fw-bold text-center" href="/submit" aria-controls="list-profile"><i class="fas fa-calendar-check"></i> Tugas</a>
    </div>
 </div>