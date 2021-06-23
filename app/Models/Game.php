<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['home_team','away_team','game_date','home_result','away_result','sign','home_score','away_score'];

    protected $casts = [
        'home_score' => 'array',
        'away_score' => 'array'
    ];   

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
