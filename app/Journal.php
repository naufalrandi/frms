<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded =[];

    protected $fillable = [
        'title', 'from', 'link'
    ];
}
