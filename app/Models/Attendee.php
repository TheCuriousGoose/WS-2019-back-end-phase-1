<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_token'
    ];

    public $timestamps = false;

    public $hidden = [
        'login_token'
    ];
}
