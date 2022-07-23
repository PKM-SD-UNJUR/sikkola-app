<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizResult extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function quiz() {
        return $this->belongsTo(quiz::class);
    }

    public function user() {
        return $this->belongsTo(user::class);
    }

    public function soal() {
        return $this->belongsTo(soal::class);
    }
}
