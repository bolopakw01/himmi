<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota: ') }} {{ $structure->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    {{-- Form menunjuk ke route 'update' dengan method 'PUT' --}}
                    <form action="{{ route('admin.structures.update', $structure) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                                <img src="{{ asset('storage/' . $structure->path) }}" alt="{{ $structure->name }}" class="mt-1 w-32 h-32 object-cover rounded-md border">
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Ganti Foto (Opsional)</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <hr>

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $structure->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                <input type="text" name="position" id="position" value="{{ old('position', $structure->position) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('position')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="text" name="nim" id="nim" value="{{ old('nim', $structure->nim) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('nim')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="division" class="block text-sm font-medium text-gray-700">Divisi</label>
                                <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="BPH" @selected(old('division', $structure->division) == 'BPH')>BPH</option>
                                    <option value="Internal" @selected(old('division', $structure->division) == 'Internal')>Internal</option>
                                    <option value="Eksternal" @selected(old('division', $structure->division) == 'Eksternal')>Eksternal</option>
                                    <option value="Kesma" @selected(old('division', $structure->division) == 'Kesma')>Kesma</option>
                                </select>
                                @error('division')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="link_url" class="block text-sm font-medium text-gray-700">Link Eksternal (Opsional)</label>
                                <input type="url" name="link_url" id="link_url" value="{{ old('link_url', $structure->link_url) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: https://linkedin.com/in/nama">
                                @error('link_url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            
                            <div class="flex items-center justify-end pt-4 border-t mt-6">
                                <a href="{{ route('admin.structures.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>