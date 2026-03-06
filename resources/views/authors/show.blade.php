@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('penulis.index') }}" 
               class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-all duration-300 transform hover:-translate-x-2 group">
                <svg class="h-5 w-5 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Daftar Penulis</span>
            </a>
        </div>

        <!-- Profile Card -->
        <div class="card-3d bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-12 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-white/10 transform -skew-y-12"></div>
                <div class="relative z-10">
                    <div class="w-32 h-32 bg-white/20 backdrop-blur-xl rounded-3xl mx-auto mb-4 flex items-center justify-center animate-float-3d border-4 border-white/50">
                        <span class="text-5xl font-bold text-white">{{ substr($penulis->name_author, 0, 1) }}</span>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $penulis->name_author }}</h1>
                    <span class="px-4 py-2 bg-white/20 rounded-full text-white text-sm font-semibold inline-flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        Penulis Aktif
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Umur -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-6 rounded-2xl border border-emerald-100 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Umur</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $penulis->age }} <span class="text-lg">tahun</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-6 rounded-2xl border border-yellow-100 md:col-span-2 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p class="text-xl font-semibold text-gray-900">{{ $penulis->alamat }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Dibuat Pada -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-100 md:col-span-2 transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Bergabung Sejak</p>
                                <p class="text-xl font-semibold text-gray-900">{{ $penulis->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                @auth
                <div class="flex justify-center gap-4 mt-8 pt-6 border-t-2 border-gray-100">
                    <a href="{{ route('penulis.edit', $penulis->id) }}" 
                       class="btn-3d px-8 py-4 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-semibold transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl group">
                        <svg class="h-5 w-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profil
                    </a>
                    
                    <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus penulis ini? 😢')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn-3d px-8 py-4 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl group">
                            <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Penulis
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection