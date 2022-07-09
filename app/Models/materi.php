<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mapel(){
        return $this->belongsTo(mapel::class);
    }

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }
}
