<?php

namespace App\Http\Controllers;
use App\Models\Room;

class PublicationsController extends Controller
{
    public function index() {
        $rooms = Room::with(['gender', 'services', 'characteristics', 'options', 'user', 'roomtypes'])
        ->orderBy('id','DESC')
        ->get();

        dd($rooms);
    }

    public function findBySlug($slug) {
        $room = Room::where('slug', $slug)
        ->with(['gender', 'services', 'characteristics', 'options', 'user', 'roomtypes'])
        ->orderBy('id','DESC')
        ->first();

        dd($room);
    }
}
