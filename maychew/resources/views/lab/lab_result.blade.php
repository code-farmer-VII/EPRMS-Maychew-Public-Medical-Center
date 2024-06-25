<x-header />

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-8">Maychew Public Health Center</h1>
        <h1 class="text-3xl font-bold text-center mb-8">Laboratory Result</h1>
        <form action="{{ route('storeLabResult', ['id' => $id]) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            @csrf

            <div class="mb-4">
                <label for="patientName" class="block text-gray-700 text-sm font-bold mb-2"><i
                        class="fas fa-user icon mr-2"></i> Patient Name</label>
                <input type="text" class="form-input rounded-md p-4 shadow-sm w-full " id="patientName"
                    placeholder="Enter patient's name" name="patientName" value="{{ $patient->name }}" readonly>
            </div>
            <div class="mb-4">
                <label for="labTechnicianName" class="block text-gray-700 text-sm font-bold mb-2"><i
                        class="fas fa-user-md icon mr-2"></i> Lab Technician Name</label>
                <input type="text" class="form-input rounded-md p-4 shadow-sm w-full " id="labTechnicianName"
                    placeholder="Enter lab technician's name" name="labTechnicianName" value="{{ $labTechnicianName->name }}" readonly>
            </div>
            <div class="mb-4">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2"><i
                        class="fas fa-birthday-cake icon mr-2"></i> Age</label>
                <input type="number" class="form-input rounded-md p-4 shadow-sm w-full " id="age"
                    placeholder="Enter patient's age" name="age" value="{{ $patient->age }}" readonly>
            </div>
            <div class="mb-4">
                <label for="labTest" class="block text-gray-700 text-sm font-bold mb-2"><i
                        class="fas fa-stethoscope icon mr-2"></i> Laboratory Test</label>
                <input type="text" class="form-input rounded-md p-4 shadow-sm w-full " id="labTest"
                    placeholder="Enter laboratory test" name="labTest" value="{{ $labTests[0] }}" readonly>
            </div>
            <div class="mb-4">
                <label for="labResult" class="block text-gray-700 text-sm font-bold mb-2"><i
                        class="fas fa-heartbeat icon mr-2"></i> Laboratory Result</label>
                <textarea class="form-textarea rounded-md p-4 shadow-sm w-full  resize-none" id="labResult"
                    rows="4" placeholder="Enter laboratory result" name="labResult" required></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
