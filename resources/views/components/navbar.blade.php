<nav class="relative bg-gradient-to-r from-indigo-900 via-purple-900 to-pink-900 shadow-2xl sticky top-0 z-50 border-b border-white/10">
  <!-- Animated Background Lines -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/50 to-transparent animate-slide"></div>
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-indigo-400/50 to-transparent animate-slide-reverse"></div>
  </div>

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      
      <!-- Mobile menu button with 3D animation -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" id="mobile-menu-button" 
                class="group relative inline-flex items-center justify-center rounded-xl p-2 text-white/70 hover:text-white hover:bg-white/10 transition-all duration-300 transform hover:scale-110 hover:rotate-180 btn-3d">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6 transition-transform duration-500 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Logo with 3D float animation -->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <div class="relative group">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg blur-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" 
                 alt="Your Company" 
                 class="relative h-8 w-auto transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 animate-float-3d">
          </div>
        </div>

        <!-- Desktop Menu with 3D hover -->
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-1">
            <a href="/" 
               class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl
                      {{ request()->is('/') ? 'bg-white/20 text-white shadow-lg' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
              <span class="flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
              </span>
            </a>
            
            <a href="{{ route('penulis.index') }}" 
               class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl
                      {{ request()->routeIs('penulis.*') ? 'bg-white/20 text-white shadow-lg' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
              <span class="flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Authors
              </span>
            </a>
            
            <a href="{{ route('book.index') }}" 
               class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl
                      {{ request()->routeIs('book.*') ? 'bg-white/20 text-white shadow-lg' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
              <span class="flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                Books
              </span>
            </a>
            
            <a href="{{ route('genre.index') }}" 
               class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 hover:shadow-xl
                      {{ request()->routeIs('genre.*') ? 'bg-white/20 text-white shadow-lg' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
              <span class="flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-5-5A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                Genres
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Auth Buttons with 3D animation -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        @guest
          <a href="{{ route('action.login') }}" 
             class="group relative px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-2xl btn-3d overflow-hidden">
            <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
            <span class="relative flex items-center gap-2">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
              </svg>
              Login
            </span>
          </a>
        @endguest

        @auth
          <div class="flex items-center gap-3">
            <!-- User Avatar with 3D animation -->
            <div class="relative group">
              <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full blur-lg opacity-50 group-hover:opacity-100 transition-opacity"></div>
              <div class="relative w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm transform group-hover:scale-110 transition-all duration-300">
                {{ substr(Auth::user()->name, 0, 1) }}
              </div>
            </div>
            
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="group relative px-6 py-2 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-2xl btn-3d overflow-hidden">
              <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
              <span class="relative flex items-center gap-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
              </span>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>
          </div>
        @endauth
      </div>
    </div>
  </div>

  <!-- Mobile Menu with slide-down animation -->
  <div id="mobile-menu" class="hidden sm:hidden bg-white/5 backdrop-blur-xl border-t border-white/10 transform transition-all duration-500">
    <div class="space-y-1 px-4 py-3">
      <a href="/" class="block px-4 py-3 rounded-xl text-base font-medium text-white hover:bg-white/10 transition-all duration-300 transform hover:translate-x-2">
        📊 Dashboard
      </a>
      <a href="{{ route('penulis.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-white hover:bg-white/10 transition-all duration-300 transform hover:translate-x-2">
        👥 Authors
      </a>
      <a href="{{ route('book.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-white hover:bg-white/10 transition-all duration-300 transform hover:translate-x-2">
        📚 Books
      </a>
      <a href="{{ route('genre.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-white hover:bg-white/10 transition-all duration-300 transform hover:translate-x-2">
        🏷️ Genres
      </a>
      
      @auth
      <div class="border-t border-white/10 pt-3 mt-3">
        <div class="px-4 py-3 text-sm text-white/70">
          Logged in as: <span class="font-semibold text-white">{{ Auth::user()->name }}</span>
        </div>
      </div>
      @endauth
    </div>
  </div>
</nav>

<!-- Mobile Menu Toggle Script -->
<script>
  document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>

<!-- Tambahkan CSS Animasi ini di bagian head jika belum ada -->
<style>
  @keyframes slide {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
  }
  .animate-slide {
    animation: slide 3s linear infinite;
  }
  .animate-slide-reverse {
    animation: slide 3s linear infinite reverse;
  }
  
  @keyframes float-3d {
    0%, 100% { transform: translateY(0) rotateX(0deg) rotateY(0deg); }
    25% { transform: translateY(-5px) rotateX(5deg) rotateY(5deg); }
    50% { transform: translateY(-10px) rotateX(10deg) rotateY(10deg); }
    75% { transform: translateY(-5px) rotateX(5deg) rotateY(-5deg); }
  }
  .animate-float-3d {
    animation: float-3d 4s ease-in-out infinite;
    transform-style: preserve-3d;
  }
  
  .btn-3d {
    transition: all 0.3s;
    transform-style: preserve-3d;
  }
  .btn-3d:hover {
    transform: perspective(500px) translateZ(20px) rotateX(5deg) rotateY(5deg);
  }
</style>