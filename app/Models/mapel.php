<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';

    protected $guarded = ['id'];

    public function kelas(){
        return $this->belongsTo(kelas::class,'kelas_id');
    }

    public function materi(){
        return $this->hasMany(materi::class);
    }
}
