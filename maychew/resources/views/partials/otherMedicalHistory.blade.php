<div id="OtherMedicalHistory" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-4">Assign Doctor and Room</h2>
        <button onclick="hideOtherMedicalHistory()" class="absolute top-0 right-0  mr-4 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form id="OtherMedicalHistoryForm" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="other" class="block text-gray-700 font-bold"><i class="fas fa-user"></i> Addtinal Medical History</label>
                <textarea id="othervalue" type="text" value="" name="other" id="other" class="block w-full m-4 p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('other')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
                <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-other"></i> ADD</button>
            </div>
        </form>
    </div>
</div>

<script>
    function hideOtherMedicalHistory() {
        document.getElementById('OtherMedicalHistory').classList.add('hidden');
    }
    function showOtherMedicalHistory(id,other) {
            document.getElementById('OtherMedicalHistory').classList.remove('hidden');
            if(other){
                document.getElementById('othervalue').value = other;
            }


        var form = document.getElementById('OtherMedicalHistoryForm');
        form.action = "/other/" + id;
    }

</script>
