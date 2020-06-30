<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Http\Requests\StoreRoomPost;
use App\Models\Room;
use App\Models\User;
use App\Models\Service;
use App\Models\Gender;
use App\Models\Characteristics;
use App\Models\Option;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
   
    public function index()
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

        $rooms = Room::latest('id')->paginate(5);        
        return view('Dashboard/Publication-list', compact('rooms', 'convertidor'))->with('i',(request()->input('page', 1)- 1)* 5);
        
    }
   
    
    public function show($slug)
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
       
    
             
        return view('Dashboard/Publication-view', ["room" =>$room, "dolar" => $dolar]);
    }
  
    public function showUser($id)
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

        $user = User::findorfail($id);    
        return view('Dashboard/User', ["user" =>$user, "rooms" =>$user->rooms, "convertidor"=>$convertidor]);
    }

    public function home()
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

        
        $rooms = Room::orderByRaw('random()')->take(5)->get();
        
        return view('index', ["rooms" =>$rooms, "convertidor"=>$convertidor]);
    }
    
    
    
}
