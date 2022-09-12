<?php

use App\Http\Controllers\API\VersionOne\FixtureController;
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
    Route::get('generate-fixture', [FixtureController::class, 'generateFixture']);
});

