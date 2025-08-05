<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manajemen Anggota Struktur') }}</h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm">&larr; Kembali ke Dasbor</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.structures.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">+ Tambah Anggota Baru</a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse ($strukturItems as $item)
                            <div class="border rounded-lg p-2 text-center relative">
                                <img src="{{ asset('storage/' . $item->path) }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-full h-40 object-cover mb-2 rounded {{ !$item->is_active ? 'filter grayscale' : '' }}">
                                
                                <p class="text-sm font-bold">{{ $item->name ?? 'N/A' }}</p>
                                <p class="text-xs">{{ $item->position ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500">NIM: {{ $item->nim ?? 'N/A' }}</p>
                                <div class="mt-2 flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.structures.edit', $item) }}" class="text-xs text-blue-500 hover:underline">Edit</a>
                                    
                                    <form action="{{ route('admin.structures.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs text-red-500 hover:underline">Hapus</button>
                                    </form>

                                    <form action="{{ route('admin.structures.toggleStatus', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs {{ $item->is_active ? 'text-yellow-500' : 'text-green-500' }} hover:underline">
                                            {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-4 text-center text-gray-500 py-4">Belum ada anggota yang ditambahkan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>