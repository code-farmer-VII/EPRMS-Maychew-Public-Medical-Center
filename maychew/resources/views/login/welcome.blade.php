<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px;
    width: 100%;
  }
  body{
    background: linear-gradient(20deg, rgba(119,175,239,1) 7%, rgba(210,229,255,1) 48%, rgba(115,179,250,1) 90%);
  }
  
</style>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="w-full max-w-md">
  <h1 class="text-center mb-6 text-2xl font-bold">MAYCHEW PUBLIC HEALTHE CENTER </h1> 

  <div class="bg-white shadow-md mt-4 rounded px-8 pt-6 pb-8 mb-4">
    <h2 class="text-center mb-4 font-bold"><i class="fas fa-sign-in-alt" ></i> User Login</h2>
    <form method="POST" action="{{route('authenticate')}}">
        @csrf
      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-envelope"></i> Email address</label>
        <input value="{{old('email')}}" name="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Enter your email">
      </div>
      @error('email')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
              <i class="fas fa-lock"></i> Password
          </label>
          <div class="relative">
            <input value="" name="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Enter password">
            <span class="absolute right-0 top-0 mt-3 mr-4">
                <i id="togglePassword" class="fas fa-eye cursor-pointer"></i>
            </span>
          </div>
          @error('password')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </div>

      <div class="flex items-center justify-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"><i class="fas fa-user-plus"></i> LOGIN</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-q6eumY8C3TLV8AOUfGpyim+yKxF5G4ZqV9VI+tgDUE6z5lSevxCfIEdhhnNI5ESb" crossorigin="anonymous"></script>
</body>
<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
  });
</script>
<footer class="bg-blue-600 text-white mt-auto">
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
