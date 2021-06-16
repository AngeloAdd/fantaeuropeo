<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['home_team','away_team','game_date','home_result','away_result','sign','home_score','away_score'];

    

    public function setGameDateAttribute($date) 
    {
        $this->attributes['game_date'] = (new Carbon($date))->format('d-m-Y H:i:s.u');
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
