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
use Illuminate\Database\Eloquent\Builder;

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

           $users = User::where('nombre', 'LIKE', "%$buscar%")
                      ->orWhere('apellido', 'LIKE', "%$buscar%")
                      ->orWhere('email', 'LIKE', "%$buscar%")
                      ->orWhere('cedula', 'LIKE', "%$buscar%")
                      ->orWhere('telefono', 'LIKE', "%$buscar%")
                      ->orderBy('id', 'ASC')->get();

            $rooms = Room::with(['gender', 'roomtypes', 'services', 'characteristics', 'user', 'options']);

            if($request->get("buscar")){
                $rooms = $rooms->where('titulo', 'LIKE', "%$buscar%")
                ->orWhere('direccion', 'LIKE', "%$buscar%");
            }

            if($request->get("gender_id")){
                $rooms = $rooms->orWhere('gender_id', 'LIKE', $request->get("gender_id"));
            }

            if($request->get("room_type_id")){
                $rooms = $rooms->orWhere('room_type_id', 'LIKE', $request->get("room_type_id"));
            }

            if($request->get("services")){
                $rooms = $rooms->whereHas('services', function( $query ) use ( $request ){
                    $query->where('service_id', $request->services);
                });
            }

            if($request->get("characteristics")){
                $rooms = $rooms->whereHas('characteristics', function( $query ) use ( $request ){
                    $query->where('characteristics_id', $request->characteristics);
                });
            }

            $rooms = $rooms->orderBy('id', 'ASC')->paginate(6);

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
