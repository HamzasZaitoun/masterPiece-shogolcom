<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governate extends Model
{
    use HasFactory;
    protected $table = 'governates';
    protected $primaryKey = 'governate_id';

    protected $fillable = ['governate_name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
