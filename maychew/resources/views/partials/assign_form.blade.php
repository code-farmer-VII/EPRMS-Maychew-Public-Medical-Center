<div id="assignForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-4">Assign Doctor and Room</h2>
        <button onclick="hideAssignForm()" class="absolute top-0 right-0  mr-4 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form action="{{route('assign')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="patient_name" class="block text-gray-700 font-bold"><i class="fas fa-user"></i> Patient Name</label>
                <input type="text" value="" name="patient_name" id="patient_name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
            </div>

            <div>
                <label for="doctor" class="block text-gray-700 font-bold"><i class="fas fa-user-md"></i> Doctor</label>
                <select name="doctor" id="doctor" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-check-circle"></i> Assign</button>
            </div>
        </form>
    </div>
</div>

<script>
    function hideAssignForm() {
        document.getElementById('assignForm').classList.add('hidden');
    }


</script>
