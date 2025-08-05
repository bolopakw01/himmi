<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Unggah Media Baru') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data="{ type: '' }">
                    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">File Gambar</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full" required>
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Media</label>
                            <select name="type" id="type" x-model="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Tipe</option>
                                <option value="struktur">Struktur Organisasi</option>
                                <option value="galeri">Galeri Kegiatan</option>
                                <option value="artikel">Artikel</option>
                            </select>
                        </div>
                        
                        <div x-show="type === 'struktur'" class="space-y-4 p-4 border border-blue-200 rounded-md">
                             <h4 class="font-semibold">Detail Anggota (Struktur)</h4>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                <input type="text" name="position" id="position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="text" name="nim" id="nim" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                             <div>
                                <label for="division" class="block text-sm font-medium text-gray-700">Divisi</label>
                                <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Pilih Divisi</option>
                                    <option value="BPH">Badan Pengurus Harian (BPH)</option>
                                    <option value="Internal">Internal</option>
                                    <option value="Eksternal">Eksternal</option>
                                    <option value="Kesma">Kesejahteraan Mahasiswa (Kesma)</option>
                                </select>
                            </div>
                            <div>
                                <label for="link_url" class="block text-sm font-medium text-gray-700">Link Eksternal (Opsional)</label>
                                <input type="url" name="link_url" id="link_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: https://linkedin.com/in/nama">
                                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ada.</p>
                            </div>
                        </div>

                        <div x-show="type === 'galeri'" class="p-4 border border-green-200 rounded-md">
                            {{-- ... (form galeri tidak berubah) ... --}}
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.media.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan Media</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>