@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center bounce-in">
            <h1 class="text-5xl font-bold text-gradient-flow mb-4 animate-float-3d">✏️ Edit Penulis ✏️</h1>
            <p class="text-gray-600 text-lg">Mengedit: <span class="font-semibold text-emerald-600">{{ $edit->name_author }}</span></p>
        </div>

        <!-- Form Card -->
        <div class="card-3d bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-8 py-6">
                <h2 class="text-2xl font-semibold text-white flex items-center gap-3">
                    <svg class="h-7 w-7 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Form Edit Penulis
                </h2>
            </div>
            
            <div class="p-8">
                <form action="{{ route('penulis.update', $edit->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nama -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Nama Penulis</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" name="name_author" value="{{ $edit->name_author }}" required 
                                   class="input-3d w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:border-amber-500 transition-all">
                        </div>
                    </div>

                    <!-- Umur -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Umur</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input type="number" name="age" value="{{ $edit->age }}" 
                                   class="input-3d w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:border-amber-500 transition-all">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Alamat</label>
                        <div class="relative group">
                            <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <textarea name="alamat" rows="3" 
                                      class="input-3d w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:border-amber-500 transition-all">{{ $edit->alamat }}</textarea>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('penulis.index') }}" 
                           class="px-8 py-4 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                            Batal
                        </a>
                        <button type="submit" 
                                class="btn-3d px-10 py-4 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center gap-2 group">
                            <span class="group-hover:scale-110 transition-transform">✏️</span>
                            Update Penulis
                            <span class="group-hover:scale-110 transition-transform">✨</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection