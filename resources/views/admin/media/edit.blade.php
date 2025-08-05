<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Media') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data="{ type: '{{ old('type', $medium->type) }}' }">
                    <form action="{{ route('admin.media.update', $medium) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                            <img src="{{ asset('storage/' . $medium->path) }}" alt="Gambar saat ini" class="mt-1 w-32 h-32 object-cover rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Media</label>
                            <select name="type" id="type" x-model="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="struktur" @selected(old('type', $medium->type) == 'struktur')>Struktur Organisasi</option>
                                <option value="galeri" @selected(old('type', 'galeri') == 'galeri')>Galeri Kegiatan</option>
                                <option value="artikel" @selected(old('type', $medium->type) == 'artikel')>Artikel</option>
                            </select>
                        </div>
                        
                        <div x-show="type === 'struktur'" class="space-y-4 p-4 border border-blue-200 rounded-md">
                            <h4 class="font-semibold">Detail Anggota</h4>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $medium->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                <input type="text" name="position" value="{{ old('position', $medium->position) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="text" name="nim" value="{{ old('nim', $medium->nim) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                             <div>
                                <label for="division" class="block text-sm font-medium text-gray-700">Divisi</label>
                                <select name="division" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="BPH" @selected(old('division', $medium->division) == 'BPH')>BPH</option>
                                    <option value="Internal" @selected(old('division', $medium->division) == 'Internal')>Internal</option>
                                    <option value="Eksternal" @selected(old('division', $medium->division) == 'Eksternal')>Eksternal</option>
                                    <option value="Kesma" @selected(old('division', $medium->division) == 'Kesma')>Kesma</option>
                                </select>
                            </div>
                            <div>
                                <label for="link_url" class="block text-sm font-medium text-gray-700">Link (Opsional)</label>
                                <input type="url" name="link_url" value="{{ old('link_url', $medium->link_url) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: https://linkedin.com/in/nama">
                                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ada.</p>
                            </div>
                        </div>

                        <div x-show="type === 'galeri'" class="p-4 border border-green-200 rounded-md">
                            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                            <input type="text" name="caption" value="{{ old('caption', $medium->caption) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.media.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>