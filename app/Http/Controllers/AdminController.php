<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{    
    public function __construct()
    {
        $this->middleware('admin');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Master/Main');
    }

    public function users()
    {
        $users = User::latest('id')->paginate(10);
        return view('Master.User', compact('users'))->with('i',(request()->input('page', 1)- 1)* 10);
        
    }
    public function publications()
    {
        return view('Master/Publication');
    }
    

    public function stats()
    {
        return view('Master/stats');
    }
   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view ('Master/Users/Show', ["user" => $user]);
        
        
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
        return back()->with('status', 'Usuario eliminado correctamente');
    }

}

