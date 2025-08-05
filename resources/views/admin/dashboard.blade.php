
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
                    {{ __("Anda berhasil login!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Manajemen Konten</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <div class="p-4 border rounded-lg">
                            <h4 class="font-bold text-md mb-2">Manajemen Klien</h4>
                            <p class="text-sm text-gray-600 mb-3">Tambah, edit, atau hapus data klien dan mitra.</p>
                            <a href="{{ route('admin.clients.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Kelola Klien
                            </a>
                        </div>

                        <div class="p-4 border rounded-lg">
                            <h4 class="font-bold text-md mb-2">Manajemen Media (Gambar)</h4>
                            <p class="text-sm text-gray-600 mb-3">Unggah dan hapus foto untuk galeri dan struktur organisasi.</p>
                            <a href="{{ route('admin.media.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Kelola Media
                            </a>
                        </div>

                        <div class="p-4 border rounded-lg bg-gray-50">
                            <h4 class="font-bold text-md mb-2">Manajemen Artikel</h4>
                            <p class="text-sm text-gray-600 mb-3">Buat dan kelola artikel untuk halaman wawasan.</p>
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-400 cursor-not-allowed">
                                Segera Hadir
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>