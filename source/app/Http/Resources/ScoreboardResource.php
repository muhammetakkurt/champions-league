<?php

namespace App\Http\Resources;

use App\Enums\GameTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class ScoreboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $games = $this->games()->get();
        $totalGames = count($games);
        $goal = 0;
        $goalConceded = 0;
        $win = 0;
        $drawn = 0;
        $lose = 0;
        foreach ($games as $game){
            if ($this->home_team_id === $game->home_team_id){
                $goal += $game->home_goal;
                $goalConceded += $game->away_goal;

                if ($game->status === GameTypeEnum::HOME->value){
                    $win++;
                }
                elseif ($game->status === GameTypeEnum::DRAWN->value){
                    $drawn++;
                }else{
                    $lose++;
                }
            }

            if ($this->home_team_id === $game->away_team_id){
                $goal += $game->away_goal;
                $goalConceded += $game->home_goal;

                if ($game->status === GameTypeEnum::AWAY->value){
                    $win++;
                }
                elseif ($game->status === GameTypeEnum::DRAWN->value){
                    $drawn++;
                }else{
                    $lose++;
                }
            }
        }

        return [
            'team' => $this->homeTeam->name,
            'p' => $totalGames,
            'w' => $win,
            'd' => $drawn,
            'l' => $lose,
            'pt' => ($win * 3) + $drawn,
            'gd' => $goal - $goalConceded,
        ];
    }
}
