<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function mapel(){
        return $this->hasMany(mapel::class);
    }

    public function latihan(){
        return $this->hasMany(latihan::class);
    }
}
