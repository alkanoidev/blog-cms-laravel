<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zahtevi extends Model
{
    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "password",
        "avatar"
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
