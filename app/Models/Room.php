<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'direccion',
        'precio',
        'type_room_id',
        'gender_id',
    ];

    protected $hidden = [
        ''
    ];

    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristics::class);
    }

    public function options()
    {
        return $this->belongsToMany(RoomOption::class);
    }
}
