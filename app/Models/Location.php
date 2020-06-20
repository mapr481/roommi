<?php

namespace App;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['lat', 'lng'];

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
