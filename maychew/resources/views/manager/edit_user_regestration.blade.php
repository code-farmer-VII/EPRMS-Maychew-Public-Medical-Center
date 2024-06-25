<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User Information</title>
  <style>
    body {
      box-sizing: border-box;
      background: linear-gradient(20deg, rgba(119, 175, 239, 1) 18%, rgba(210, 229, 255, 1) 48%, rgba(115, 179, 250, 1) 85%);
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
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

    footer {
      background-color: #007bff;
      color: #fff;
      text-align: center;
      padding: 10px;
      width: 100%;
    }

    .text-center {
      text-align: center;
    }

    .my-2 {
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .text-xl {
      font-size: 1.25rem;
    }

    .font-bold {
      font-weight: bold;
    }

    .mb-4 {
      margin-bottom: 1rem;
    }

    .relative {
      position: relative;
    }

    .absolute {
      position: absolute;
    }

    .right-0 {
      right: 0;
    }

    .top-0 {
      top: 0;
    }

    .mt-3 {
      margin-top: 0.75rem;
    }

    .mr-4 {
      margin-right: 1rem;
    }

    .cursor-pointer {
      cursor: pointer;
    }

    .text-red-500 {
      color: #f56565;
    }

    .text-xs {
      font-size: 0.75rem;
    }

    .italic {
      font-style: italic;
    }

    .shadow {
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
    }

    .appearance-none {
      appearance: none;
    }

    .border {
      border-width: 1px;
    }

    .rounded {
      border-radius: 0.25rem;
    }

    .w-full {
      width: 100%;
    }

    .py-2 {
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    }

    .px-3 {
      padding-left: 0.75rem;
      padding-right: 0.75rem;
    }

    .text-gray-700 {
      color: #4a5568;
    }

    .leading-tight {
      line-height: 1.25;
    }

    .focus\:outline-none:focus {
      outline: 2px solid transparent;
      outline-offset: 2px;
    }

    .focus\:shadow-outline:focus {
      box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }

    .flex {
      display: flex;
    }

    .items-center {
      align-items: center;
    }

    .justify-center {
      justify-content: center;
    }

    .bg-blue-500 {
      background-color: #4299e1;
    }

    .hover\:bg-blue-700:hover {
      background-color: #2b6cb0;
    }

    .text-white {
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header">
      <h1 class="text-center my-2 text-xl font-bold">MAYCHEW PUBLIC HEALTH CENTER</h1>
    </div>

    <form method="POST" action="{{ route('updateUser', ['id'=>$user->id,'manager_id' => $manager_id]) }}">
      @csrf
      @method('PUT')

      <div class="card mb-4">
        <div class="card-header">
          <h2 class="text-center mb-4 font-bold"><i class="fas fa-user-plus"></i> Edit User Information</h2>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ $user->name }}" name="name" type="text" id="name" placeholder="Enter your name">
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email address</label>
            <input value="{{ $user->email }}" name="email" type="email" id="email" placeholder="Enter your email">
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="national_id">National ID</label>
            <input value="{{ $user->national_id }}" name="national_id" type="text">
            @error('national_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="specialization">Specialization</label>
            <input value="{{ $user->specialization }}" name="specialization" id="specialization" type="text">
            @error('specialization')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="experience">Experience</label>
            <input value="{{ $user->experience }}" name="experience" id="experience" type="text">
            @error('experience')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="department">Department</label>
            <input value="{{ $user->department }}" name="department" id="department" type="text">
            @error('department')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
              <option value="">Select Gender</option>
              <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role">
              <option value="">Select Role</option>
              <option value="manager" {{ $user->role === 'manager' ? 'selected' : '' }}>Manager</option>
              <option value="reception" {{ $user->role === 'reception' ? 'selected' : '' }}>Receptionist</option>
              <option value="doctor" {{ $user->role === 'doctor' ? 'selected' : '' }}>Doctor</option>
              <option value="lab" {{ $user->role === 'lab_technician' ? 'selected' : '' }}>Lab Technician</option>
            </select>
            @error('role')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <div class="relative">
              <input value="" name="password" type="password" id="password" placeholder="Enter password">
              <span class="absolute right-0 top-0 mt-3 mr-4">
                <i id="togglePassword" class="fas fa-eye cursor-pointer"></i>
              </span>
            </div>
            @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex items-center justify-center w-full">
            <button type="submit" class="btn-primary w-full">
              Update User
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<footer>
  <p>&copy; 2024 Maychew Public Health Center. All rights reserved.</p>
</footer>

</body>
</html>
