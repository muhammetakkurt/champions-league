<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ResetController extends Controller
{
    public function getIndex()
    {
        Artisan::call('migrate:fresh --seed');
        return response()->json([]);
    }
}
