<x-layout_doctor :id="$id" :user="$user">
        <x-header />
        <body class="bg-white-100">
            <div class="container mx-auto px-4 py-8">
                <h2 class="text-2xl font-bold mb-4">Asigned Patients </h2>
                <div class="overflow-x-auto">
                    <table class="table-auto bg-gray-100 border-collapse border border-gray-400 w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">National_ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">New medical History</th>
                                <th class="px-4 py-2">Medical History</th>
                                <th class="px-4 py-2">Lab Request</th>
                                 <th class="px-4 py-2">Lab Result</th>
                                <th class="px-4 py-2">Appointment</th>
                                <th class="px-4 py-2">Finished</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <x-list_patient_asign :assignedPatients="$assignedPatients" />
                        </tbody>
                    </table>
                </div>
            </div>
    

    
            @include('partials.lab_request',['$lab_technichian' => $lab_technichian])
            @include('partials.appointment')

    
        
    

    
    
        </body>
        </html>

    

</x-layout_doctor>