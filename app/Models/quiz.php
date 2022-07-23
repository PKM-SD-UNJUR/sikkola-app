<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mapel() {
        return $this->belongsTo(mapel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
