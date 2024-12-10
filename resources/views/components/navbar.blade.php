<!---
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const hamburgerButton = document.querySelector('[data-collapse-toggle="navbar-hamburger"]');
      const navbarMenu = document.getElementById('navbar-hamburger');

      hamburgerButton.addEventListener('click', function () {
          navbarMenu.classList.toggle('hidden');
          const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true' || false;
          hamburgerButton.setAttribute('aria-expanded', !isExpanded);
      });
  });
</script>
--->


<nav class="sticky top-0 z-50 border-gray-900 bg dark:bg-sky-900 dark:border-blue-900 relative">
  
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500 whitespace-nowrap dark:text-white">
        PEOPLES_BLOG
    </span>
    
    </a>
<!---darkMode button--->
<button onclick="darkMode()" class="p-2 text-gray-800 dark:text-gray-200 text-gray-200 dark:gray-700 rounded lg:-ml-80 "title='darkmode'>
  <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 text-gray-800 dark:text-gray-200">
    <path stroke="currentColor" stroke-width="2" d="M12 3a9 9 0 000 18c4.418 0 8-3.582 8-8a8.958 8.958 0 00-1.572-4.756A7.977 7.977 0 0012 3z" />
  </svg>
</button> 

    <!-- Main navigation menu -->
    <div class="hidden w-full fixed top-16 left-0 right-0  lg:static lg:flex lg:items-center lg:w-auto justify-center"  id="navbar-hamburger">
      <ul class="flex flex-col p-4 space-y-2 lg:space-y-0 font-regular lg:-ml-60 lg:mt-0 lg:flex-row lg:space-x-4 lg:bg-transparent rounded-lg bg-gray-50 dark:bg-gray-900 lg:dark:bg-transparent">
        <x-navbar-link href="/" :active="request()->is('/')">
          Home
        </x-navbar-link>

        <x-navbar-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
          Blog
        </x-navbar-link>

        @auth
          <x-navbar-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
            Craft Blog
          </x-navbar-link>
          <x-navbar-link href="{{ route('users.create') }}" :active="request()->routeIs('users.create')">
            Add Blogger
          </x-navbar-link>
        @endauth

        <x-navbar-link href="{{ route('contact.index') }}" :active="request()->routeIs('contact.index')">
          About
        </x-navbar-link>
       
      </ul>
    </div>
    
    @guest
<div>
 <!-- <a href="{{ route('register.create')}}">
    Register
  </a>-->
  <a href="{{ route('login.create')}}">
    Login
  </a>
</div>
@endguest

    <!---logout form--->
    @auth
    <div class="ml-0  lg:flex text-red-600 hover:text-red-800">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    </div>
    @endauth

 <!-- Hamburger button -->
      <button data-collapse-toggle="navbar-hamburger" type="button" 
        class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg 
        hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 
        dark:hover:bg-gray-700 dark:focus:ring-gray-600 lg:hidden" aria-controls="navbar-hamburger" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>  
</nav>
