<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\ServiceRoom;
use App\Models\Gender;
use App\Models\CharacteristicRoom;
use App\Models\RoomOption;
use App\Models\TypeRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.publication-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'titulo' => 'required',
            'slug' => 'required',
            'direccion' => 'required',
            'precio' => 'required',
            'detalles' => '',
            'internet' => '',
            'cable' => '',
            'telefono' => '',
            'damas' => '',
            'caballeros'=> '',
            'unisex'=> '',
            'visitas' =>'',
            'vehiculos' => '',
            'mascotas' => '',
            'cocina' => '',
            'baño' => '',
            'cuarto' =>'',
            'especificacion'=>'',
            'anexo' => '',
            'casa' => '',
            'apartamento' => '',
            'dormitorio' => ''


        ]);
        $room = new Room;
        Room::create([
            $room->titulo => $request->titulo,
            $room->direccion => $request->direccion,
            $room->precio => $request->precio,
            $room->detalles => $request->detalles
        ]);
        ServiceRoom::create([
            $room->internet => $request->internet,
            $room->cable => $request->cable,
            $room->telefono => $request->telefono
        ]);

        Gender::create([
            $room->damas => $request->damas,
            $room->caballeros => $request->caballeros,
            $room->unisex =>  $request->unisex
        ]);
        
        CharacteristicRoom::create([

            $room->visitas =>  $request->visitas,
            $room->vehiculos =>  $request->vehiculos,
            $room->mascotas =>  $request->mascotas,
            $room->cocina =>  $request->cocina
        ]);
        
        RoomOption::create([
            $room->baño =>  $request->baño,
            $room->cuarto =>  $request->cuarto,
            $room->especificacion => $request->especificacion
        ]);

        TypeRoom::create([

            $room->anexo =>  $request->anexo,
            $room->casa =>  $request->casa,
            $room->apartamento => $request->apartamento,
            $room->dormitorio => $request->dormitorio
        ]);

        $room->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(room $room)
    {
        //
    }
}
