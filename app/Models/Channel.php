<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_id',
    ];

    public $timestamps = false;

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
