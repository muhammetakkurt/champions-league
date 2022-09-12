<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getIndex(): JsonResponse
    {
        $teams = Team::all();
        return response()->json($teams);
    }
}
