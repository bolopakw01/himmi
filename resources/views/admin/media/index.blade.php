{{-- File: resources/views/admin/media/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Media') }}
            </h2>
            <a href="{{ route('admin.media.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                + Unggah Media Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12" x-data="{ tab: 'struktur' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
            @endif

            <div class="mb-4 border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#" @click.prevent="tab = 'struktur'" :class="{ 'border-blue-500 text-blue-600': tab === 'struktur', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'struktur' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Struktur Organisasi</a>
                    <a href="#" @click.prevent="tab = 'galeri'" :class="{ 'border-blue-500 text-blue-600': tab === 'galeri', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'galeri' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Galeri</a>
                    <a href="#" @click.prevent="tab = 'artikel'" :class="{ 'border-blue-500 text-blue-600': tab === 'artikel', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'artikel' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Artikel</a>
                </nav>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div x-show="tab === 'struktur'" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse ($strukturItems as $item)
                            <div class="border rounded-lg p-2 text-center relative">
                                <img src="{{ asset('storage/' . $item->path) }}" class="w-full h-40 object-cover mb-2 rounded @if(!$item->is_active) filter grayscale @endif">
                                <p class="text-sm font-bold">{{ $item->name ?? 'N/A' }}</p>
                                <p class="text-xs">{{ $item->position ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500">NIM: {{ $item->nim ?? 'N/A' }}</p>
                                <div class="mt-2 flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.media.edit', $item) }}" class="text-xs text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">@csrf @method('DELETE')<button type="submit" class="text-xs text-red-500 hover:underline">Hapus</button></form>
                                    <form action="{{ route('admin.media.toggleStatus', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs {{ $item->is_active ? 'text-yellow-500' : 'text-green-500' }} hover:underline">
                                            {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada media untuk 'Struktur Organisasi'.</p>
                        @endforelse
                    </div>

                    <div x-show="tab === 'galeri'" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse ($galeriItems as $item)
                            <div class="border rounded-lg p-2 text-center relative">
                                <img src="{{ asset('storage/' . $item->path) }}" class="w-full h-32 object-cover mb-2 rounded @if(!$item->is_active) filter grayscale @endif">
                                <p class="text-sm font-semibold">{{ $item->caption ?? 'Tanpa Caption' }}</p>
                                <div class="mt-2 flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.media.edit', $item) }}" class="text-xs text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">@csrf @method('DELETE')<button type="submit" class="text-xs text-red-500 hover:underline">Hapus</button></form>
                                    <form action="{{ route('admin.media.toggleStatus', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs {{ $item->is_active ? 'text-yellow-500' : 'text-green-500' }} hover:underline">
                                            {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada media untuk 'Galeri'.</p>
                        @endforelse
                    </div>

                    <div x-show="tab === 'artikel'">
                        <p>Konten untuk Artikel akan ditampilkan di sini.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>