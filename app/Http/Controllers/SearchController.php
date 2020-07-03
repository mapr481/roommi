<?php

namespace App\Http\Controllers;

use App\Models\Characteristics;
use App\Models\Gender;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\User;

class SearchController extends Controller
{
    public function buscar(Request $request)
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
 
        $genders = Gender::all();
        $services = Service::all();
        $characteristics = Characteristics::all();
        $types = RoomType::all();
        $options = Option::all();

      

        if($request){
            
            $buscar = $request->get("buscar");           

         /*  $users = User::where('nombre', 'LIKE', "%$buscar%")
                      ->orWhere('apellido', 'LIKE', "%$buscar%") 
                      ->orWhere('email', 'LIKE', "%$buscar%")
                      ->orWhere('cedula', 'LIKE', "%$buscar%")
                      ->orWhere('telefono', 'LIKE', "%$buscar%")                       
                      ->orderBy('id', 'ASC')->get();*/

            $rooms = Room::where('titulo', 'LIKE', "%$buscar%")
                       ->orWhere('direccion', 'LIKE', "%$buscar%")
                       ->where('room_type_id', 'LIKE', "%$buscar%")
                       ->where('gender_id', 'LIKE', "%$buscar%")                        
                       ->orderBy('id', 'ASC')->paginate(6);

           return view('Dashboard.Search', compact('users',
                                                    'rooms',
                                                    'buscar',
                                                    'convertidor',
                                                    'genders',
                                                    'services',
                                                    'types',
                                                    'options',
                                                    'characteristics'));

        }
       
    }
}
