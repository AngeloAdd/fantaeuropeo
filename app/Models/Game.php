<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['match_date','game_number','home_goals','away_goals','result','scores','finale'];
    
    protected $casts = [
        'match_date' => 'datetime:d-m-Y H:i:s',
        'scores' = 'array'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

}
