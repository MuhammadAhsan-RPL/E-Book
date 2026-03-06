@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 bounce-in">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold text-gradient-flow mb-2 animate-float-3d">
                👨‍💼 Daftar Penulis
            </h1>
            <p class="text-gray-600 text-lg flex items-center gap-2">
                <span class="inline-block w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                {{ $authors->count() }} penulis terdaftar
            </p>
        </div>
        <a href="{{ route('penulis.create') }}" 
           class="group bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 flex items-center gap-3 btn-3d">
            <svg class="h-6 w-6 group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            <span class="font-semibold">Tambah Penulis</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="card-3d bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-emerald-50 to-teal-50 border-b-2 border-gray-200">
                        <th class="px-6 py-5 text-left text-sm font-bold text-gray-600">No</th>
                        <th class="px-6 py-5 text-left text-sm font-bold text-gray-600">Nama Penulis</th>
                        <th class="px-6 py-5 text-left text-sm font-bold text-gray-600">Umur</th>
                        <th class="px-6 py-5 text-left text-sm font-bold text-gray-600">Alamat</th>
                        <th class="px-6 py-5 text-left text-sm font-bold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($authors as $author)
                    <tr class="hover:bg-gray-50/80 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg group">
                        <td class="px-6 py-5 text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-xl flex items-center justify-center text-white font-bold text-lg transform group-hover:rotate-12 transition-transform">
                                    {{ substr($author->name_author, 0, 1) }}
                                </div>
                                <span class="font-semibold text-gray-900">{{ $author->name_author }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1.5 bg-emerald-100 text-emerald-700 rounded-xl text-sm font-medium animate-pulse-3d">
                                🎂 {{ $author->age }} th
                            </span>
                        </td>
                        <td class="px-6 py-5 text-sm text-gray-600">{{ $author->alamat }}</td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('penulis.show', $author->id) }}" 
                                   class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-300 transform hover:scale-110 hover:rotate-6 group/btn" title="Detail">
                                    <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('penulis.edit', $author->id) }}" 
                                   class="p-2.5 text-amber-600 hover:bg-amber-50 rounded-xl transition-all duration-300 transform hover:scale-110 hover:rotate-6 group/btn" title="Edit">
                                    <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('penulis.destroy', $author->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus penulis ini? 😢')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all duration-300 transform hover:scale-110 hover:rotate-6 group/btn"
                                            title="Hapus">
                                        <svg class="h-5 w-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($authors->isEmpty())
        <div class="text-center py-16">
            <div class="inline-block animate-float-3d mb-6">
                <svg class="h-32 w-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <p class="text-gray-500 text-2xl mb-4">Belum ada penulis nih! 📭</p>
            <a href="{{ route('penulis.create') }}" class="text-emerald-600 hover:text-emerald-800 font-semibold text-lg hover:underline animate-pulse">
                Tambah penulis pertama ✨
            </a>
        </div>
        @endif
    </div>
</div>
@endsection