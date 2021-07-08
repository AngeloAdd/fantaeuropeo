<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Champion extends Model
{
    use HasFactory;

    protected $fillable = ['champion_team','top_scorer', 'user_id', 'created_at', 'updated_at'];

    protected $casts = [
        'top_scorer' => 'array'
    ];  

    public function SetCreatedAtAttribute() 
    {
        return $this->attributes['created_at'] = $this->attributes['updated_at'];
    }
    public function SetUpdatedAtAttribute($date) 
    {
        return $this->attributes['updated_at'] = (new Carbon($date))->format('d-m-Y H:i:s.u');
    }
    public function getCreatedAtAttribute($date) 
    {
        return $this->attributes['created_at'] = (new Carbon($date))->timezone('Europe/Rome')->format('d-m-Y H:i:s.u');
    }
    public function getUpdatedAtAttribute($date) 
    {
        return $this->attributes['updated_at'] = (new Carbon($date))->timezone('Europe/Rome')->format('d-m-Y H:i:s.u');
    }

}
