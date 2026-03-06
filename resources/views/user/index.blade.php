<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan - Koleksi Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css', 'resources/js/app.js')
    
    <!-- Animasi CSS Keren -->
    <style>
        /* Animasi Floating 3D */
        @keyframes float-3d {
            0%, 100% { transform: translateY(0px) rotateX(0deg) rotateY(0deg); }
            25% { transform: translateY(-10px) rotateX(5deg) rotateY(10deg); }
            50% { transform: translateY(-15px) rotateX(10deg) rotateY(15deg); }
            75% { transform: translateY(-5px) rotateX(5deg) rotateY(-5deg); }
        }
        .animate-float-3d {
            animation: float-3d 5s ease-in-out infinite;
            transform-style: preserve-3d;
        }

        /* Animasi Glow Pelangi */
        @keyframes glow-rainbow {
            0% { filter: drop-shadow(0 0 15px rgba(59,130,246,0.7)); }
            25% { filter: drop-shadow(0 0 25px rgba(168,85,247,0.8)); }
            50% { filter: drop-shadow(0 0 35px rgba(236,72,153,0.9)); }
            75% { filter: drop-shadow(0 0 25px rgba(59,130,246,0.8)); }
            100% { filter: drop-shadow(0 0 15px rgba(59,130,246,0.7)); }
        }
        .animate-glow-rainbow {
            animation: glow-rainbow 4s ease-in-out infinite;
        }

        /* Card 3D Hover */
        .card-3d {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
            position: relative;
        }
        .card-3d:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(10deg) translateZ(30px) scale(1.05);
            box-shadow: -30px 30px 40px rgba(0,0,0,0.2);
        }
        .card-3d::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(45deg, #3b82f6, #a855f7, #ec4899);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .card-3d:hover::before {
            opacity: 1;
        }

        /* Button 3D */
        .btn-3d {
            transition: all 0.3s;
            transform-style: preserve-3d;
            position: relative;
            overflow: hidden;
        }
        .btn-3d:hover {
            transform: perspective(500px) translateZ(25px) scale(1.1);
            box-shadow: 0 20px 30px -10px rgba(59,130,246,0.5);
        }
        .btn-3d::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 50%;
            height: 200%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(25deg);
            animation: shine 4s infinite;
        }
        @keyframes shine {
            0% { left: -60%; }
            20% { left: 120%; }
            100% { left: 120%; }
        }

        /* Particle Background */
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: linear-gradient(45deg, #3b82f6, #a855f7, #ec4899);
            border-radius: 50%;
            animation: particle-fly 15s linear infinite;
            opacity: 0.5;
            pointer-events: none;
        }
        @keyframes particle-fly {
            0% { transform: translateY(100vh) translateX(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.8; }
            90% { opacity: 0.8; }
            100% { transform: translateY(-100px) translateX(100px) rotate(720deg); opacity: 0; }
        }

        /* Text Gradient Animation */
        .text-gradient-flow {
            background: linear-gradient(90deg, #3b82f6, #a855f7, #ec4899, #3b82f6);
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

        /* Image Zoom 3D */
        .image-3d {
            transition: all 0.5s;
        }
        .card-3d:hover .image-3d {
            transform: scale(1.2) rotate(2deg);
        }

        /* Badge Bounce */
        .badge-bounce {
            animation: bounce-slow 3s ease-in-out infinite;
        }
        @keyframes bounce-slow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Skeleton Loading Animation */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
        }
        @keyframes skeleton-loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 relative">
    <!-- Particle Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        @for($i = 0; $i < 30; $i++)
        <div class="particle" style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 15) }}s; animation-duration: {{ rand(10, 20) }}s;"></div>
        @endfor
    </div>

    <!-- Navbar Component (tetap seperti punya Anda) -->
    <x-navbar></x-navbar>

    @if(session('error'))
    <script>
        Swal.fire({
            title: "Oops! Error!",
            text: "{{ session('error') }}",
            icon: "error",
            timer: 3000,
            showConfirmButton: false,
            background: '#1a1a2e',
            color: '#fff',
            backdrop: `
                rgba(0,0,0,0.8)
                url("https://media.giphy.com/media/3o7abKhOpu0NwenH3O/giphy.gif")
                left top
                no-repeat
            `
        });
    </script>
    @endif

    <!-- Hero Section with 3D Animation -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white py-16 mb-8 shadow-2xl">
        <!-- Animated Background Orbs -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-white/20 rounded-full blur-3xl animate-float-3d"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/20 rounded-full blur-3xl animate-float-3d" style="animation-delay: -2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-float-3d" style="animation-delay: -4s;"></div>
        
        <!-- 3D Rotating Rings -->
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border-2 border-white/10 rounded-full animate-rotate-3d" style="animation: rotate-3d 30s linear infinite;"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border-2 border-white/5 rounded-full animate-rotate-3d" style="animation: rotate-3d 40s linear infinite reverse;"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-float-3d text-gradient-flow">
                    📚 Koleksi Buku
                </h1>
                <p class="text-xl md:text-2xl opacity-90 mb-8 animate-pulse-3d">
                    Temukan berbagai buku menarik dari penulis terbaik
                </p>
                
                <!-- Search Bar with 3D Effect (optional) -->
                <div class="max-w-2xl mx-auto">
                    <div class="relative group">
                        <input type="text" 
                               placeholder="Cari buku favoritmu..." 
                               class="w-full px-6 py-4 pl-14 bg-white/10 backdrop-blur-xl border-2 border-white/20 rounded-2xl text-white placeholder-white/60 focus:outline-none focus:border-white/40 transition-all input-3d">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 h-6 w-6 text-white/60 group-hover:text-white group-hover:scale-110 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="container mx-auto px-6 py-12 relative z-10">
        @if($books->isEmpty())
        <div class="text-center py-16">
            <div class="inline-block animate-float-3d mb-6">
                <svg class="h-32 w-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-gray-500 text-2xl mb-4">Belum ada buku yang tersedia</p>
            @auth
            <a href="{{ route('book.create') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold text-lg animate-pulse">
                <span>✨ Tambah buku sekarang</span>
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            @endauth
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($books as $index => $book)
            <div class="card-3d bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group"
                 style="animation-delay: {{ $index * 0.1 }}s">
                
                <!-- Book Cover with 3D Effect -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $book->image) }}" 
                         alt="{{ $book->judul }}" 
                         class="image-3d w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute top-3 left-3 flex gap-2">
                        <span class="px-3 py-1.5 bg-blue-500 text-white text-xs font-semibold rounded-full shadow-lg transform hover:scale-110 transition-transform badge-bounce">
                            📅 {{ $book->tahun_terbit }}
                        </span>
                    </div>
                    
                    <!-- Genre Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="px-3 py-1.5 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-semibold rounded-full shadow-lg transform hover:scale-110 transition-transform animate-pulse-3d">
                            🏷️ {{ $book->genre->name_genre }}
                        </span>
                    </div>
                    
                    <!-- Quick View Button (muncul saat hover) -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <a href="{{ route('book.detail', $book->id) }}" 
                           class="btn-3d bg-white text-blue-600 px-6 py-3 rounded-xl font-semibold shadow-2xl transform -translate-y-10 group-hover:translate-y-0 transition-all duration-500">
                            <span class="flex items-center gap-2">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat Detail
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Book Info -->
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-900 mb-2 line-clamp-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 transition-all">
                        {{ $book->judul }}
                    </h3>
                    
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                        {{ $book->sinopsis }}
                    </p>

                    <!-- Author Info with Avatar -->
                    <div class="flex items-center gap-3 mb-4 p-3 bg-gray-50 rounded-xl group-hover:bg-gradient-to-r group-hover:from-blue-50 group-hover:to-purple-50 transition-all">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold text-lg transform group-hover:rotate-12 transition-transform">
                            {{ substr($book->author->name_author, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Penulis</p>
                            <p class="font-semibold text-gray-900">{{ $book->author->name_author }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('book.detail', $book->id) }}" 
                           class="btn-3d flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-center py-3 px-4 rounded-xl text-sm font-semibold transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                            <span>✨ Detail</span>
                            <svg class="h-4 w-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        
                        @auth
                        <a href="{{ route('book.edit', $book->id) }}" 
                           class="btn-3d p-3 text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-xl transition-all duration-300 transform hover:scale-110 hover:rotate-12 group/edit"
                           title="Edit Buku">
                            <svg class="h-5 w-5 group-hover/edit:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        
                        <form action="{{ route('book.delete', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus buku ini? 😢')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn-3d p-3 text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-all duration-300 transform hover:scale-110 hover:-rotate-12 group/delete"
                                    title="Hapus Buku">
                                <svg class="h-5 w-5 group-hover/delete:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination (kalau ada) -->
        @if(method_exists($books, 'links'))
        <div class="mt-12">
            {{ $books->links() }}
        </div>
        @endif
        @endif
    </div>

    <!-- Footer Simple -->
    <footer class="bg-white/80 backdrop-blur-sm border-t border-gray-200 mt-12 py-6">
        <div class="container mx-auto px-6 text-center text-gray-600">
            <p>© 2024 Perpustakaan Digital. Dibuat dengan ❤️ untuk para pembaca</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    
    <!-- Tambahan Animasi JavaScript -->
    <script>
        // Efek parallax sederhana untuk hero section
        window.addEventListener('scroll', function() {
            const hero = document.querySelector('.bg-gradient-to-r');
            if (hero) {
                const scrolled = window.pageYOffset;
                hero.style.transform = `translateY(${scrolled * 0.1}px)`;
            }
        });
    </script>
</body>
</html>