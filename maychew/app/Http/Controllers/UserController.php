<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\LabTechnician;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //


    public function store(Request $request,$id) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => 'required',
            'password' => 'required|confirmed|min:6',
            'experience' => 'required',
            'specialization' => 'required',
            'gender' => 'required',
            'national_id' => ['required', 'unique:users,national_id'],
            'department' => 'required',
            'room' => 'required', 

        ]);


    
        $user = new User();
        $user->name = $formFields['name'];
        $user->email = $formFields['email'];
        $user->role = $formFields['role']; 
        $user->password = bcrypt($formFields['password']);
        $user->experience = $formFields['experience'];
        $user->specialization = $formFields['specialization'];
        $user->gender = $formFields['gender'];
        $user->national_id = $formFields['national_id'];
        $user->department = $formFields['department'];
        $user->room = $formFields['room'];

        if($request->hasFile('profile_image')){
            $user->profile_image = $request->file('profile_image')->store('profile_images','public');
        }
        $user->save();
    
       // auth()->login($user);
       if($formFields['role']==="doctor"){
        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->save();
       }
       elseif($formFields['role']==="lab"){
        $labTechnician = new LabTechnician();
        $labTechnician->user_id = $user->id;
        $labTechnician->save();
       }


    
        return Redirect::route('manager.dashboard',['id'=>$id])->with('session', 'User created');
    }
    
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
    
            
            $user = auth()->user();
    
            
            switch ($user->role) {
                case 'doctor':
                    return redirect()->route('doctor.dashboard', ['id' => $user->id]);
                    break;
                case 'reception':
                    return redirect()->route('reception.dashboard',['id' => $user->id]);
                    break;
                case 'lab':
                    return redirect()->route('labtech.dashboard', ['id' => $user->id]);
                    break;
                case 'manager':
                    return redirect()->route('manager.dashboard',['id' => $user->id]);
                    break;
                default:
                    break;
            }
        }
    
        
        return back()->withErrors(['email' => 'Invalid Credentials'])->withInput(request()->only('email'));
        
}

    public function update(Request $request, $manager_id, $id) {
        $user = User::findOrFail($id);

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => 'required',
            'password' => 'nullable|min:6',
            'experience' => 'required',
            'specialization' => 'required',
            'gender' => 'required',
            'national_id' => ['required', Rule::unique('users', 'national_id')->ignore($user->id)],
            'department' => 'required'
        ]);

        $user->update($formFields);

        return Redirect::route('manager.dashboard',['id'=>$manager_id])->with('success', 'User updated successfully');
    }



public function destroy($id, $manager_id)
{
    $user = User::findOrFail($id);

    if (  $user->id !== Auth::id()) {
        if($user->profile_image){
            Storage::disk('public')->delete($user->profile_image);
        }
        
        $user->delete();

        return Redirect::route('manager.dashboard',['id'=>$manager_id])->with('success', 'User deleted successfully');
    } else {
        return Redirect::route('manager.dashboard',['id'=>$manager_id])->with('error', 'You are not allowed to delete this user');
    }
}


public function logout(Request $request) {
        

    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::route('login')->with('message', 'You have been logged out!');

}

public function login(){
    return view('login.welcome');
}

public function welcome(){
    return view('login.main');
}


    
}
