<?php

namespace App\Http\Controllers\API\VersionOne;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getIndex(): Collection
    {
        return Team::all();
    }
}
