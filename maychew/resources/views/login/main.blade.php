<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAYCHEW PUBLIC HEALTH CENTER</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .animated-gradient {
      background: linear-gradient(20deg, rgba(119,175,239,1) 7%, rgba(210,229,255,1) 48%, rgba(115,179,250,1) 90%);    }
    .clock {
      font-size: 4rem;
      font-weight: 800;
      opacity: 1;
    }
    .card {
  position: relative;
  background-color: #c3dafe;
  color: #1a202c;
  font-weight: 500;
  padding: 1.25rem; 
  border-radius: 0.5rem; 
  transition: transform 0.5s, background-color 0.5s, color 0.5s; 
}

.card:hover {
  background-color: #3182ce; 
  color: #ffffff; 
  transform: translateY(-20px); 
}

.card i {
  font-size: 3rem; 
}

.card h2 {
  font-size: 2rem; 
}



  
  </style>
</head>
<body class="relative grid-cols-12">

<div>
  <div class="fixed top-4 left-4 md:hidden z-20">
    <button id="toggle-button" class="p-2 text-white bg-blue-500 rounded">
      Toggle Sidebar
    </button>
  </div>

  <div id="sidebar" class="hidden fixed right-0 col-span-3 opacity-85 bg-white top-0 bottom-0 px-12 font-semibold rounded-tl-3xl rounded-bl-3xl md:flex justify-center items-center z-10">
    <ul class="flex flex-col py-10">
      <li class="py-8">
        <a href="#Home" class="font-extrabold text-blue-500 transition duration-500 hover:text-blue-700">Home</a>
      </li>
      <li class="py-8">
        <a href="#About" class="font-extrabold text-blue-500 transition duration-500 hover:text-blue-700">About</a>
      </li>
      <li class="py-8">
        <a href="#Services" class="font-extrabold text-blue-500 transition duration-500 hover:text-blue-700">Service</a>
      </li>
      <li class="py-8">
        <a href="#Contact" class="font-extrabold text-blue-500 transition duration-500 hover:text-blue-700">Contact</a>
      </li>
      <li class="py-8">
        <a href="{{ route('login') }}" class="font-extrabold text-blue-500 transition duration-500 hover:text-blue-700">Login</a>
      </li>
    </ul>
  </div>

  <div class="fixed z-10 bottom-12 rounded-3xl left-8 opacity-80 flex justify-center items-center bg-slate-400 h-[200px] w-[300px] animated-gradient">
    <div id="clock" class="clock">
      12:00:00 
    </div>
  </div>

  <div id="Home" class="col-span-12">
    <div class="h-screen bg-slate-500 relative">
      <img class="absolute opacity-60 top-0 bottom-0 h-full w-full right-0 left-0 object-cover" src="https://thehill.com/wp-content/uploads/sites/2/2023/07/doctorconsult_072723_adobestock.jpg?strip=1" alt="Health Center">
      <div class='absolute top-64 justify-center items-center top-[50%]'>
        <h1 class='font-bold text-7xl text-center text-slate-100 mb-9'>MAYCHEW PUBLIC HEALTH CENTER</h1>
        <h1 class='font-bold text-5xl text-center text-slate-100'>Compassionate Care, Exceptional Service</h1>
      </div>
    </div>
    
    <div id="About" class="h-screen grid md:grid-cols-12 gap-16 mb-16 md:mb-1">
      <div class='md:col-span-5 flex items-center justify-center opacity-90'>
        <img class='rounded-t-full' src="https://thumbs.dreamstime.com/b/group-black-doctors-nurses-isolated-white-30058871.jpg" alt="Group of Doctors">
      </div>
      <div class='md:col-span-6 md:flex items-center justify-center p-4'>
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg mt-10">
          <h1 class="text-4xl font-bold mb-4">About Us</h1>
          <h2 class="text-2xl font-semibold mb-4">Welcome to MAYCHEW PUBLIC HEALTH CENTER</h2>
          <p class="text-lg">
            At MAYCHEW PUBLIC HEALTH CENTER, we are committed to providing exceptional healthcare
            services to our community. Our mission is to deliver comprehensive, patient-centered
            care that promotes health and well-being for individuals of all ages. We strive to 
            create a welcoming and supportive environment where every patient feels valued and respected.
          </p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-6">
  
      <div class="col-span-1 md:col-span-3">
        <div class="card bg-blue-200 text-black cursor-pointer">
          <i class="fa-solid fa-notes-medical text-5xl mb-6 block mx-auto"></i>
          <h2 class="text-xl font-semibold text-center mb-4">Clinical Documentation</h2>
          <p class="text-lg">Streamlining clinical documentation processes to accurately capture patient encounters, treatment plans, and outcomes. Ensuring compliance with medical coding standards and improving data integrity.</p>
        </div>
      </div>
      
      <div class="col-span-1 md:col-span-1"></div>
      
      <div class="col-span-1 md:col-span-3">
        <div class="card bg-blue-200 text-black cursor-pointer">
          <i class="fas fa-user-md text-5xl mb-6 block mx-auto"></i>
          <h2 class="text-xl font-semibold text-center mb-4">Telehealth Solutions</h2>
          <p class="text-lg">Implementing telehealth platforms for remote patient consultations, monitoring, and follow-ups. Enhancing access to healthcare services while ensuring patient data security and privacy.</p>
        </div>
      </div>
      
      <div class="col-span-1 md:col-span-1/2"></div>
      
      <div class="col-span-1 md:col-span-3">
        <div class="card bg-blue-200 text-black cursor-pointer">
          <i class="fa-solid fa-network-wired text-5xl mb-6 block mx-auto"></i>
          <h2 class="text-xl font-semibold text-center mb-4">Data Analytics in Healthcare</h2>
          <p class="text-lg">Utilizing data analytics to derive insights from patient records, clinical outcomes, and operational efficiencies. Enhancing decision-making processes and improving healthcare outcomes.</p>
        </div>
      </div>
    
    </div>
    
    
    


  </div>

  <script>
    const toggleButton = document.getElementById('toggle-button');
    const sidebar = document.getElementById('sidebar');

    toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('hidden');
    });

    function updateClock() {
      const clock = document.getElementById('clock');
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      clock.textContent = `${hours}:${minutes}:${seconds}`;
    }

    setInterval(updateClock, 1000);
    updateClock(); 
  </script>
</div>

<footer id="Contact" class="bg-blue-600 text-white mt-auto">
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

</body>
</html>
