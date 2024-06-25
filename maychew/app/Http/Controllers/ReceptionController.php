<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ReceptionController extends Controller
{
    //

    public function index($id){
        $reception= User::findOrFail($id);

        $doctors = User::where('role', 'doctor')->with('doctor')->get();
        
        return view('reception.reception', [
            'patients' => Patient::latest()
                          ->when(request('search'), function($query) {
                              $search = request('search');
                              return $query->where('name', 'like', "%$search%");
                          })
                          ->paginate(7),
            'doctors' => $doctors,
            'reception'=>$reception
        ]);
    }

    public function store(Request $request,$reception_id){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => 'required',
            'age' => ['required'],
            'gender' => 'required',
            'national_id' => ['required', 'unique:users,national_id'],
            'address' => 'required',
            'birthday' => 'required'
        ]);

        $patient = new Patient();

        $patient->name = $formFields['name'];
        $patient->phone = $formFields['phone'];
        $patient->age = $formFields['age'];
        $patient->gender = $formFields['gender'];
        $patient->national_id = $formFields['national_id'];
        $patient->address = $formFields['address'];
        $patient->birthday = $formFields['birthday'];
        $patient->save();

        return Redirect::route('reception.dashboard',['id'=>$reception_id])->with('session', 'User created');

    }

    public function assign(Request $request)
{
    $patient = Patient::where('name', $request->patient_name)->first();
    if (!$patient) {
        return redirect()->back()->with('error', 'Patient not found.');
    }

    $doctor = Doctor::whereHas('user', function($query) use ($request) {
        $query->where('name', $request->doctor);
    })->first();

   

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    $assign = new Assign();
    $assign->patient_id = $patient->id;
    $assign->doctor_id = $doctor->id;
    $assign->save();

    return redirect()->back()->with('success', 'Assignment created successfully.');
}

     public function update(Request $request, $id){
        
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
            ]
        );

        $patient = Patient::find($id);

        $patient->name = $validatedData['name'];
        $patient->address = $validatedData['address'];
        $patient->phone = $validatedData['phone'];
        
        $patient->save();

        return redirect()->back()->with('success', 'Patient information updated successfully.');
    }

    public function patient($id){

    $room = DB::table('assigns')
    ->where('patient_id', $id)
    ->join('doctors', 'assigns.doctor_id', '=', 'doctors.id')
    ->join('users', 'doctors.user_id', '=', 'users.id')
    ->pluck('room')
    ->first();

    $patient = Patient::findOrFail($id);

    $latestAppointment = $patient->appointment()->latest()->first();


    

        return view('reception.patients_detail',['patient' => $patient,'room' => $room,'latestAppointment' => $latestAppointment]);
    }
     


}
