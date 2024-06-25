

<x-header />

<body class="bg-blue-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-8">Patient Laboratory Result Information</h1>

        <div class="text-center mb-8">
            <h2 class="text-lg font-semibold">Patient Name: {{ $patient->name }}</h2>
            <h2 class="text-lg font-semibold">Age: {{ $patient->age }}</h2>
        </div>

        @foreach ($patient->labResults as $labResult)
        <div class="bg-white shadow-md rounded-md p-8 mb-8 printable-card">
            <h2 class="text-lg font-semibold mb-4">
                <i class="fas fa-calendar-alt mr-2"></i> Report Date: {{ $labResult->created_at }}
            </h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 font-semibold">
                        <i class="fas fa-user-md mr-2"></i> Name of the Lab Technician:
                    </p>
                    <p class="text-gray-800">{{ $labResult->lab_technician_name }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600 font-semibold">
                        <i class="fas fa-flask mr-2"></i> Laboratory Test:
                    </p>
                    <p class="text-gray-800">{{ $labResult->lab_test }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600 font-semibold">
                        <i class="fas fa-vial mr-2"></i> Laboratory Result:
                    </p>
                    <p class="text-gray-800">{{ $labResult->lab_result }}</p>
                </div>
            </div>
        </div>
    @endforeach
    

        <div class="text-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.print()">
                <i class="fas fa-print mr-2"></i> Print
            </button>
        </div>
    </div>
</body>

</html>
