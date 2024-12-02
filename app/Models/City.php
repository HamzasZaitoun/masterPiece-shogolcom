<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $fillable = ['city_name', 'governate_id'];

    // A City belongs to a Governate
    public function governate()
    {
        return $this->belongsTo(Governate::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
