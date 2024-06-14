<?php

namespace App\Interfaces;

use App\Responses\CodyFightResponse;

interface IStrategy
{
    public function evaluate(CodyFightResponse $response);
    public function execute();
}
