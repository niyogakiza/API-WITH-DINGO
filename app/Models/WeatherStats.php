<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class WeatherStats extends Model
{
    protected $dates = [
        'last_updated'
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
