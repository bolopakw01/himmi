<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Galeri Album Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Judul Galeri</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="division" class="block text-sm font-medium text-gray-700">Penyelenggara (Divisi)</label>
                                    <select name="division" id="division" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        <option value="">-- Pilih Divisi --</option>
                                        <option value="BPH" @selected(old('division') == 'BPH')>BPH</option>
                                        <option value="Internal" @selected(old('division') == 'Internal')>Internal</option>
                                        <option value="Eksternal" @selected(old('division') == 'Eksternal')>Eksternal</option>
                                        <option value="Kesma" @selected(old('division') == 'Kesma')>Kesma</option>
                                    </select>
                                    @error('division')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="event_type" class="block text-sm font-medium text-gray-700">Jenis Acara</label>
                                    <select name="event_type" id="event_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Event" @selected(old('event_type') == 'Event')>Event</option>
                                        <option value="Non-Event" @selected(old('event_type') == 'Non-Event')>Non-Event</option>
                                        <option value="Kerja Sama" @selected(old('event_type') == 'Kerja Sama')>Kerja Sama</option>
                                    </select>
                                     @error('event_type')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="photos" class="block text-sm font-medium text-gray-700">Unggah Foto-foto (Bisa pilih lebih dari satu)</label>
                                <input type="file" name="photos[]" id="photos" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" multiple required>
                                <p class="text-xs text-gray-500 mt-1">Tahan Ctrl (atau Cmd di Mac) untuk memilih beberapa file gambar.</p>
                                @error('photos')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end pt-4">
                                <a href="{{ route('admin.galleries.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Simpan Galeri
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>