<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $table = 'governorates';
    protected $primaryKey = 'governorate_id';

    protected $fillable = ['governorate_name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
