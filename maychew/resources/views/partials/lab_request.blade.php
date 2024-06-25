<div id="labRequestForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-4">Assign Test and Lab Technician</h2>
        <button onclick="hidelabRequestForm()" class="absolute top-0 right-0  mr-4 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form action="{{route('labRequest')}}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-gray-700 font-bold"><i class="fas fa-flask"></i> Name</label>
                <input type="text" value="" name="name" id="name_patient" class="form-input rounded-md p-2 shadow-sm w-full" placeholder="Enter name ">
            </div>
            <div>
                <label for="test" class="block text-gray-700 font-bold"><i class="fas fa-flask"></i> Test</label>
                <input type="text" name="test" id="test" class="form-input rounded-md p-2 shadow-sm w-full" placeholder="Enter test name">
            </div>
            
            <div>
                <label for="labTechnician" class="block text-gray-700 font-bold"><i class="fas fa-user-md"></i> Lab Technician</label>
                <select name="labTechnician" id="labTechnician" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($lab_technichian as $lab_technichian)
                        <option value="{{ $lab_technichian->name }}">{{ $lab_technichian->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center">
                <button type="submit" onclick="hidelabRequestForm()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-check-circle"></i> Send</button>
            </div>
        </form>
    </div>
</div>

<script>
    function hidelabRequestForm () {
        document.getElementById('labRequestForm').classList.add('hidden');
    }

    
    function showlabRequestForm(patientName) {
            document.getElementById('labRequestForm').classList.remove('hidden');
            document.getElementById('name_patient').value = patientName;

    }


</script>
