<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function rooms()
  {
    return $this->belongsTo(Room::class);
  }
}
