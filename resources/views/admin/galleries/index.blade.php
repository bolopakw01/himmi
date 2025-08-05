<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Galeri') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-medium">
                &larr; Kembali ke Dasbor
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Buat Galeri Baru
                </a>
            </div>

            {{-- Container untuk daftar galeri --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($galleries as $gallery)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        {{-- Gambar Sampul --}}
                        <div class="h-48 bg-gray-200">
                            @if ($gallery->photos->isNotEmpty())
                                <img src="{{ asset('storage/' . $gallery->photos->first()->path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Detail Galeri --}}
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $gallery->title }}</h3>
                                <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $gallery->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 line-clamp-2">{{ $gallery->description ?? 'Tidak ada deskripsi.' }}</p>
                            
                            <div class="text-xs text-gray-500 mt-3">
                                <span>{{ $gallery->photos_count }} Foto</span> &middot;
                                <span>{{ $gallery->division }}</span> &middot;
                                <span>{{ $gallery->event_type }}</span>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="p-4 bg-gray-50 border-t flex justify-end items-center space-x-2">
                            <a href="{{ route('admin.galleries.show', $gallery) }}" class="text-sm text-blue-600 font-semibold hover:underline">Lihat & Kelola Foto</a>
                            {{-- <a href="{{ route('admin.galleries.edit', $gallery) }}" class="text-sm text-gray-600 hover:underline">Edit</a> --}}
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus galeri ini beserta semua fotonya?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500">Belum ada galeri yang dibuat.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>