<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submission extends Model
{
    use HasFactory;

    protected $table = 'submission';

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function submitForm() {
        return $this->belongsTo(submitForm::class);
    }
}
