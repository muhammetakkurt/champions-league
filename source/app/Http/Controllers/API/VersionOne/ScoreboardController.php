<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScoreboardResource;
use App\Models\Fixture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    public function getIndex(): JsonResponse
    {
        $scoreBoard = Fixture::select([
            'home_team_id'
        ])->with(['games'])
            ->withCount(['games as p'])
            ->join('teams', 'fixtures.home_team_id', '=', 'teams.id')
            ->groupBy('home_team_id')
            ->orderBy('teams.name', 'ASC')
            ->get();

        $scoreBoardCollection = ScoreboardResource::collection($scoreBoard);
        $sortedCollection = collect($scoreBoardCollection)
            ->sortByDesc('pt')
            ->sortByDesc('gd')
            ->values();

        return response()->json($sortedCollection);
    }
}
