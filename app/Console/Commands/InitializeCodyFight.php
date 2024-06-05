<?php

namespace App\Console\Commands;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $IsGameFinished = false;
        $int = 0;


        $key = $this->ask("How many CodyKeys are you using?[use SPACE between keys]");

        $gameModes = $this->ask("What mode are you deploying these bots? [0 -> SandBox | 1 -> Friend Duel | 2 -> Ranked]");

        $friend = null;

        if($gameModes == 1) $friend = $this->ask("What is the friend code?");

        $keys = explode(" ", $key);

        $this->info("Reading Jobs...");

        foreach($keys as $cKey)
        {
            $this->info("Creating Job for: " . $cKey);

            $codyFighter = CodyFighter::query()
                ->key($cKey)
                ->mode($gameModes)
                ->first();

            if ($codyFighter == null) {
                $this->error($cKey . " CodyFighter not found. Make sure you want to use the correct codyfighter.");
                $this->error("For a list of usable codyfighters type the command codyfight:list");
                continue;
            }

            StartQueue::dispatch($codyFighter);
        }

        $this->info("Jobs ready!! Enable workers to begin playing");
    }
}
