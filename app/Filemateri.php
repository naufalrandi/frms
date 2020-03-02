<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filemateri extends Model
{
    protected $fillable = [
        'name','file', 'matkul_id'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }
}
