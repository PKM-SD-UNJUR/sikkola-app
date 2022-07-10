<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas(){
        return $this->belongsTo(kelas::class);
    }

    public function materi(){
        return $this->hasMany(materi::class);
    }
}
