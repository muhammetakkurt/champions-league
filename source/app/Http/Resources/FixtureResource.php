<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class FixtureResource extends JsonResource
{

    /**
     * @param $request
     * @return array|JsonSerializable|Arrayable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'week' => "Week {$this->game_week}",
            'home' => $this->homeTeam->name,
            'away' => $this->awayTeam->name,
        ];
    }
}
