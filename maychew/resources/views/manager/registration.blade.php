<x-header />
<style>
  body {
    box-sizing: border-box;
    background: linear-gradient(20deg, rgba(119, 175, 239, 1) 18%, rgba(210, 229, 255, 1) 48%, rgba(115, 179, 250, 1) 85%);
    font-family: Arial, sans-serif;
    line-height: 1.6;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  .card {
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
  }

  .card-header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-radius: 4px 4px 0 0;
    margin-bottom: 10px;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  .form-group input,
  .form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
  }

  .form-group input[type="file"] {
    padding: 5px;
  }

  .form-group .error-message {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
  }

  .form-group .custom-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
  }

  .form-group .custom-select option {
    padding: 10px;
  }

  .btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }



  .preview-image {
    margin-top: 10px;
    width: 150px; /* Adjust width as needed */
    height: auto;
    border-radius: 4px;
    border: 1px solid #ccc;
    padding: 5px;
  }
</style>

<body>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1 class="text-center my-2 text-xl font-bold">MAYCHEW PUBLIC HEALTH CENTER</h1>
      </div>

      <form method="POST" action="{{ route('storeUser',['id'=>$id]) }}" enctype="multipart/form-data">
        @csrf

        <!-- Left Column Card -->
        <div class="card mb-4">
          <div class="card-header">
            <h2 class="text-center mb-4 font-bold"><i class="fas fa-user-plus"></i> User Information</h2>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input value="{{ old('name') }}" name="name" type="text" id="name" placeholder="Enter your name">
              @error('name')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input value="{{ old('email') }}" name="email" type="email" id="email" placeholder="Enter your email">
              @error('email')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="national_id">National ID</label>
              <input value="{{ old('national_id') }}" name="national_id" type="text" id="national_id">
              @error('national_id')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="profile_image">Upload File</label>
              <input name="profile_image" id="profile_image" type="file" onchange="previewImage(event)">
              <img id="preview" class="preview-image" src="#" alt="Image preview">
              @error('profile_image')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="gender">Gender</label>
              <select name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
              </select>
              @error('gender')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <!-- Right Column Card -->
        <div class="card mb-4">
          <div class="card-header">
            <h2 class="text-center mb-4 font-bold"><i class="fas fa-user-plus"></i> Professional Information</h2>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="specialization">Specialization</label>
              <input value="{{ old('specialization') }}" name="specialization" id="specialization" type="text">
              @error('specialization')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="experience">Experience</label>
              <input value="{{ old('experience') }}" name="experience" id="experience" type="text">
              @error('experience')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="department">Department</label>
              <input value="{{ old('department') }}" name="department" id="department" type="text">
              @error('department')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="room">Room</label>
              <input value="{{ old('room') }}" name="room" id="room" type="text">
              @error('room')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role">
                <option value="">Select Role</option>
                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="reception" {{ old('role') == 'reception' ? 'selected' : '' }}>Receptionist</option>
                <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="lab" {{ old('role') == 'lab_technician' ? 'selected' : '' }}>Lab Technician</option>
              </select>
              @error('role')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" id="password">
              @error('password')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input name="password_confirmation" type="password" id="password_confirmation">
              @error('password_confirmation')
              <p class="error-message">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
          <button type="submit" class="btn-primary"><i class="fas fa-user-plus"></i> Register</button>
        </div>
      </form>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-q6eumY8C3TLV8AOUfGpyim+yKxF5G4ZqV9VI+tgDUE6z5lSevxCfIEdhhnNI5ESb" crossorigin="anonymous"></script>

  <!-- Custom JavaScript -->
  <script>
    // Function to preview image before uploading
    function previewImage(event) {
      var reader = new FileReader();
      var preview = document.getElementById('preview');
      reader.onload = function () {
        preview.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

</body>
<footer class="bg-blue-600 text-white  mt-auto">
  <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
    <div class="footer-item flex-1 min-w-[200px] mb-4">
      <h3 class="text-lg font-semibold mb-2">Contact Us</h3>
      <p>Email: info@healthofficer.com</p>
      <p>Phone: +123 456 7890</p>
    </div>
    <div class="footer-item flex-1 min-w-[200px] mb-4">
      <p>&copy; 2024 Maychew Health Center. All rights reserved.</p>
    </div>
    <div class="footer-item flex-1 min-w-[200px] mb-4">
      <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
      <p>
        <a href="#" class="text-white hover:text-gray-400 mr-4">Facebook</a>
        <a href="#" class="text-white hover:text-gray-400 mr-4">Twitter</a>
        <a href="#" class="text-white hover:text-gray-400">LinkedIn</a>
      </p>
    </div>
  </div>
</footer>

</html>
