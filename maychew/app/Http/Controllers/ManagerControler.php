<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManagerControler extends Controller
{
    //

    public function index($id)
    {
        $user = User::findOrFail($id);
        
        return view('manager.manager', [
            'users' => User::latest()
                          ->when(request('search'), function($query) {
                              $search = request('search');
                              return $query->where('name', 'like', "%$search%")
                                           ->orWhere('email', 'like', "%$search%");
                          })
                          ->paginate(7),

            'user'=>$user
            
            
            
        ]);
        
    }

    public function registration($id){
        return view('manager.registration',['id'=>$id]);
    }
    public function edit($id, $manager_id){
        $user = User::findOrFail($id);

        return view('manager.edit_user_regestration',['user'=>$user,'manager_id'=>$manager_id]);
    }


}
