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
        'room_type_id',
        'gender_id',
        'imagen',
        'lat',
        'lng'
    ];

    protected $hidden = [
        ''
    ];

    public function roomtypes()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_services');
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristics::class, 'room_characteristics');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'room_options');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function characteristicsRooms()
    {
        return $this->belongsToMany(CharacteristicRoom::class);
    }
    public function serviceRooms()
    {
        return $this->belongsToMany(serviceRooms::class);
    } 

    public function locations()
    {
        return $this->hasOne(Location::class);
    }

}