<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'direccion',        
        'detalles',
        'precio',
        'user_id',               
        'type_room_id',
        'gender_id',
        'service_room_id',
        'characteristic_room_id'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function characteristicsRooms()
    {
        return $this->belongsToMany(CharacteristicRoom::class);
    }
    public function serviceRooms()
    {
        return $this->belongsToMany(serviceRooms::class);
    } 
}