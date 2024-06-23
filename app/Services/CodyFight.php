<?php

namespace App\Services;

use App\Responses\CodyFightResponse;
use App\CodyFight\Entities\CodyFighter;
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

        return CodyFight::GetSanitizedResponse($response, $codyFighter);
    }

    /**
     * Check state of a codyfighter
     *
     * @param CodyFighter $codyFighter
     * @return CodyFightResponse
     */
    public static function CheckState(CodyFighter $codyFighter): CodyFightResponse
    {
        //TODO::Use data in CodyFighterOptions
        $response = Http::acceptJson()
            ->get(
                route(
                    'codyfight.begin_queueing',
                    $codyFighter->GetOptionsArray()
                )
            );


        return CodyFight::GetSanitizedResponse($response, $codyFighter);
    }

    /**
     * Use a skill
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function UseSkill(CodyFighter $codyFighter): CodyFightResponse
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
                return CodyFight::GetSanitizedResponse($response, $codyFighter);
            }
    }

    /**
     * Move a codyfighter
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function MoveCodyFighter(CodyFighter $codyFighter): CodyFightResponse
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
                return CodyFight::GetSanitizedResponse($response, $codyFighter);
            }
    }

    /**
     * Surrender
     *
     * @param CodyFighter $codyFighter
     * @return void
     */
    public static function Surrender(CodyFighter $codyFighter): CodyFightResponse
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
                return CodyFight::GetSanitizedResponse($response, $codyFighter);
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
     * @return CodyFightResponse
     */
    public static function GetSanitizedResponse(Response $response, CodyFighter $codyfighter): CodyFightResponse
    {
        return CodyFightResponse::make(
            json_decode(
                json: $response->json(),
                associative: true
            )
        )->SetCodyfighter($codyfighter);
    }
}
