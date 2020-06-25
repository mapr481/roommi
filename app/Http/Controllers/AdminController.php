<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRoomPost;
use App\Http\Requests\StoreUserPost;
use App\Models\Characteristics;
use App\Models\Gender;
use App\Models\Option;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{  
    public function __construct()
    {
        $this->middleware('admin');
    }
    

    public function index()
    {
        return view('Master/Main');
    }

    public function users()
    {
        $users = User::latest('id')->paginate(10);
        return view('Master/User', compact('users'))->with('i',(request()->input('page', 1)- 1)* 10);
        
    }
    public function publications(Request $request )
    {
        
        $rooms = Room::latest('id')->paginate(5);
        if ($request->ajax()) {
      return response()->json([
        ['titulo' => '', 'detalles' => '']
      ]);
    }   
        
        return view('Master/Publication', compact('rooms'))->with('i',(request()->input('page', 1)- 1)* 5);
        
        
    }

    public function showbyuser($id)
    {             
                  
        $rooms = Room::where('user_id', $id)->get();            
        return view('Master/Publication/Publication-User',["rooms" => $rooms]);
    }
    

    public function stats()
    {
        return view('Master/Stats');
        
    }
   
    

    public function show($id)
    {
        $user = User::findorfail($id);
        $rooms = Room::where('user_id', $id)->get();
        return view ('Master/Users/Show', ["user" => $user, "rooms"=> $rooms]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);        
        return view('Master/Users/Edit',["user" =>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPost $request, $id)
    {
        $user = User::findorfail($id);
        $user->update($request->validated()); 
        return back()->with('status', 'Usuario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user-> delete();
        return back('Publications')->with('status', 'Usuario eliminado correctamente');
    }

    /****************************************Publicaciones*****************************************/

    public function showpub($slug)
    {
        $room = Room::where('slug', $slug)->first();      

        return view ('Master/Publication/ShowRoom', ["room" => $room]);
        
        
    }
    
    public function editpub($slug)
    { 
        $room = Room::where('slug', $slug)->first();  
       
        $genders = Gender::all();
        $services = Service::all();
        $characteristics = Characteristics::all();
        $types = RoomType::all();
        $options = Option::all();
        
        return view('Master/Publication/EditRoom',compact('room',
            'genders',
            'services',
            'characteristics',
            'types',
            'options'
        ));
    }


    public function updatepub(StoreRoomPost $request, $slug)
    { 
        
        $room = Room::where('slug', $slug)->first();        
        $room->update($request->all());
        $room->services()->sync($request->services);
        $room->characteristics()->sync($request->characteristics);
        $room->options()->sync($request->options); 
        return redirect('ShowPublication')->with('status', 'Publicación editada correctamente');
    }


    
    public function destroypub($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $room-> delete();
        return redirect('/admin/view/list')->with('status', 'Usuario eliminado correctamente');
    }


}

