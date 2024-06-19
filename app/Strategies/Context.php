<?php

namespace App\Strategies;

use App\Responses\CodyFightResponse;
use Illuminate\Support\Facades\App;

class Context
{
    protected ActionContext $actionContext;

    protected MovementContext $movementContext;

    public function EvaluateAction(CodyFightResponse $response): void
    {
        //
        if ($this->actionContext->evaluate($response)) {
            $this->actionContext->execute();
            return;
        }

        if ($this->movementContext->evaluate($response)) {
            $this->movementContext->execute();
            return;
        }

        //Do nothing and skip turn
    }

    public static function TakeAction(CodyFightResponse $response)
    {
        $scopedContext = App::make(Context::class);

        $scopedContext->EvaluateAction($response);
    }
}
