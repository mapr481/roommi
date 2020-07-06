<?php

namespace App\Http\Controllers;

use App\Models\Characteristics;
use App\Models\Gender;
use App\Models\Option;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Http\Requests\StoreRoomPost;
use App\Http\Requests\StoreUserPost;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    
    public function show()    
    {   
       /*$client = new Client([    
            'base_uri' => 'https://s3.amazonaws.com',            
            'timeout'  => 20.0,
        ]);        
        $response = $client->request('GET', 'dolartoday/data.json');
        $utf8 = utf8_decode($response, true);  
        $convertidor = json_decode($utf8->getBody()->getContents()); */
        $json = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json", 'jsonp');
        $utf8 = utf8_decode($json); //decode UTF-8
        $data = json_decode($utf8, true);        
        $convertidor = $data['USD']['promedio_real'];

        $user = Auth::user();
                  
        $rooms = Room::where('user_id', $user->id)->get();           
        $genders = Gender::all();
        $services = Service::all();
        $characteristics = Characteristics::all();
        $types = RoomType::all();
        $options = Option::all();
        return view('User/UserProfile', compact('user','rooms', 'convertidor',
        'genders',
        'services',
        'characteristics',
        'types',
        'options'
    ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user($id);  
        return view('User/EditUser', ["user" => $user]);
    }


    public function showpub($slug)
    {
        /*$client = new Client([    
            'base_uri' => 'https://s3.amazonaws.com',            
            'timeout'  => 20.0,
        ]);        
        $response = $client->request('GET', 'dolartoday/data.json');
        $utf8 = utf8_decode($response, true);  
        $convertidor = json_decode($utf8->getBody()->getContents()); */
        $json = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json", 'jsonp');
        $utf8 = utf8_decode($json); //decode UTF-8
        $data = json_decode($utf8, true);        
        $convertidor = $data['USD']['promedio_real'];
        $room = Room::where('slug', $slug)->first(); 
        $dolar = $convertidor * $room->precio;       
           if (Auth::user()->id == $room->user_id){            
            return view ('User/ShowPublication', ["room" => $room, "dolar" => $dolar]);
            }return redirect('/user/publication');
            
    
              

        
        
    }
    public function showbyuser()
    { 
        /*$client = new Client([    
            'base_uri' => 'https://s3.amazonaws.com',            
            'timeout'  => 20.0,
        ]);        
        $response = $client->request('GET', 'dolartoday/data.json');
        $utf8 = utf8_decode($response, true);  
        $convertidor = json_decode($utf8->getBody()->getContents()); */
        $json = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json", 'jsonp');
        $utf8 = utf8_decode($json); //decode UTF-8
        $data = json_decode($utf8, true);        
        $convertidor = $data['USD']['promedio_real'];

        $id= Auth::user()->id;          
        $rooms = Room::where('user_id', $id)->paginate(6);            
        return view('User/ListPublication',["rooms" => $rooms, "convertidor" => $convertidor]);
    }


    public function editpub($slug)
    { 
        $room = Room::where('slug', $slug)->first();  

        if (Auth::user()->id == $room->user_id){    
        $genders = Gender::all();
        $services = Service::all();
        $characteristics = Characteristics::all();
        $types = RoomType::all();
        $options = Option::all();
        
        

            return view('User/EditPublication',compact('room',
            'genders',
            'services',
            'characteristics',
            'types',
            'options'
        ));
        }return redirect('/user/publication');
        
    }

    
    public function update(StoreUserPost $request, $id)
    {
        $user = User::findorfail($id);
        $user->update($request->validated()); 
        return redirect('/user/view')->with('status', 'Usuario editado correctamente');
    }
    
    public function updatepub(StoreRoomPost $request, $slug)
    { 
        
       
        $room = Room::where('slug', $slug)->first();
        if (Auth::user()->id == $room->user_id){                    
            $room->update($request->all());
            $room->services()->sync($request->services);
            $room->characteristics()->sync($request->characteristics);
            $room->options()->sync($request->options);
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
          
                $room->imagen = $name;
                $room->save();
                return redirect('user/publication')->with('status', 'Publicación editada correctamente');

            }return redirect('/user/publication');
        }
                    
        
    }

    
    public function destroypub($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $room-> delete();

        if (Auth::user()->id == $room->user_id){

            return redirect('user/publication')->with('status', 'Publicación eliminada correctamente');

        }return redirect('/user/publication');                   
        
    }

   
}

