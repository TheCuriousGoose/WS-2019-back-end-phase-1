<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organizer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'password_hash'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
