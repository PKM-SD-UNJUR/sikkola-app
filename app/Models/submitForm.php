<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submitForm extends Model
{
    use HasFactory;

    protected $table = 'submit_form';

    protected $guarded = ['id'];

    public function latihan() {
        return $this->belongsTo(latihan::class);
    }

    public function submission() {
        return $this->hasMany(submission::class);
    }
}
