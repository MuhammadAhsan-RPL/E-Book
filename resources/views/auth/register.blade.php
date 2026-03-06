 @vite('resources/css/app.css', 'resources/js/app.js')

<div class="min-h-screen bg-gradient-to-br from-purple-900 via-pink-900 to-red-900 flex items-center justify-center p-4 relative overflow-hidden">
    <!-- 3D Background Elements -->
    <div class="absolute top-10 left-10 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d" style="animation-delay: -3s;"></div>
    <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-red-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d" style="animation-delay: -1.5s;"></div>

    <!-- 3D Rings -->
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border-2 border-white/10 rounded-full animate-rotate-3d"></div>
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border-2 border-purple-500/20 rounded-full animate-rotate-3d" style="animation-direction: reverse;"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 animate-float-3d animate-glow-rainbow">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" 
                     alt="Logo" 
                     class="h-16 w-16 transform hover:scale-125 hover:rotate-180 transition-all duration-700">
            </div>
            <h1 class="text-4xl font-bold text-white mt-6 mb-2 text-gradient-flow">Join Us! 🚀</h1>
            <p class="text-white/70 text-lg animate-pulse-3d">Mulai petualangan literasimu</p>
        </div>

        <!-- Register Card -->
        <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">
            @if(session('error'))
            <div class="mb-4 p-3 bg-red-500/20 border border-red-500/30 rounded-lg text-white text-sm animate-pulse">
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-4 p-3 bg-red-500/20 border border-red-500/30 rounded-lg text-white text-sm animate-pulse">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('action.register') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-white/90 mb-2">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/60 group-hover:text-white group-hover:scale-125 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" 
                               name="email" 
                               required 
                               class="input-3d w-full pl-10 pr-3 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 transition-all"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Username Field -->
                <div>
                    <label class="block text-sm font-medium text-white/90 mb-2">Username</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/60 group-hover:text-white group-hover:scale-125 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               name="username" 
                               required 
                               class="input-3d w-full pl-10 pr-3 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 transition-all"
                               placeholder="john_doe">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-white/90 mb-2">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/60 group-hover:text-white group-hover:scale-125 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" 
                               name="password" 
                               required 
                               class="input-3d w-full pl-10 pr-3 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 transition-all"
                               placeholder="Min. 8 karakter">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="btn-3d w-full bg-gradient-to-r from-purple-500 to-pink-600 text-white py-4 px-4 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-700 transition-all duration-300 shadow-lg hover:shadow-2xl relative overflow-hidden group">
                    <span class="relative z-10">🎉 Daftar Sekarang 🎉</span>
                    <div class="absolute inset-0 bg-white/20 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                </button>

                <!-- Login Link -->
                <p class="text-center text-white/80">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-white font-semibold hover:underline hover:scale-105 inline-block transition-all duration-300 animate-pulse">
                        Masuk di sini →
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>