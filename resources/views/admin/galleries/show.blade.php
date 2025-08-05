<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Kelola Galeri: <span class="text-blue-600">{{ $gallery->title }}</span>
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $gallery->division }} &middot; {{ $gallery->event_type }}
                </p>
            </div>
            <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-medium">
                &larr; Kembali ke Daftar Galeri
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Foto Baru ke Album Ini</h3>
                    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="photos" class="block text-sm font-medium text-gray-700">Pilih Foto (Bisa lebih dari satu)</label>
                            <input type="file" name="photos[]" id="photos" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" multiple required>
                            @error('photos.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                                Unggah Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Foto ({{ $gallery->photos->count() }})</h3>
                     <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @forelse ($gallery->photos as $photo)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $photo->path) }}" alt="Foto galeri" class="w-full h-40 object-cover rounded-md shadow-md">
                                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <form action="{{ route('admin.gallery-photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700" title="Hapus Foto">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                             <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">Belum ada foto di dalam album ini.</p>
                            </div>
                        @endforelse
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>