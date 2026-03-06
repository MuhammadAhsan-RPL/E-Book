<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Library App')</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css', 'resources/js/app.js')
    
    <style>
        /* Animasi Floating 3D */
        @keyframes float-3d {
            0% { transform: translateY(0px) rotateX(0deg) rotateY(0deg) scale(1); }
            25% { transform: translateY(-15px) rotateX(5deg) rotateY(10deg) scale(1.05); }
            50% { transform: translateY(10px) rotateX(-5deg) rotateY(-10deg) scale(0.95); }
            75% { transform: translateY(-5px) rotateX(3deg) rotateY(5deg) scale(1.02); }
            100% { transform: translateY(0px) rotateX(0deg) rotateY(0deg) scale(1); }
        }
        .animate-float-3d {
            animation: float-3d 6s ease-in-out infinite;
            transform-style: preserve-3d;
        }

        /* Animasi Glow Pelangi */
        @keyframes glow-rainbow {
            0% { filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.7)); }
            20% { filter: drop-shadow(0 0 30px rgba(168, 85, 247, 0.8)); }
            40% { filter: drop-shadow(0 0 40px rgba(236, 72, 153, 0.9)); }
            60% { filter: drop-shadow(0 0 30px rgba(59, 130, 246, 0.8)); }
            80% { filter: drop-shadow(0 0 25px rgba(16, 185, 129, 0.7)); }
            100% { filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.7)); }
        }
        .animate-glow-rainbow {
            animation: glow-rainbow 5s ease-in-out infinite;
        }

        /* Animasi Rotate 3D */
        @keyframes rotate-3d {
            from { transform: perspective(1000px) rotateY(0deg) rotateX(10deg); }
            to { transform: perspective(1000px) rotateY(360deg) rotateX(10deg); }
        }
        .animate-rotate-3d {
            animation: rotate-3d 20s linear infinite;
            transform-style: preserve-3d;
        }

        /* Animasi Pulse 3D */
        @keyframes pulse-3d {
            0% { transform: scale(1) translateZ(0); box-shadow: 0 0 30px rgba(99,102,241,0.3); }
            50% { transform: scale(1.1) translateZ(50px); box-shadow: 0 0 60px rgba(168,85,247,0.6); }
            100% { transform: scale(1) translateZ(0); box-shadow: 0 0 30px rgba(99,102,241,0.3); }
        }
        .animate-pulse-3d {
            animation: pulse-3d 3s ease-in-out infinite;
        }

        /* Animasi Wobble */
        @keyframes wobble {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(5deg) scale(1.1); }
            50% { transform: rotate(-5deg) scale(1.15); }
            75% { transform: rotate(3deg) scale(1.05); }
        }
        .animate-wobble:hover {
            animation: wobble 0.6s ease-in-out;
        }

        /* Particle Effect */
        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            border-radius: 50%;
            animation: particle-fly 15s linear infinite;
            opacity: 0.6;
            pointer-events: none;
        }
        @keyframes particle-fly {
            0% { transform: translateY(100vh) translateX(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.8; }
            90% { opacity: 0.8; }
            100% { transform: translateY(-100px) translateX(100px) rotate(720deg); opacity: 0; }
        }

        /* Card 3D Hover */
        .card-3d {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }
        .card-3d:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(10deg) translateZ(30px) scale(1.02);
            box-shadow: -30px 30px 40px rgba(0,0,0,0.3);
        }

        /* Input 3D */
        .input-3d {
            transition: all 0.3s;
            transform-style: preserve-3d;
        }
        .input-3d:focus {
            transform: perspective(500px) translateZ(25px) scale(1.02);
            box-shadow: 0 25px 40px -15px rgba(99,102,241,0.6);
        }

        /* Button 3D */
        .btn-3d {
            transition: all 0.3s;
            transform-style: preserve-3d;
        }
        .btn-3d:hover {
            transform: perspective(500px) translateZ(30px) scale(1.05);
            box-shadow: 0 20px 30px -10px currentColor;
        }
        .btn-3d:active {
            transform: perspective(500px) translateZ(10px) scale(0.98);
        }

        /* Text Gradient Animation */
        .text-gradient-flow {
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899, #3b82f6, #6366f1);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient-flow 6s ease infinite;
        }
        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Loading Spinner Keren */
        .spinner-3d {
            width: 60px;
            height: 60px;
            border: 6px solid rgba(99,102,241,0.1);
            border-top: 6px solid #6366f1;
            border-right: 6px solid #a855f7;
            border-bottom: 6px solid #ec4899;
            border-radius: 50%;
            animation: spin-3d 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
        }
        @keyframes spin-3d {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(360deg) scale(1.2); }
            100% { transform: rotate(720deg) scale(1); }
        }

        /* Shine Effect */
        .shine {
            position: relative;
            overflow: hidden;
        }
        .shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 50%;
            height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(25deg);
            animation: shine 6s infinite;
        }
        @keyframes shine {
            0% { left: -60%; }
            20% { left: 120%; }
            100% { left: 120%; }
        }

        /* Bounce In */
        .bounce-in {
            animation: bounceIn 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        @keyframes bounceIn {
            0% { transform: scale(0) translateZ(-1000px); opacity: 0; }
            60% { transform: scale(1.1) translateZ(50px); opacity: 0.9; }
            80% { transform: scale(0.95) translateZ(20px); }
            100% { transform: scale(1) translateZ(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Particle Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        @for($i = 0; $i < 50; $i++)
        <div class="particle" style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 20) }}s; animation-duration: {{ rand(10, 20) }}s;"></div>
        @endfor
    </div>

    <div class="flex min-h-screen relative z-10">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white shadow-2xl card-3d">
            <div class="p-6 shine">
                <h1 class="text-2xl font-bold text-gradient-flow mb-1">Library</h1>
                <p class="text-xs text-gray-400 animate-pulse">✨ Management System ✨</p>
            </div>
            
            <nav class="mt-6">
                <ul class="space-y-1 px-3">
                    <li>
                        <a href="/" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-purple-600 hover:text-white rounded-xl transition-all duration-300 transform hover:scale-105 hover:translate-x-2 group">
                            <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/genre" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-purple-600 hover:to-pink-600 hover:text-white rounded-xl transition-all duration-300 transform hover:scale-105 hover:translate-x-2 group">
                            <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-5-5A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span>Genre</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('penulis.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-teal-600 hover:text-white rounded-xl transition-all duration-300 transform hover:scale-105 hover:translate-x-2 group">
                            <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Author</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('book.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gradient-to-r hover:from-orange-600 hover:to-red-600 hover:text-white rounded-xl transition-all duration-300 transform hover:scale-105 hover:translate-x-2 group">
                            <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span>Books</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="absolute bottom-0 w-64 p-6">
                <div class="text-xs text-gray-500 animate-pulse">© 2024 Library Flow</div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <nav class="bg-white/80 backdrop-blur-xl shadow-lg border-b border-gray-200 p-4 sticky top-0 z-50">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="spinner-3d w-6 h-6 border-2"></div>
                        <span class="text-sm text-gray-600 animate-pulse">Dashboard</span>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 group cursor-pointer">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-indigo-600 transition-colors">{{ Auth::user()->name ?? 'User' }}</span>
                        </div>
                        <a href="{{ route('logout') }}" class="flex items-center gap-1 text-sm text-red-600 hover:text-red-800 transition-all duration-300 hover:scale-110 btn-3d px-3 py-1 rounded-lg">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="p-6 bounce-in">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>