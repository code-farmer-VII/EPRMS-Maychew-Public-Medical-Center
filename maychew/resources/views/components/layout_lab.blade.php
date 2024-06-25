<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
  .navbar{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100; 
  }
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



</style>
<body>
  <nav class="text-white navbar navbar-expand-lg bg-blue-700">
    <div class="text-white container-fluid">
      <a class="text-black bg-white navbar-brand btn " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        LABRATORY TECHNICHIAIN
      </a>
      <button class="text-white navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white navbar-toggler-icon"></span>
      </button>
      <div class="text-white collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="text-white navbar-nav me-auto mb-2 mb-lg-0">
          <li class="text-white nav-item">
            <a class="text-white nav-link active"  aria-current="page" href="#" ><i class="text-white fas fa-user-circle"></i>{{$user->name}}</a>
          </li>
          <li class="text-white nav-item">
            <a class="text-white nav-link" href="{{route('logout')}}"><i class="text-white fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
        <form action="{{ route('labtech.dashboard' ,['id'=>$id]) }}" class="text-white d-flex">
          <input class="text-white form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="text-white btn btn-outline-success bg-green-600" type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="font-bold align-center" id="offcanvasExampleLabel">Labratory Technologist Profile</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <img src="{{$user->profile_image ? asset('storage/'.$user->profile_image) : asset('image/no-image')}}" alt="User" class="w-26 h-26 rounded-full mr-4">
        <div class="user-info flex items-start mb-4">
            <div>
                <h5 class="font-bold text-lg mb-1">{{$user->name}}</h5>
                <p class="text-gray-700 mb-1"><i class="fas fa-id-card pl-2"></i> National ID: {{$user->national_id}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-envelope pl-2"></i> Email: {{$user->email}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-md pl-2"></i> Specialization: {{$user->specialization}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-tie pl-2"></i> Experience: {{$user->experience}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-building pl-2"></i> Department: {{$user->department}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-door-open pl-2"></i> Room: {{$user->room}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-venus-mars pl-2"></i> Gender: {{$user->gender}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-tag pl-2"></i> Role: {{$user->role}}</p>
            </div>
        </div>
    </div>
  </nav>

 

  <main>
    {{$slot}}
  </main>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
