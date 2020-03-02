<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin','nim', 'jeniskelamin',
        'ttl','alamat','angkatan','nohp',
    ];

    protected $searchable = [
        'columns' => [
            'full_text_searches.name'  => 10,
            'full_text_searches.email'   => 10,
            'full_text_searches.password'   => 10,
            'full_text_searches.is_admin'    => 10,
            'full_text_searches.nim'  => 10,
            'full_text_searches.jeniskelamin'   => 10,
            'full_text_searches.ttl'   => 10,
            'full_text_searches.alamat'   => 10,
            'full_text_searches.angkatan'   => 10,
            'full_text_searches.nohp'   => 10,
            'full_text_searches.id'    => 10,
        ]
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
