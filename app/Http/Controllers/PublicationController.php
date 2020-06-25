<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomPost;
use App\Models\Room;
use App\Models\User;
use App\Models\Service;
use App\Models\Gender;
use App\Models\Characteristics;
use App\Models\Option;
use App\Models\RoomType;
use Illuminate\Http\Request;


class PublicationController extends Controller
{
   
    public function index()
    {       
        $rooms = Room::latest('id')->paginate(5);        
        return view('Dashboard/Publication-list', compact('rooms'))->with('i',(request()->input('page', 1)- 1)* 5);
        
    }

   
    
    public function show($slug)
    {
        
        $room = Room::where('slug', $slug)->first(); 
                
        return view('Dashboard/Publication-view', ["room" =>$room]);
    }

    public function showByUser($id)
    {
        $user = User::findorfail($id);    
        return view('Dashboard/Publication-user', ["user" =>$user, "rooms" =>$user->rooms]);
    }

    public function home(){

        $rooms = Room::orderByRaw('rand()')->take(5)->get();
        
        return view('index', ["rooms" =>$rooms]);
    }
    
    
    
}
