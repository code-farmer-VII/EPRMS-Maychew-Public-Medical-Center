<x-header />


<body class="bg-blue-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-8">Maychew Public Health Center</h1>
        <form action="{{route('storeMedicalHistory',['id'=>$patient->id])}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-user icon mr-2"></i> Patient Name</label>
                <input type="text" name="name" class="form-input rounded-md p-4 shadow-sm w-full " id="name" placeholder="Enter patient's name" value="{{$patient->name}}">
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
                <label for="doctorName" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-user-md icon mr-2"></i> Doctor Name</label>
                <input type="text" name="doctor_name" class="form-input rounded-md p-4 shadow-sm w-full " id="doctorName" placeholder="Enter doctor's name"  >
            @error('doctor_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>  
            @enderror
            </div>
            <div class="mb-4">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-birthday-cake icon mr-2"></i> Age</label>
                <input type="number" class="form-input rounded-md p-4 shadow-sm w-full " id="age" placeholder="Enter patient's age" value="{{$patient->age}}">
            @error('age')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-4">
                <label for="treatment" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-stethoscope icon mr-2"></i> Treatment</label>
                <input type="text" name="treatment" class="form-input rounded-md p-4 shadow-sm w-full " id="treatment" placeholder="Enter treatment">
            @error('treatment')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>     
            @enderror
            </div>
            <div class="mb-4">
                <label for="severity" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-heartbeat icon mr-2"></i> Severity</label>
                <input type="text" name="severity" class="form-input rounded-md p-4 shadow-sm w-full " id="severity" placeholder="Enter severity">
            @error('severity')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>     
            @enderror
            </div>
            <div class="mb-4">
                <label for="symptom" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-exclamation-circle icon mr-2"></i> Symptom</label>
                <input type="text" name="symptom" class="form-input rounded-md p-4 shadow-sm w-full " id="symptom" placeholder="Enter symptom">
            @error('symptom')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>     
            @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-file-medical-alt icon mr-2"></i> Description</label>
                <textarea name="description" class="form-textarea rounded-md p-4 shadow-sm w-full  resize-none" id="description" rows="4" placeholder="Enter description"></textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
