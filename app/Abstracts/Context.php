<?php

namespace App\Abstracts;

use App\Responses\CodyFightResponse;
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
