<x-header />
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .printable-card, .printable-card * {
            visibility: visible;
        }
        .printable-card {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<body class="bg-blue-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-8">Patient Medical History Information</h1>
        @foreach ($medical_histories as $medical_history)
        <div class="bg-white shadow-md rounded-md p-8 mb-8 printable-card">
            <h2 class="text-lg font-semibold mb-4">Patient Details</h2>
            <h2 class="text-lg font-semibold mb-4">Report Date: {{ $medical_history->created_at }}</h2> <!-- Added report date {{ date('Y-m-d') }}-->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 font-semibold">Patient Name:</p>
                    <p class="text-gray-800">{{$patient->name}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Doctor Name:</p>
                    <p class="text-gray-800">{{$medical_history->doctor_name}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Treatment:</p>
                    <p class="text-gray-800">{{$medical_history->treatment}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Severity:</p>
                    <p class="text-gray-800">{{$medical_history->severity}}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600 font-semibold">Symptom:</p>
                    <p class="text-gray-800">{{$medical_history->symptom}}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600 font-semibold">Description:</p>
                    <p class="text-gray-800">{{$medical_history->description}}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-600 font-semibold">Other:</p>
                    <p class="text-gray-800">{{$medical_history->other}}</p>
                </div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="window.print()">
                <i class="fas fa-print mr-2"></i> Print
            </button>
            <button onclick="showOtherMedicalHistory('{{$medical_history->id}}','{{$medical_history->other}}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                <i class="fas fa-edit mr-2"></i> Other
            </button>
        </div>
        @endforeach
    </div>
    @include('partials.otherMedicalHistory')
</body>
</html>
