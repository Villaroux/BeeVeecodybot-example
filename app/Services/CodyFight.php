<?php

namespace App\Services;

use App\Responses\CodyFightResponse;
use App\Models\CodyFighter;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class CodyFight
{
    /**
     * Start Queuing for a match
     *
     * @param CodyFighter $codyFighter
     * @return CodyFightResponse
     */
    public static function Init(CodyFighter $codyFighter): CodyFightResponse
    {
        //TODO::Use data in CodyFighterOptions
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

    /**
     * Check state of a codyfighter
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function CheckState(CodyFighter $codyFighter)
    {
        //TODO::Use data in CodyFighterOptions
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

    /**
     * Use a skill
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function UseSkill(CodyFighter $codyFighter)
    {
        //TODO::Use data in CodyFighterOptions
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

    /**
     * Move a codyfighter
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function MoveCodyFighter(CodyFighter $codyFighter)
    {
        //TODO::Use data in CodyFighterOptions
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

    /**
     * Surrender
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function Surrender(CodyFighter $codyFighter)
    {
        //TODO::Use data in CodyFighterOptions
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

    /**
     * Example for testing purposes
     *
     * @return CodyFightResponse
     */
    public static function Fake(): CodyFightResponse
    {
        return CodyFightResponse::make(
            json_decode(
                associative: true,
                json: Storage::disk('states')
                ->get('GameStartedcopy.json')
            )
        );
    }

    /**
     * Transforms response to custom response
     *
     * @param Response $response
     * @return void
     */
    public static function GetSanitizedResponse(Response $response): CodyFightResponse
    {
        //TODO:: Probably remove since we will be running multiple jobs that will not enable to do this
        $singletonResponse = CodyFightResponse::make(
            json_decode(
                json: $response->json(),
                associative: true
            )
        );

        return $singletonResponse;
    }
}
