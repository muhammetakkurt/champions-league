<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Http\Controllers\Controller;
use App\Http\Resources\FixtureResource;
use App\Models\Fixture;
use App\Models\Team;
use App\Services\FixtureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    /**
     * @throws \Exception
     */
    public function generateFixture(Request $request, FixtureService $fixtureService): JsonResponse
    {
        return response()->json($fixtureService->generateFixture(Team::all()));
    }

    public function getCurrentWeek(Request $request, FixtureService $fixtureService): JsonResponse
    {
        $fixtures = Fixture::currentWeek();
        return response()->json($fixtureService->groupByWeek($fixtures));
    }
}
