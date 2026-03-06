@vite('resources/css/app.css', 'resources/js/app.js')

<div class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 flex items-center justify-center p-4 relative overflow-hidden">
    <!-- 3D Rotating Background Elements -->
    <div class="absolute top-20 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d" style="animation-delay: -2s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-3d" style="animation-delay: -4s;"></div>

    <!-- 3D Rings -->
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] border-2 border-white/10 rounded-full animate-rotate-3d"></div>
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] border-2 border-indigo-500/20 rounded-full animate-rotate-3d" style="animation-direction: reverse; animation-duration: 15s;"></div>
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[900px] border-2 border-purple-500/10 rounded-full animate-rotate-3d" style="animation-duration: 25s;"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Logo dengan Animasi Super -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 animate-float-3d animate-glow-rainbow shine">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" 
                     alt="Logo" 
                     class="h-16 w-16 transform hover:scale-125 hover:rotate-180 transition-all duration-700">
            </div>
            <h1 class="text-5xl font-bold text-white mt-6 mb-2 text-gradient-flow">
                Library<span class="text-white">Flow</span>
            </h1>
            <p class="text-white/70 text-lg animate-pulse-3d">✨ Baca · Pinjam · Jelajahi ✨</p>
        </div>

        <!-- Login Card -->
        <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">
            <form action="{{ route('action.login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-white/90 mb-2">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/60 group-hover:text-white group-hover:scale-125 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" 
                               name="email" 
                               required 
                               class="input-3d w-full pl-10 pr-3 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-indigo-400 transition-all"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-white/90 mb-2">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/60 group-hover:text-white group-hover:scale-125 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" 
                               name="password" 
                               required 
                               class="input-3d w-full pl-10 pr-3 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-indigo-400 transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="flex items-center justify-end">
                    <a href="#" class="text-sm text-white/80 hover:text-white hover:scale-105 transition-all duration-300 flex items-center gap-1 group">
                        <span>Lupa password?</span>
                        <svg class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="btn-3d w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-4 px-4 rounded-xl font-semibold hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-2xl relative overflow-hidden group">
                    <span class="relative z-10">✨ Masuk Sekarang ✨</span>
                    <div class="absolute inset-0 bg-white/20 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                </button>

                <!-- Register Link -->
                <p class="text-center text-white/80">
                    Belum punya akun? 
                    <a href="{{ route('register')}}" class="text-white font-semibold hover:underline hover:scale-105 inline-block transition-all duration-300 animate-pulse">
                        Daftar sekarang →
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>