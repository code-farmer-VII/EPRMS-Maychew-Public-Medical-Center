<!DOCTYPE html>
<html lang="en">
<head>
    <x-header />
    <title>Document</title>
</head>
<style>
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100; 
  }
  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
  }
  main {
    flex: 1;
  }
</style>
<body class="bg-white" >
  <nav class="bg-blue-600 text-white text-semibold navbar navbar-expand-lg ">
    <div class="bg-blue-600 text-white text-semibold container-fluid">
      <a class="bg-blue-600 text-black text-semibold navbar-brand btn bg-white " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        RECEPTION
      </a>
      <button class="bg-blue-600 text-white text-semibold navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="bg-blue-600 text-white text-semibold navbar-toggler-icon"></span>
      </button>
      <div class="bg-blue-600 text-white text-semibold collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="bg-blue-600 text-white text-semibold navbar-nav me-auto mb-2 mb-lg-0">
          <li class="bg-blue-600 text-white text-semibold nav-item">
            <a class="bg-blue-600 text-white text-semibold nav-link active"  aria-current="page" href="#" ><i class="bg-blue-600 text-white text-semibold fas fa-user-circle"></i>{{$reception->name}}</a>
          </li>
          <li class="bg-blue-600 text-white text-semibold nav-item">
            <a class="bg-blue-600 text-white text-semibold nav-link" href="{{route('logout')}}"><i class="bg-blue-600 text-white text-semibold fas fa-sign-out-alt"></i> Logout</a>
          </li>
          <li class="bg-blue-600 text-white text-semibold nav-item">
            <a class="bg-blue-600 text-white text-semibold nav-link active"  aria-current="page" href="#" onclick="showRegistrationForm('{{$reception->id}}')"><i class="bg-blue-600 text-white text-semibold fas fa-user-plus"></i>Patient Registration</a>
          </li>
        </ul>
        <form action="{{ route('reception.dashboard',['id'=>$reception->id]) }}" class="bg-blue-600 text-white text-semibold d-flex">
          <input class="text-semibold form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="bg-green-600 text-white text-semibold btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="font-bold align-center text-black" id="offcanvasExampleLabel">Receptionist Profile</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <img src="{{$reception->profile_image ? asset('storage/'.$reception->profile_image) : asset('image/no-image')}}" alt="User" class="w-26 h-26 rounded-full mr-4">
        <div class="user-info flex items-start mb-4">
            <div>
                <h5 class="font-bold text-lg mb-1">{{$reception->name}}</h5>
                <p class="text-gray-700 mb-1"><i class="fas fa-id-card pl-2"></i> National ID: {{$reception->national_id}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-envelope pl-2"></i> Email: {{$reception->email}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-md pl-2"></i> Specialization: {{$reception->specialization}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-tie pl-2"></i> Experience: {{$reception->experience}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-building pl-2"></i> Department: {{$reception->department}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-door-open pl-2"></i> Room: {{$reception->room}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-venus-mars pl-2"></i> Gender: {{$reception->gender}}</p>
                <p class="text-gray-700 mb-1"><i class="fas fa-user-tag pl-2"></i> Role: {{$reception->role}}</p>
            </div>
        </div>
    </div>
  </nav>
  <main>
    {{$slot}}
  </main>
  <footer class="bg-blue-600 text-white text-semibold  mt-auto">
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
