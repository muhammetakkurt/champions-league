<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Enums\GameTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\Game;
use App\Services\SimulationService;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function playAllWeeks(SimulationService $simulationService){
        $simulationService->playAllWeeks();
        return [];
    }

    public function playNextWeek(SimulationService $simulationService){
        $simulationService->playNextWeek();
        return [];
    }
}
