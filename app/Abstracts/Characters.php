<?php

namespace App\Abstracts;

use App\CodyFight\Entities\Stats;

class Characters
{
    public function __construct(protected Stats $stats) {
    }
}
