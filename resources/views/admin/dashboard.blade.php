<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dasbor Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Manajemen Konten Website</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <div class="p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <h4 class="font-bold text-md">Manajemen Struktur</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Kelola data anggota pengurus untuk halaman struktur organisasi.</p>
                            <a href="{{ route('admin.structures.index') }}" class="font-semibold text-sm text-green-600 hover:underline">
                                Kelola Anggota &rarr;
                            </a>
                        </div>

                        <div class="p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <h4 class="font-bold text-md">Manajemen Galeri</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Buat & kelola album kegiatan yang berisi banyak foto dan filter.</p>
                            <a href="{{ route('admin.galleries.index') }}" class="font-semibold text-sm text-blue-600 hover:underline">
                                Kelola Album Galeri &rarr;
                            </a>
                        </div>

                        <div class="p-4 border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                             <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <h4 class="font-bold text-md">Manajemen Artikel</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Tulis, edit, dan terbitkan artikel untuk halaman wawasan dan berita.</p>
                            <a href="{{ route('admin.articles.index') }}" class="font-semibold text-sm text-red-600 hover:underline">
                                Kelola Artikel &rarr;
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>