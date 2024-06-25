
<div id="appointmentForm" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-4">Appointment Schedule</h2>
        <button onclick="hideAppointmentForm()" class="absolute top-0 right-0  mr-4 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form id="apintmentform" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="appointmentDate" class="block text-gray-700 font-bold"><i class="far fa-calendar-alt"></i> Appointment Date</label>
                <input type="date" name="appointmentDate" id="appointmentDate" class="form-input rounded-md p-2 shadow-sm w-full" placeholder="Select appointment date">
            </div>
            <div>
                <label for="appointmentTime" class="block text-gray-700 font-bold"><i class="far fa-clock"></i> Appointment Time</label>
                <input type="time" name="appointmentTime" id="appointmentTime" class="form-input rounded-md p-2 shadow-sm w-full" placeholder="Select appointment time">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-check-circle"></i> Send</button>
            </div>
        </form>
        
    </div>
</div>

<script>
    function hideAppointmentForm() {
        document.getElementById('appointmentForm').classList.add('hidden');
    }

    function showAppointementForm(patientId) {
            document.getElementById('appointmentForm').classList.remove('hidden');

            var form = document.getElementById('apintmentform');
            form.action = "/apointment/" + patientId;
    }
</script>
