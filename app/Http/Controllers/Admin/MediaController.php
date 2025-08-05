<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Menampilkan halaman utama manajemen media dengan data yang dikelompokkan.
     */
    public function index()
    {
        $mediaItemsByType = Media::latest()->get()->groupBy('type');

        $strukturItems = $mediaItemsByType->get('struktur', collect());
        $galeriItems = $mediaItemsByType->get('galeri', collect());
        $artikelItems = $mediaItemsByType->get('artikel', collect());

        return view('admin.media.index', compact('strukturItems', 'galeriItems', 'artikelItems'));
    }

    /**
     * Menampilkan form untuk membuat media baru.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Menyimpan media baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string|in:struktur,galeri,artikel',
            'name' => 'required_if:type,struktur|nullable|string|max:255',
            'position' => 'required_if:type,struktur|nullable|string|max:255',
            'nim' => 'required_if:type,struktur|nullable|string|max:255',
            'division' => 'required_if:type,struktur|nullable|string|max:255',
            'caption' => 'required_if:type,galeri|nullable|string|max:255',
            'link_url' => 'nullable|url|max:255',
        ]);

        $data['path'] = $request->file('image')->store('media', 'public');
        
        Media::create($data);

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil diunggah.');
    }

    /**
     * Menampilkan form untuk mengedit media yang ada.
     */
    public function edit(Media $medium)
    {
        return view('admin.media.edit', ['medium' => $medium]);
    }

    /**
     * Memperbarui media yang ada di database.
     */
    public function update(Request $request, Media $medium)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'type' => 'required|string|in:struktur,galeri,artikel',
            'name' => 'required_if:type,struktur|nullable|string|max:255',
            'position' => 'required_if:type,struktur|nullable|string|max:255',
            'nim' => 'required_if:type,struktur|nullable|string|max:255',
            'division' => 'required_if:type,struktur|nullable|string|max:255',
            'caption' => 'required_if:type,galeri|nullable|string|max:255',
            'link_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($medium->path);
            $data['path'] = $request->file('image')->store('media', 'public');
        }

        $medium->update($data);

        return redirect()->route('admin.media.index')->with('success', 'Data media berhasil diperbarui.');
    }

    /**
     * Mengubah status aktif/nonaktif dari sebuah media.
     */
    public function toggleStatus(Media $medium)
    {
        $medium->is_active = !$medium->is_active;
        $medium->save();
        
        $status = $medium->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Media berhasil {$status}.");
    }

    /**
     * Menghapus media dari database dan storage.
     */
    public function destroy(Media $medium)
    {
        Storage::disk('public')->delete($medium->path);
        
        $medium->delete();

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil dihapus.');
    }
}