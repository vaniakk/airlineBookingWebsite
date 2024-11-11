<nav class="sticky top-0 z-50 shadow-md dark:bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 md:px-4 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center md:hidden">

        <!-- Mobile menu button untuk md and ukuran dibawahnya -->
        <button type="button" id="menu-toggle" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>

          <!-- Icon ketika menu di tutup -->
          <svg id="icon-open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>

          <!-- Icon ketika menu di buka -->
          <svg id="icon-close" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center md:justify-between lg:justify-start">
        <div class="flex flex-shrink-0 items-center lg:justify-start">
          <img class="h-6 w-auto" src="images/logo.webp" alt="Your Company">
        </div>
        <div class="hidden md:flex md:space-x-4 lg:ml-6 lg:block lg:justify-end text-gray-600">
          <a href="/flights" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-100 hover:text-gray-900 dark:text-white" aria-current="page">Flights</a>
        </div>
      </div>

        <!-- Dark mode toggle button -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:pr-4 ">
        <button id="theme-toggle" type="button" class=" text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile menu untuk sm and md -->
  <div class="md:hidden" id="mobile-menu" style="display: none;">
    <div class="space-y-1 px-2 pb-3 pt-2 text-gray-600">
      <a href="/flights" class="block rounded-md 0 px-3 py-2 text-base font-medium hover:bg-gray-100 hover:text-gray-900 dark:text-white" aria-current="page">Flights</a>
    </div>
  </div>
</nav>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');
        } else {
            menu.style.display = 'none';
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        }
    });

    window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav');
    const isDarkMode = document.documentElement.classList.contains('dark');
    
    if (window.scrollY > 0) {
          if (isDarkMode) {
              navbar.classList.add('bg-gray-800');
          } else {
              navbar.classList.add('bg-white');
          }
      } else {
          navbar.classList.remove('bg-white', 'bg-gray-800');
      }
    });

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>