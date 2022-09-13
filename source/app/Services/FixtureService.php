<?php

namespace App\Services;

use App\Http\Resources\FixtureResource;
use App\Models\Fixture;
use Illuminate\Database\Eloquent\Collection;

class FixtureService{

    private array $matches = [];


    /**
     * @throws \Exception
     */
    public function generateFixture($teams): array
    {
        if (Fixture::count() === 0){
            $combination = $this->factorial(sizeof($teams)) / ($this->factorial(2) * $this->factorial(sizeof($teams) -2 ));

            if(sizeof($teams) < 2){
                throw new \Exception("Teams must be at least 2");
            }

            do{
                $this->findCombination($teams);
            } while (sizeof($this->getMatches()) < $combination);

            $this->saveFixture();
        }

        return $this->groupByWeek(Fixture::all());
    }

    public function groupByWeek($fixtures): array
    {
        $finalFixture = [];
        foreach ($fixtures as $key => $fixture){
            $finalFixture[$fixture->game_week]["week"] = "Week ".$fixture->game_week;
            $finalFixture[$fixture->game_week]["data"][] = new FixtureResource($fixture);
        }
        return array_values($finalFixture);
    }

    public function saveFixture(): void
    {
        $week = 1;
        foreach ($this->getMatches() ?? [] as $matchKey => $match){
            Fixture::create([
                'game_week' => $week,
                'home_team_id' => $match[0]['id'],
                'away_team_id' => $match[1]['id'],
            ]);

            if ($matchKey % 2 === 1){
                $week++;
            }
        }

        $this->reverseFixture($week);
    }

    public function reverseFixture($week): void
    {
        foreach (Fixture::all() ?? [] as $matchKey => $match){
            Fixture::create([
                'game_week' => $week,
                'home_team_id' => $match->away_team_id,
                'away_team_id' => $match->home_team_id,
            ]);

            if ($matchKey % 2 === 1){
                $week++;
            }
        }
    }

    public function findCombination($teams): void
    {
        $teams = $teams->shuffle()->toArray();
        $home = $teams[array_rand($teams)];
        $away = $teams[array_rand($teams)];

        while ($away === $home){
            $home = $teams[array_rand($teams)];
        }

        $matches = $this->getMatches();
        if(count($matches) > 0){
            $lastIndexKey = array_key_last($matches);
            while ($away === $home || $lastIndexKey % 2 === 0 &&
                (in_array($home, $matches[$lastIndexKey]) || in_array($away, $matches[$lastIndexKey]))
            )
            {
                $home = $teams[array_rand($teams)];
                $away = $teams[array_rand($teams)];
            }
        }

        $match = [ $home, $away ];
        if(!in_array($match, $this->getMatches())) {
            if(!in_array(array_reverse($match), $this->getMatches())){
                $this->setMatches($match);
            }
        }
    }

    public function factorial($n){
        $factorial = 1;
        for($i = $n; $i > 0; $i--){
            $factorial *= $i;
        }
        return $factorial;
    }

    /**
     * @return array
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param array $match
     * @param int $key
     * @return void
     */
    public function setMatches(array $match): void
    {
        $this->matches[] = $match;
    }

}
