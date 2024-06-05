<?php

namespace App\Traits\Models;

use App\Models\CodyFighter;
use Illuminate\Support\Str;
trait HasUUID
{

    public static function booted() {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
