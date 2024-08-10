<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'channel_id',
    ];

    public $timestamps = false;

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
