<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Assign;
use App\Models\LabRequest;
use App\Models\LabResult;
use App\Models\LabTechnician;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{

    public function index($id)
    {
        $user = User::findOrFail($id);
        $doctor = $user->doctor;

        $assignedPatients = $doctor->patients()->latest()
            ->when(request('search'), function ($query) {
                $search = request('search');
                return $query->where('name', 'like', "%$search%");
            })
            ->get();

        $lab_technichian = User::where('role', 'lab')->with('labTechnician')->get();


        return view('doctor.doctor', ['assignedPatients' => $assignedPatients, 'lab_technichian' => $lab_technichian, 'id' => $id, 'user' => $user]);
    }




    public function newHistory($id)
    {
        $patient = Patient::findOrFail($id);

        return view('doctor.new_medical_history', ['patient' => $patient]);
    }

    public function history($id)
    {
        $patient = Patient::findOrFail($id);
        $medicalHistories = $patient->medicalHistories;


        return view('doctor.medical_history', ['patient' => $patient, 'medical_histories' => $medicalHistories]);
    }
    public function result($id)
    {
        $patient = Patient::with('labResults')->find($id);
        return view('doctor.lab_result', ['patient' => $patient]);
    }

    public function finished($id)
    {
        $assignment = Assign::where('patient_id', $id)->first();
        if ($assignment) {
            $assignment->delete();

            return redirect()->back()->with('success', 'Patient information updated successfully.');
        }
    }

    public function labRequest(Request $request)
    {
        $patient = Patient::where('name', $request->name)->first();
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        $labtechnichian = LabTechnician::whereHas('user', function ($query) use ($request) {
            $query->where('name', $request->labTechnician);
        })->first();


        if (!$labtechnichian) {
            return redirect()->back()->with('error', 'labtechnichian not found.');
        }

        $labRequest = new LabRequest();
        $labRequest->patient_id = $patient->id;
        $labRequest->lab_technician_id = $labtechnichian->id;
        $labRequest->test = $request->test;


        $labRequest->save();

        return redirect()->back()->with('success', 'Assignment created successfully.');
    }

    public function labHistory(Request $request)
    {
        dd($request);
    }

    public function storeMedicalHistory(Request $request, $id)
    {

        $validatedData = $request->validate([
            'doctor_name' => 'required|string',
            'treatment' => 'required|string',
            'severity' => 'required|string',
            'symptom' => 'required|string',
            'description' => 'required|string',
        ]);


        $medicalHistory = new MedicalHistory();

        $medicalHistory->patient_id = $id;
        $medicalHistory->treatment = $validatedData['treatment'];
        $medicalHistory->doctor_name = $validatedData['doctor_name'];
        $medicalHistory->severity = $validatedData['severity'];
        $medicalHistory->symptom = $validatedData['symptom'];
        $medicalHistory->description = $validatedData['description'];


        $medicalHistory->save();


        $doctor = DB::table('assigns')
            ->where('patient_id', $id)
            ->join('doctors', 'assigns.doctor_id', '=', 'doctors.id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->select('users.id')
            ->first();

        $doctorId = $doctor->id;


        return Redirect::route('doctor.dashboard', ['id' => $doctorId])->with('success', 'Medical history has been successfully recorded.');
    }

    public function apointmentDate(Request $request, $patientId)
    {

        $validatedData = $request->validate([
            'appointmentDate' => 'required|date',
            'appointmentTime' => 'required|date_format:H:i',
        ]);

        $patient = Patient::findOrFail($patientId);

        if ($patient) {
            $appointment = new Appointment();
            $appointment->patient_id = $patient->id;
            $appointment->appointment_date = $validatedData['appointmentDate'];
            $appointment->appointment_time = $validatedData['appointmentTime'];

            $appointment->save();
        }

        return redirect()->back()->with('success', 'set anapointment successfully.');
    }

    public function other(Request $request, $id){
        
        $validatedData = $request->validate([
            'other' => 'required',
        ]);

        $medical_history = MedicalHistory::find($id);
        $medical_history->other = $validatedData['other'];
        $medical_history->save();


        return redirect()->back()->with('success', 'Patient information updated successfully.');
    }
}
