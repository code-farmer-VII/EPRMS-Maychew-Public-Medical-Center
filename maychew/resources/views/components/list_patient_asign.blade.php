@foreach($assignedPatients as $assignedPatient)
<tr>
    <td class="border px-4 py-2">{{$assignedPatient->national_id}}</td>
    <td class="border px-4 py-2">{{$assignedPatient->name}}</td>
    <td class="border px-4 py-2"><a href="{{ route('newmedicalHistory', ['id' => $assignedPatient->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-notes-medical"></i>&nbsp;New</a></td>
    <td class="border px-4 py-2"><a href="{{ route('medicalHistory', ['id' => $assignedPatient->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-file-medical"></i>&nbsp;History</a></td>
    <td class="border px-4 py-2"><button onclick="showlabRequestForm('{{$assignedPatient->name}}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"> <i class="fas fa-flask"></i>&nbsp;Request</button></td>
    <td class="border px-4 py-2"><a href="{{ route('result', ['id' => $assignedPatient->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"> <i class="fas fa-file-alt"></i>&nbsp;Result</a></td>
    <td class="border px-4 py-2"><button onclick="showAppointementForm('{{$assignedPatient->id}}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"> <i class="fas fa-calendar-alt"></i>&nbsp;Appointment</button></td>
    <td class="border px-4 py-2"><a href="{{ route('finished', ['id' => $assignedPatient->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"> <i class="fas fa-check-circle"></i>&nbsp; Finished</a></td>
</tr>
@endforeach
