<?php

namespace App\Services;

use App\Collections\CodyFightResponse;
use App\Models\CodyFighter;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CodyFight
{
    public static function Init(CodyFighter $codyFighter): CodyFightResponse
    {
        $response = Http::acceptJson()
            ->post(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );

        if ($response->ok()) {
            return CodyFight::GetSanitizedResponse($response);
        }
    }

    public static function CheckState(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()
            ->get(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );

            if ($response->ok()) {
                return CodyFight::GetSanitizedResponse($response);
            }
    }

    public static function UseSkill(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()
            ->patch(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );

            if ($response->ok()) {
                return CodyFight::GetSanitizedResponse($response);
            }
    }

    public static function MoveCodyFighter(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()
            ->put(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );

            if ($response->ok()) {
                return CodyFight::GetSanitizedResponse($response);
            }
    }

    public static function Surrender(CodyFighter $codyFighter)
    {
        $response = Http::acceptJson()
            ->delete(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );

            if ($response->ok()) {
                return CodyFight::GetSanitizedResponse($response);
            }
    }

    public static function Fake(): CodyFightResponse
    {
        return CodyFightResponse::make(
            json_decode(
                Storage::disk('states')
                ->get('GameStarted.json')
            )
        )->dot();
    }

    public static function GetSanitizedResponse($response)
    {
        //Sanitize response and turn it into a resource
        //@var CodyFightResponse $singletonResponse
        $singletonResponse = App::make(CodyFightResponse::class);

        $singletonResponse->Update($response->json());

        return $singletonResponse;
    }
}
