<div id="editForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-4">Edit Patient Information</h2>
        <button onclick="hideEditForm()" class="absolute top-0 right-0  mr-4 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form id="editPatientForm" method="POST" class="space-y-4">
            
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-bold"><i class="fas fa-user"></i> Name</label>
                <input type="text" value="" name="name" id="name_patient" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
            </div>
            <div>
                <label for="address" class="block text-gray-700 font-bold"><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" value="" name="address" id="address_patient" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="phone" class="block text-gray-700 font-bold"><i class="fas fa-phone"></i> Phone</label>
                <input type="text" value="" name="phone" id="phone_patient" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="flex justify-center">
                <button type="submit"  class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-edit"></i> Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function hideEditForm() {
        document.getElementById('editForm').classList.add('hidden');
    }

    function showEditForm(patientName, patientAddress, patientPhone,patientId) {
        document.getElementById('editForm').classList.remove('hidden');
        document.getElementById('name_patient').value = patientName;
        document.getElementById('address_patient').value = patientAddress;
        document.getElementById('phone_patient').value = patientPhone;

        var form = document.getElementById('editPatientForm');
        form.action = "/patients/" + patientId;
    }

</script>
