@foreach($patientsWithLabRequests as $patientsWithLabRequest)
<tr>
    <td class="border px-4 py-2">{{ $patientsWithLabRequest['national_id'] }}</td>
    <td class="border px-4 py-2">{{ $patientsWithLabRequest['patient_name'] }}</td>
    <td class="border px-4 py-2">{{ $patientsWithLabRequest['test'] }}</td>
    <td class="border px-4 py-2"><a href="{{ route('labresult',['patientId' => $patientsWithLabRequest['patient_id']]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-file-alt"></i>&nbsp;Lab Result</a></td>
    <td class="border px-4 py-2"><a href="{{ route('finish_labrequest', ['patientId' => $patientsWithLabRequest['patient_id']]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-check-circle"></i>&nbsp;Finished</a></td>
</tr>
@endforeach
