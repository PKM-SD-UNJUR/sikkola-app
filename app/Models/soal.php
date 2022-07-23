<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mapel() {
        return $this->belongsTo(mapel::class);
    }

    public function jawabanQuiz() {
        return $this->hasMany(jawabanQuiz::class);
    }

    public function quiz() {
        return $this->belongsTo(quiz::class);
    }
}
