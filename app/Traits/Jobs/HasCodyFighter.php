<?php

namespace App\Traits\Jobs;

use App\CodyFight\Entities\CodyFighter;

trait HasCodyFighter
{
    protected CodyFighter $codyFighter;

    public function SetCodyfighter(CodyFighter $codyFighter): self
    {
        $this->codyFighter = $codyFighter;

        return $this;
    }
}
