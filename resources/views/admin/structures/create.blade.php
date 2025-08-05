<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Anggota Struktur Baru') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.structures.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="struktur">
                        <div class="space-y-6">
                            {{-- Input Foto Anggota --}}
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Foto Anggota</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full" required>
                                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            
                            {{-- Input Nama Lengkap --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            
                            {{-- ... (Tambahkan @error untuk setiap input: position, nim, division, link_url) ... --}}
                            
                            <div class="flex items-center justify-end pt-4 border-t mt-6">
                                <a href="{{ route('admin.structures.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                                <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Simpan Anggota</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>