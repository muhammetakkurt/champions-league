<?php

namespace App\Services;

use App\Enums\GameTypeEnum;
use App\Models\Fixture;
use App\Models\Game;

class SimulationService{

    public function playAllWeeks(): void
    {
        $weeks = Fixture::select('game_week')->where('is_played', false)->groupBy('game_week')->get();
        $weeks = count($weeks);
        while ($weeks > 0){
            $this->playNextWeek();
            $weeks--;
        }
    }

    public function playNextWeek(): void
    {
        $fixtures = Fixture::currentWeek();

        foreach ($fixtures as $fixture){
            $homeGoal = rand(0, rand(0,10));
            $awayGoal = rand(0, rand(0,10));
            Game::create([
                'home_goal' => $homeGoal,
                'away_goal' => $awayGoal,
                'status' => $this->calculateWinner($homeGoal, $awayGoal),
                'home_team_id' => $fixture->home_team_id,
                'away_team_id' => $fixture->away_team_id,
                'fixture_id' => $fixture->id,
            ]);

            $fixture->update([
                'is_played' => true
            ]);
        }
    }

    private function calculateWinner(int $homeGoal, int $awayGoal): string
    {
        if ($homeGoal > $awayGoal){
            return GameTypeEnum::HOME->value;
        }elseif($homeGoal < $awayGoal){
            return GameTypeEnum::AWAY->value;
        }else{
            return GameTypeEnum::DRAWN->value;
        }
    }

}
