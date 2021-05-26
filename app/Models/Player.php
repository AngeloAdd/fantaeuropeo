<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['last', 'name', 'team_id', 'role'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
