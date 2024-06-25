<x-layout_lab :id="$id" :user="$user">
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
                                <th class="px-4 py-2">Labratory Test</th>
                                <th class="px-4 py-2">Result</th>
                                <th class="px-4 py-2">Finished</th>
                            </tr>
                        </thead>
                        <tbody>
                        <x-list_patient_lab_request :patientsWithLabRequests='$patientsWithLabRequests' />
                        </tbody>
                    </table>
                </div>
            </div>
    

    
    <script>

    
    
    </script>
    
    
        </body>
        </html>

    
</x-layout_lab>