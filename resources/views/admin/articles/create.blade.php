<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tulis Artikel Baru') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Isi Konten</label>
                                <textarea name="content" id="content" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('content') }}</textarea>
                                @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="author" class="block text-sm font-medium text-gray-700">Nama Penulis (opsional)</label>
                                    <input type="text" name="author" id="author" value="{{ old('author', auth()->user()->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    @error('author')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags (pisahkan dengan koma)</label>
                                    <input type="text" name="tags" id="tags" value="{{ old('tags') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: Web Dev, Karir">
                                    @error('tags')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Sampul (opsional)</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex items-center justify-end pt-4 border-t mt-6">
                                <a href="{{ route('admin.articles.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md">Terbitkan Artikel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>