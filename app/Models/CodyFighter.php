<?php

namespace App\Models;

use App\Traits\Models\HasUUID;
use App\Traits\Models\HasCodyFighterOptions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodyFighter extends Model
{
    use HasFactory, HasUUID, HasCodyFighterOptions;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'key',
        'gameMode'
    ];

    public function scopeKey(Builder $query, string $cKey)
    {
        $query->where('key', $cKey);
    }

    public function scopeMode(Builder $query, string $mode)
    {
        $query->where('mode', $mode);
    }
}
