<x-header />
<style>
  body{
    box-sizing: border-box;
  }

  footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    right: 0;
    padding: 10px;
    width: 100%;
  }
</style>
<body>

<div class="bg-gray-100 flex justify-center items-center ">
  <div class="w-full max-w-xl">
    <h1 class="text-center my-6 text-2xl font-bold">MAYCHEW PUBLIC HEALTH CENTER</h1> 
    <div class="bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
      <h2 class="text-center mb-4 font-bold"><i class="fas fa-user-plus"></i> User Registration</h2>
      <form method="POST" action="{{ route('storeUser') }}">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-user"></i> Name</label>
          <input value="{{ old('name') }}" name="name" type="text" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Enter your name">
          @error('name')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="national_id" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-id-card"></i> National ID</label>
          <input value="{{ old('national_id') }}" name="national_id" type="text" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('national_id')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="phone" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-phone"></i> Phone</label>
          <input value="{{ old('phone') }}" name="phone" type="tel" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" placeholder="Enter your phone number">
          @error('phone')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="address" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-address-card"></i> Address</label>
          <input value="{{ old('address') }}" name="address" type="text" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" placeholder="Enter your address">
          @error('address')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="age" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-birthday-cake"></i> Age</label>
          <input value="{{ old('age') }}" name="age" type="number" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" placeholder="Enter your age">
          @error('age')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="birthday" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-calendar-alt"></i> Birthday</label>
          <input value="{{ old('birthday') }}" name="birthday" type="date" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthday">
          @error('birthday')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-4">
          <label for="gender" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-venus-mars"></i> Gender</label>
          <select name="gender" id="gender" class="shadow appearance-none border rounded w-full py-4 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select Gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          </select>
          @error('gender')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none w-full"><i class="fas fa-user-plus"></i> Register</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-q6eumY8C3TLV8AOUfGpyim+yKxF5G4ZqV9VI+tgDUE6z5lSevxCfIEdhhnNI5ESb" crossorigin="anonymous"></script>
</body>
<footer>
  <p>&copy; 2024 Maychew Health Center. All rights reserved.</p>
</footer>
</html>
