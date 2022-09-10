<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_goal',
        'away_goal',
        'status',
        'home_team_id',
        'away_team_id',
    ];
}
