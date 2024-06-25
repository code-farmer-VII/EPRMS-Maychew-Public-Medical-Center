@foreach($patients as $patient)
<tr>
    <td class="border px-4 py-2">{{$patient->national_id}}</td>
    <td class="border px-4 py-2">{{$patient->name}}</td>
    <td class="border px-4 py-2">{{$patient->address}}</td>
    <td class="border px-4 py-2">{{$patient->phone}}</td>
    <td class="border px-4 py-2"><a  
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"  href="{{route('patientDetail',['id'=>$patient->id])}}"><i class="fas fa-info-circle"></i>&nbsp;Details</a></td>
    <td class="border px-4 py-2">
        <button onclick="showEditForm('{{$patient->name}}', '{{$patient->address}}', '{{$patient->phone}}','{{$patient->id}}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-edit text-white-500"></i>&nbsp;Edit</button>
    </td>
    <td class="border px-4 py-2">
        <button type="button" onclick="showAssignForm('{{ $patient->name }}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-check-circle"></i> &nbsp;Assign</button>
    </td>
</tr>   
@endforeach
