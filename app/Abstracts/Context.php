<?php

namespace App\Abstracts;

use App\Collections\CodyFightResponse;
use App\Interfaces\IStrategy;

abstract class Context
{
    protected IStrategy $strategy;

    public abstract function evaluate(CodyFightResponse $response): bool;

    public function execute()
    {
        $this->strategy->execute();
    }
}
