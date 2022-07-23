<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawabanQuiz extends Model
{
    use HasFactory;

    protected $table = 'jawaban_quizzes';

    protected $guarded = ['id'];

    

 
    public function user() {
        return $this->belongsTo(user::class);
    }
    public function quiz() {
        return $this->belongsTo(quiz::class);
    }

}
