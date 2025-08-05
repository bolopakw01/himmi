<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Detail Galeri</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Form untuk title, description, division, event_type --}}
                    {{-- Sama seperti form create, tapi dengan value="{{ old('field', $gallery->field) }}" --}}
                    <div class="flex justify-end mt-6 pt-4 border-t">
                        <a href="{{ route('admin.galleries.index') }}" class="mr-4">Batal</a>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>