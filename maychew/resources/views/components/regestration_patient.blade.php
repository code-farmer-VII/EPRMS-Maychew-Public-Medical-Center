<style>
    .reg{
    z-index:100;
}
</style>
<div id="registrationForm" class="reg fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
    <div class="relative bg-white rounded-lg shadow-md p-8 w-96">
        <h2 class="text-2xl font-bold mb-4">Registration</h2>
        <button onclick="hideRegistrationForm()" class="absolute top-0 right-0 mr-4 mt-2 text-3xl text-red-500 hover:text-red-700 focus:outline-none"><i class="fas fa-times"></i></button>
        <form id="registrationRouteForm"  method="POST"  class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-bold"><i class="fas fa-user"></i> Name</label>
                <input type="text" value="{{old('name')}}" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
             @error('name')
             <p class="text-red-500 text-xs italic">{{ $message }}</p>
             @enderror
            </div>

            <div>
                <label for="national_id" class="block text-gray-700 font-bold"><i class="fas fa-id-card"></i> National ID</label>
                <input type="text" value="{{old('national_id')}}" name="national_id" id="national_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                @error('national_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="phone" class="block text-gray-700 font-bold"><i class="fas fa-phone"></i> Phone</label>
                <input type="text" value="{{old('phone')}}" name="phone" id="phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address" class="block text-gray-700 font-bold"><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" value="{{old('address')}}" name="address" id="address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                @error('address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="age" class="block text-gray-700 font-bold"><i class="fas fa-user"></i> Age</label>
                <input type="number" value="{{old('age')}}" name="age" id="age" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                @error('age')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="birthday" class="block text-gray-700 font-bold"><i class="fas fa-calendar-alt"></i> Birth_day</label>
                <input type="date" value="{{old('birthday')}}" name="birthday" id="birthday" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
            @error('birthday')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            </div>
            <div>
                <label for="gender" class="block text-gray-700 font-bold"><i class="fas fa-venus-mars"></i> Gender</label>
                <select name="gender" id="gender" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none"><i class="fas fa-user-plus"></i> Register</button>
            </div>
        </form>
    </div>
</div>



    <script>

        function hideRegistrationForm(reception_id) {
            document.getElementById('registrationForm').classList.add('hidden');

            var form = document.getElementById('registrationRouteForm');
             form.action = "/dashboard/reception" + reception_id;
        }
    </script>
