@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center bounce-in">
            <h1 class="text-5xl font-bold text-gradient-flow mb-4 animate-float-3d">✨ Tambah Buku Baru ✨</h1>
            <p class="text-gray-600 text-lg">Isi data buku dengan lengkap ya!</p>
        </div>

        @if ($errors->any())
        <div class="mb-6 rounded-2xl bg-red-50 border-2 border-red-200 p-6 animate-pulse">
            <div class="flex items-center gap-3 text-red-800 font-semibold mb-3">
                <svg class="h-6 w-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-lg">Ada yang salah nih!</span>
            </div>
            <ul class="list-disc list-inside text-red-700 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="card-3d bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 px-8 py-6">
                <h2 class="text-2xl font-semibold text-white flex items-center gap-3">
                    <svg class="h-7 w-7 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Form Input Buku
                </h2>
            </div>
            
            <div class="p-8">
                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Judul -->
                        <div class="space-y-2 md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700">Judul Buku <span class="text-red-500">*</span></label>
                            <input type="text" name="judul" required 
                                   class="input-3d w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:border-orange-500 transition-all"
                                   placeholder="Contoh: Laskar Pelangi">
                        </div>

                        <!-- Sinopsis -->
                        <div class="space-y-2 md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700">Sinopsis</label>
                            <textarea name="sinopsis" rows="4" 
                                      class="input-3d w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:border-orange-500 transition-all"
                                      placeholder="Ceritakan sedikit tentang buku ini..."></textarea>
                        </div>

                        <!-- Tahun Terbit -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" 
                                   class="input-3d w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:border-orange-500 transition-all"
                                   placeholder="2024">
                        </div>

                        <!-- Genre -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Genre</label>
                            <select name="genre_id" class="input-3d w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:border-orange-500 transition-all bg-white">
                                <option value="">-- Pilih Genre --</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name_genre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Author -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">Author</label>
                            <select name="author_id" class="input-3d w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:border-orange-500 transition-all bg-white">
                                <option value="">-- Pilih Author --</option>
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name_author }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cover Image -->
                        <div class="space-y-3 md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700">Cover Buku</label>
                            <div class="relative">
                                <input type="file" name="image" id="imageInput" 
                                       class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 transition-all">
                            </div>
                            <div class="mt-4">
                                <img class="max-w-xs rounded-2xl shadow-xl border-4 border-orange-200 hidden transform hover:scale-105 transition-all" id="previewImage" alt="Preview">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('book.index') }}" 
                           class="px-8 py-4 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                            Batal
                        </a>
                        <button type="submit" 
                                class="btn-3d px-10 py-4 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center gap-2 group">
                            <span class="group-hover:scale-110 transition-transform">✨</span>
                            Simpan Buku
                            <span class="group-hover:scale-110 transition-transform">✨</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const preview = document.getElementById('previewImage');
        const file = e.target.files[0];
        
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.classList.add('hidden');
        }
    });
</script>
@endsection