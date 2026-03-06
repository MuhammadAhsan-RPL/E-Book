@extends('layouts.blank')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-all duration-300 transform hover:-translate-x-2 group">
                <svg class="h-5 w-5 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Daftar Buku</span>
            </a>
        </div>

        <!-- Main Card -->
        <div class="card-3d bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-8">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center animate-float-3d">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">{{ $detail->judul }}</h1>
                        <div class="flex items-center gap-3 text-indigo-100">
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm">ID Buku: #{{ $detail->id }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Cover Section -->
                    <div class="md:col-span-1">
                        <div class="sticky top-24">
                            <div class="relative group">
                                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                <img src="{{ asset('storage/' . $detail->image) }}" 
                                     alt="{{ $detail->judul }}" 
                                     class="relative w-full rounded-3xl shadow-2xl border-4 border-white transform group-hover:scale-105 transition-all duration-500">
                            </div>
                            
                            <!-- Quick Info -->
                            <div class="mt-6 flex flex-wrap gap-3">
                                <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-xl text-sm font-semibold animate-pulse-3d">
                                    📅 {{ $detail->tahun_terbit }}
                                </span>
                                <span class="px-4 py-2 bg-purple-100 text-purple-800 rounded-xl text-sm font-semibold animate-pulse-3d" style="animation-delay: 0.5s">
                                    🏷️ {{ $detail->genre->name_genre }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Synopsis -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-200 transform hover:scale-105 transition-all duration-300">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="h-6 w-6 text-indigo-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                📖 Sinopsis
                            </h2>
                            <p class="text-gray-700 leading-relaxed text-lg">
                                {{ $detail->sinopsis }}
                            </p>
                        </div>

                        <!-- Author Info -->
                        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 border border-indigo-100 transform hover:scale-105 transition-all duration-300">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="h-6 w-6 text-indigo-600 animate-spin" style="animation-duration: 3s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                ✍️ Tentang Penulis
                            </h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Nama -->
                                <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white text-xl font-bold transform hover:rotate-12 transition-transform">
                                        {{ substr($detail->author->name_author, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Nama Penulis</p>
                                        <p class="font-bold text-gray-900">{{ $detail->author->name_author }}</p>
                                    </div>
                                </div>

                                <!-- Umur -->
                                <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Umur</p>
                                        <p class="font-bold text-gray-900">{{ $detail->author->age }} tahun</p>
                                    </div>
                                </div>

                                <!-- Alamat (full width) -->
                                <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm sm:col-span-2">
                                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500">Alamat</p>
                                        <p class="font-bold text-gray-900">{{ $detail->author->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        @auth
                        <div class="flex justify-end gap-3 pt-4">
                            <a href="{{ route('book.edit', $detail->id) }}" 
                               class="btn-3d px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-semibold transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl group">
                                <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Buku
                            </a>
                            
                            <form action="{{ route('book.delete', $detail->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus buku ini? 😢')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn-3d px-6 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl group">
                                    <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus Buku
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>