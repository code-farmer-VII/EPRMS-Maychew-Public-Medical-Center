<x-layout_reception :reception="$reception">
    <x-header />
    <body class="bg-white-100">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold mb-4">Patient Information</h2>
            <div class="overflow-x-auto">
                <table class="table-auto bg-gray-100 border-collapse border border-gray-400 w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Address</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Details</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                    <x-list_patient_reception :patients="$patients"  />
                    </tbody>
                </table>
            </div>
        </div>

    <x-regestration_patient></x-regestration_patient>
    @include('partials.edit_form')

    
    @include('partials.assign_form', ['doctors' => $doctors])

<script>

    function showRegistrationForm() {
            document.getElementById('registrationForm').classList.remove('hidden');
    }



    function showAssignForm(patientName) {
        document.getElementById('assignForm').classList.remove('hidden');
        document.getElementById('patient_name').value = patientName;
    }

</script>


    </body>
    </html>
</x-layout_reception>
