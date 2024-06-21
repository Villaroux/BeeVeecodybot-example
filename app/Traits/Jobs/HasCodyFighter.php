<?php

namespace App\Traits\Jobs;

use App\CodyFight\Entities\CodyFighter;

trait HasCodyFighter
{
    protected CodyFighter $codyFighter;

    public function SetCodyfighter(CodyFighter $codyFighter)
    {
        $this->codyFighter = $codyFighter;
    }
}
