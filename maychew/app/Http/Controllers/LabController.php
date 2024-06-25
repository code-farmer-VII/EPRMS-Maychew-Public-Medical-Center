<?php

namespace App\Http\Controllers;

use App\Models\LabRequest;
use App\Models\LabResult;
use App\Models\LabTechnician;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use LDAP\Result;

class LabController extends Controller
{

public function index($id){
    $user = User::findOrFail($id);
    $labTechnician = LabTechnician::where('user_id', $id)->first();
    
    $labRequestsQuery = LabRequest::where('lab_technician_id', $labTechnician->id)
        ->with('patient:id,name,national_id');

    $labRequests = $labRequestsQuery->latest()
        ->when(request('search'), function($query) {
            $search = request('search');
            return $query->whereHas('patient', function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%$search%");
            });
        })
        ->get();
    
    $patientsWithLabRequests = $labRequests->map(function ($labRequest) {
        return [
            'patient_id' => $labRequest->patient_id,
            'patient_name' => $labRequest->patient->name,
            'national_id' => $labRequest->patient->national_id,
            'test' => $labRequest->test,
        ];
    });

    return view('lab.lab', [
        'patientsWithLabRequests' => $patientsWithLabRequests,
        'id' => $id,
        'user'=>$user,
    ]); 
}

 
    public function result($id){
        $labTechnicianName = DB::table('lab_requests')
                ->where('patient_id', $id)
                ->join('lab_technicians', 'lab_requests.lab_technician_id', '=', 'lab_technicians.id')
                ->join('users', 'lab_technicians.user_id', '=', 'users.id')
                ->select('users.name')
                ->first();

       $labTests = LabRequest::where('patient_id', $id)->pluck('test');

      $patient = Patient::findOrFail($id);



        return view('lab.lab_result',['id'=>$id,'labTechnicianName'=>$labTechnicianName,'labTests'=>$labTests ,'patient'=>$patient]);
    }
  
    public function finishLabRequest($id){
      LabRequest::where('patient_id', $id)->delete();

      return redirect()->back()->with('success', 'Patient information updated successfully.');

    }

    function storeLabResult(Request $request, $id){

        $validatedData = $request->validate([
            'labTest' => 'required|string',
            'labResult' => 'required|string',
            'labTechnicianName' => 'required|string'
        ]);
    
        $labResult = new LabResult();
        
        $labResult->patient_id = $id;
        $labResult->lab_test = $validatedData['labTest'];
        $labResult->lab_result = $validatedData['labResult'];
        $labResult->lab_technician_name = $validatedData['labTechnicianName'];
        $labResult->save();

        $labTechnician = DB::table('lab_requests')
        ->where('patient_id', $id)
        ->join('lab_technicians', 'lab_requests.lab_technician_id', '=', 'lab_technicians.id')
        ->join('users', 'lab_technicians.user_id', '=', 'users.id')
        ->select('users.id')
        ->first();

        $labTechnicianId = $labTechnician->id; 


        return  Redirect::route('labtech.dashboard',['id'=>$labTechnicianId])->with('success', 'Patient information updated successfully.');

    }

}
