<?php

namespace App\Services;
use App\Models\CodyFighter;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class CodyFight
{
    public static function Init(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()
            ->post(
                route(
                    'codyfight.begin_queueing',
                    [
                        'ckey' => $codyFighter->key,
                        'mode' => $codyFighter->mode
                    ]
                )
            );

        if ($response->ok()) {
            //Sanitize response and turn it into a resource
        }
    }

    public static function CheckState(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()->get(route('codyfight.check_state', ['ckey' => $codyFighter->key, 'mode' => $codyFighter->mode]));
    }

    public static function UseSkill(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()->patch(route('codyfight.use_skill', ['ckey' => $codyFighter->key, 'mode' => $codyFighter->mode]));
    }

    public static function MoveCodyFighter(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()->put(route('codyfight.use_skill', ['ckey' => $codyFighter->key, 'mode' => $codyFighter->mode]));
    }

    public static function Surrender(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()->delete(route('codyfight.use_skill', ['ckey' => $codyFighter->key, 'mode' => $codyFighter->mode]));
    }
}
