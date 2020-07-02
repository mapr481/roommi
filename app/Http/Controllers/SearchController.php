<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Room;
use App\Models\User;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        
       $buscar = $request->get("buscar");
        
       $users = User::orderBy('id', 'DESC')
                ->where('nombre', 'LIKE', "%$buscar%");
       dd ($users);
       return view('Dashboard.Search', compact(['users']));

    }
}
