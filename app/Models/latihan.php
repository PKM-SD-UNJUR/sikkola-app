<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class latihan extends Model
{
    use HasFactory;

    protected $table = 'latihan';

    protected $guarded = ['id'];

    public function kelas() {
        return $this->belongsTo(kelas::class);
    }

    public function mapel() {
        return $this->belongsTo(mapel::class);
    }

    public function submitForm() {
        return $this->hasOne(submitForm::class);
    }
}
