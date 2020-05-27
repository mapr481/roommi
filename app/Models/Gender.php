<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'genero',
    ];

    protected $hidden = [
        '',
    ];

    public function rooms()
    {
      return $this->hasMany(Room::class);
    }
}
