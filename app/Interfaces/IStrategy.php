<?php

namespace App\Interfaces;

use App\Collections\CodyFightResponse;

interface IStrategy
{
    public function evaluate(CodyFightResponse $response);
    public function execute();
}
