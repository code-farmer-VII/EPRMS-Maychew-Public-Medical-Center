<x-header />
<body class="bg-blue-100">
    <div class="container mx-auto mt-8 ">
        <h1 class="text-3xl font-bold text-center mb-8">Patient Medical History Information</h1>
        
        <div class="bg-white shadow-md rounded-md p-8 mb-8 ">
            <h2 class="text-lg font-semibold mb-4">Patient Details</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 font-semibold">Name:</p>
                    <p class="text-gray-800">{{$patient->name}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">National ID:</p>
                    <p class="text-gray-800">{{$patient->national_id}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Phone:</p>
                    <p class="text-gray-800">{{$patient->phone}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Address:</p>
                    <p class="text-gray-800">{{ $patient->address}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Age:</p>
                    <p class="text-gray-800">{{$patient->age}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Birth Day:</p>
                    <p class="text-gray-800">{{$patient->birthday}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Gender:</p>
                    <p class="text-gray-800">{{$patient->gender}}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Room:</p>
                    <p class="text-gray-800">{{ isset($room) ? $room : "no" }}</p>
                </div>
                @if ($latestAppointment)
                @php
                    $currentDate = now();
                    $appointmentDate = \Carbon\Carbon::parse($latestAppointment->appointment_date);
                @endphp
            
                <div>
                    <p class="text-gray-600 font-semibold">Appointment Day:</p>
                    <p class="text-gray-800">
                        @if ($currentDate->gt($appointmentDate))
                            Appointment date has passed
                        @else
                            {{ $latestAppointment->appointment_date }}
                        @endif
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold">Appointment Time:</p>
                    <p class="text-gray-800">{{ $latestAppointment->appointment_time }}</p>
                </div>
            @else
                <div>
                    <p class="text-gray-800">No appointment scheduled</p>
                </div>
            @endif
            
            </div>
        </div>
    </div>
</body>
</html>
