

@props(['users'])
@props(['user'])

@foreach ($users as $userEMP)
<tr>
    <td class="border font-semibold px-4 py-2">{{$userEMP->national_id}}</td>
    <td class="border font-semibold px-4 py-2">{{$userEMP->name}}</td>
    <td class="border font-semibold px-4 py-2">{{$userEMP->email}}</td>
    <td class="border font-semibold px-4 py-2">{{$userEMP->specialization}}</td>
    <td class="border font-semibold px-4 py-2">{{$userEMP->department}}</td>
    <td class="border font-semibold px-4 py-2">{{$userEMP->role}}</td>
    <td class="border font-semibold px-2 py-2">
        <a href="{{ route('editUser', ['id' => $userEMP->id,'manager_id'=>$user->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none "><i class="fas fa-edit text-white-500"></i></a>
    </td>
    <td class="border px-4 py-2">
        <form action="{{ route('deleteUser', ['id' => $userEMP->id,'manager_id'=>$user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-trash-alt"></i> </button>
        </form>
    </td>
</tr>

@endforeach

