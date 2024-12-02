<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    protected $fillable = ['city_id', 'location_name'];

    // A Location belongs to a City
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
