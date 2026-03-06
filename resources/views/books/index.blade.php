@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 bounce-in">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold text-gradient-flow mb-2 animate-float-3d">
                📖 Koleksi Buku
            </h1>
            <p class="text-gray-600 text-lg flex items-center gap-2">
                <span class="inline-block w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                {{ $books->count() }} buku tersedia
            </p>
        </div>
        <a href="{{ route('book.create') }}" 
           class="group bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center gap-3 btn-3d">
            <svg class="h-6 w-6 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="font-semibold">Tambah Buku Baru</span>
        </a>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            title: '✨ Berhasil! ✨',
            text: "{{ session('success') }}",
            icon: 'success',
            timer: 3000,
            showConfirmButton: false,
            background: '#1a1a2e',
            color: '#fff'
        });
    </script>
    @endif

    <!-- Books Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($books as $book)
        <div class="card-3d bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group">
            <!-- Book Cover -->
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/' . $book->image) }}" 
                     alt="{{ $book->judul }}" 
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute bottom-4 left-4 text-white transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                    <span class="px-3 py-1 bg-orange-500 rounded-full text-xs font-semibold">
                        {{ $book->tahun_terbit }}
                    </span>
                </div>
            </div>

            <!-- Book Info -->
            <div class="p-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-semibold animate-pulse">
                        {{ $book->genre->name_genre }}
                    </span>
                </div>

                <h3 class="font-bold text-xl text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                    {{ $book->judul }}
                </h3>
                
                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                    {{ $book->sinopsis }}
                </p>

                <!-- Author -->
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                    <div class="w-6 h-6 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white text-xs font-bold transform group-hover:scale-110 transition-transform">
                        {{ substr($book->author->name_author, 0, 1) }}
                    </div>
                    <span class="group-hover:text-indigo-600 transition-colors">{{ $book->author->name_author }}</span>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <a href="{{ route('book.detail', $book->id) }}" 
                       class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 px-4 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-1 group/btn">
                        <span>✨ Detail</span>
                        <svg class="h-4 w-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    
                    @auth
                    <a href="{{ route('book.edit', $book->id) }}" 
                       class="p-2 text-amber-600 hover:bg-amber-50 rounded-xl transition-all duration-300 transform hover:scale-110 hover:rotate-12">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <div class="inline-block animate-float-3d mb-6">
                <svg class="h-32 w-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-gray-500 text-2xl mb-4">Belum ada buku nih! 📭</p>
            <a href="{{ route('book.create') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-lg hover:underline animate-pulse">
                Tambah buku pertama kamu ✨
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection