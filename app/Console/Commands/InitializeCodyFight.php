<?php

namespace App\Console\Commands;

use App\CodyFight\Entities\CodyFighter as EntitiesCodyFighter;
use App\Enum\CharacterArchetype;
use App\Models\CodyFighter;
use App\Jobs\StartQueue;
use Illuminate\Console\Command;

class InitializeCodyFight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codyfight:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Queueing For fights';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $IsGameFinished = false;
        $int = 0;

        $codyfigtherKeys = config('codyfighters.codyfighters');

        foreach($codyfigtherKeys as $index => $cKey) {
            $availability = ($cKey != null)
                ? ' with key ' . $cKey. ' is available'
                : " isn't available!";

            $this->info('Bot ' . $index . $availability);
        }

        $botsIndex = $this->ask("What CodyKeys are you using?[use SPACE between keys, I.E 1 2 3 or 1 or 1 3]");

        $gameModes = $this->ask("What mode are you deploying these bots? [0 -> SandBox | 1 -> Friend Duel | 2 -> Ranked]");

        $friend = null;

        if($gameModes == 1) $friend = $this->ask("What is the friend code?");

        $bots = explode(" ", $botsIndex);

        $this->info("Reading Jobs...");

        foreach($bots as $botIndex)
        {
            $cKey = config('codyfighters.codyfighters.'.$botIndex);

            $this->info("Creating Job for: " . $cKey);

            $codyFighter = new EntitiesCodyFighter($cKey,CharacterArchetype::NOINIT);

            if ($friend) {
                $codyFighter->SetFriend($friend);
            }
           /*  $codyFighter = CodyFighter::query()
                ->key($cKey)
                ->mode($gameModes)
                ->first(); */

            /* if ($codyFighter == null) {
                $this->error($cKey . " CodyFighter not found. Make sure you want to use the correct codyfighter.");
                $this->error("For a list of usable codyfighters type the command codyfight:list");
                continue;
            } */

            StartQueue::dispatch($codyFighter)->onQueue('codyfighters');
        }

        $this->info("Jobs ready!! Enable workers to begin playing");
    }
}
