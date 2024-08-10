<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'date',
    ];

    public $casts = [
        'date' => 'datetime'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tickets()
    {
        return $this->hasMany(EventTicket::class);
    }

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class);
    }

    public function sessions()
    {
        return $this->channels()
                    ->with('rooms.sessions')
                    ->get()
                    ->pluck('rooms.*.sessions')
                    ->flatten();
    }

    public function getAmountOfRegistrations()
    {
        return $this->tickets()->withCount('registrations')->get()->sum('registrations_count');
    }
}
