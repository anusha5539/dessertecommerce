<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blissberry</title>
    <link rel="shortcut icon" href="{{asset('home/images/icon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('home/CSS/style.css')}}">
    @vite('resources/css/app.css')
</head>

<body>
    
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <span class="self-center text-2xl  whitespace-nowrap dark:text-white uppercase font-bold">Blissberry</span>
      
          <button
          data-collapse-toggle="navbar-default"
          type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col mt-4 md:p-0  border border-gray-100 rounded-lg bg-gray-50 md:flex-row lg:space-x-6 md:space-x-5 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{ url('/') }}" class="block  pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500 uppercase font-semibold" aria-current="page">Home</a>
          </li>
          <li>
            <a href="{{ url('about_us') }}" class="block py-2 pl-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase font-semibold">About Us</a>
          </li>
          <li>
            <a href="{{ url('all_product') }}" class="block py-2 pl-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase font-semibold">All Products</a>
          </li>
         
          <li>
            <a href="{{ url('show_cart') }}" class="block py-2 pl-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </li>
          <li>
            <a href="{{ url('show_order') }}" class="block py-2 pl-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase font-semibold" >Order</a>
          </li>
          @if (Route::has('login'))
          @auth
          <li class="nav-item">
          <x-app-layout>

          </x-app-layout>
          </li>
          @else
          <li>
            <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase font-semibold" >login</a>
          </li>
          <li>
            <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent uppercase font-semibold" >Register</a>
          </li>
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
    <script src="{{asset('https://kit.fontawesome.com/6b5200b138.js')}}" crossorigin="anonymous"></script>
    <script>
      const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
      const menu = document.getElementById('navbar-default');


      button.addEventListener('click', function () {
  // Toggle the "hidden" class on the menu to show/hide it
        menu.classList.toggle('hidden');
});
    </script>
</body>

</html>
