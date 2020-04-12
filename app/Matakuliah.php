<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = [
        'kode', 'matkulwajib', 'sks','prasyarat','cosyarat', 'semester_id', 'minat'
    ];
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function filemateri()
    {
        return $this->hasMany(Filemateri::class);
    }
}
