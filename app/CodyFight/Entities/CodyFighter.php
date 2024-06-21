<?php

namespace App\CodyFight\Entities;

use App\Abstracts\Characters;
use App\Enum\CharacterArchetype;
use App\Traits\Models\HasCodyFighterOptions;

class CodyFighter extends Characters
{
    use HasCodyFighterOptions;

    public function __construct(public string $cKey, public CharacterArchetype $archetype) {
        parent::__construct(Stats::make());
    }
}
