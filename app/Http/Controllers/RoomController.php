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
        Room::create([
            'titulo' => $data['titulo'],
            'direccion' => $data['direccion'],
            'precio' => $data['precio'],
            'detalles' => $data['detalles']
        ]);
        ServiceRoom::create([
            'internet' => $data ['internet'],
            'cable' => $data ['cable'],
            'telefono' => $data ['telefono']
        ]);

        Gender::create([
            'damas' => $data ['damas'],
            'caballeros' => $data['caballeros'],
            'unisex' => $data['unisex']
        ]);
        
        CharacteristicRoom::create([

            'visitas' => $data ['visitas'],
            'vehiculos' => $data ['vehiculos'],
            'mascotas' => $data ['mascotas'],
            'cocina' => $data ['cocina']
        ]);
        
        RoomOption::create([
            'baño' => $data ['baño'],
            'cuarto' => $data ['cuarto'],
            'especificacion' => $data['especificacion']
        ]);

        TypeRoom::create([

            'anexo' => $data['anexo'],
            'casa' => $data ['casa'],
            'apartamento' => $data ['apartamento'],
            'dormitorio' => $data ['dormitorio']
        ]);

        

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
