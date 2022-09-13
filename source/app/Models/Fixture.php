<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_week',
        'is_played',
        'home_team_id',
        'away_team_id',
    ];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'home_team_id', 'home_team_id')
            ->orWhere('away_team_id', $this->home_team_id);
    }

    public function scopeCurrentWeek(){
        $nextWeek = self::where('is_played', false)
            ->orderBy('game_week')
            ->first();
        if(empty($nextWeek)){
            throw new \Exception("End of the league");
        }

        return self::where('game_week', $nextWeek->game_week)->get();
    }
}
