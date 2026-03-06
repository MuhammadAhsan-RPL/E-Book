@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center bounce-in">
            <h1 class="text-5xl font-bold text-gradient-flow mb-4 animate-float-3d">✏️ Edit Genre</h1>
            <p class="text-gray-600 text-lg">Mengedit: <span class="font-semibold text-purple-600">{{ $update->name_genre }}</span></p>
        </div>

        <!-- Form Card -->
        <div class="card-3d bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-8 py-6">
                <h2 class="text-2xl font-semibold text-white flex items-center gap-3">
                    <svg class="h-7 w-7 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Form Edit Genre
                </h2>
            </div>
            
            <div class="p-8">
                <form action="{{ route('genre.update', $update->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nama Genre -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Nama Genre</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-5-5A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <input type="text" name="name_genre" value="{{ $update->name_genre }}" required 
                                   class="input-3d w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:border-amber-500 transition-all">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('genre.index') }}" 
                           class="px-8 py-4 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                            Batal
                        </a>
                        <button type="submit" 
                                class="btn-3d px-10 py-4 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center gap-2 group">
                            <span class="group-hover:scale-110 transition-transform">✏️</span>
                            Update Genre
                            <span class="group-hover:scale-110 transition-transform">✨</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection