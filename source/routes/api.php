<?php

use App\Http\Controllers\API\VersionOne\FixtureController;
use App\Http\Controllers\API\VersionOne\ResetController;
use App\Http\Controllers\API\VersionOne\ScoreboardController;
use App\Http\Controllers\API\VersionOne\SimulationController;
use App\Http\Controllers\API\VersionOne\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function (){
    Route::get('teams', [TeamController::class, 'getIndex']);


    Route::prefix('fixture')->group(function (){
        Route::get('generate', [FixtureController::class, 'generateFixture']);
        Route::get('current-week', [FixtureController::class, 'getCurrentWeek']);
    });

    Route::prefix('simulation')->group(function (){
        Route::get('play-all-weeks', [SimulationController::class, 'playAllWeeks']);
        Route::get('play-next-week', [SimulationController::class, 'playNextWeek']);
    });

    Route::get('scoreboard', [ScoreboardController::class, 'getIndex']);

    Route::delete('reset', [ResetController::class, 'getIndex']);
});

