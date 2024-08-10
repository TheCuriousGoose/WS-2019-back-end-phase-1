<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'speaker',
        'room_id',
        'cost',
        'start',
        'end',
        'description'
    ];

    public $timestamps = false;

    public $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function registrations()
    {
        return $this->hasMany(SessionRegistration::class, 'session_id');
    }
}
