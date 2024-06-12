<?php

namespace App\Strategies;

use App\Abstracts\Context;
use App\Collections\CodyFightResponse;
use App\Interfaces\IStrategy;

class ActionContext extends Context
{
    public function evaluate(CodyFightResponse $response): bool
    {
        return false;
    }
}
