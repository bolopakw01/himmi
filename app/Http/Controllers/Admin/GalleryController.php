<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::withCount('photos')->latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi semua input dari form
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'division'    => 'required|string',
            'event_type'  => 'required|string',
            'photos'      => 'required|array',
            'photos.*'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Buat record galeri baru dengan data utama
        $gallery = Gallery::create($data);

        // 3. Loop melalui setiap file foto yang diunggah
        foreach ($request->file('photos') as $photo) {
            // Simpan file ke storage
            $path = $photo->store('galleries', 'public');
            // Buat record foto baru yang terhubung dengan galeri
            $gallery->photos()->create(['path' => $path]);
        }

        // 4. Kembali ke halaman daftar galeri dengan pesan sukses
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri baru berhasil dibuat.');
    }

    public function show(Gallery $gallery)
    {
        $gallery->load('photos');
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        // Jika hanya mengedit detail galeri (tanpa menambah foto)
        if (!$request->hasFile('photos')) {
            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'division'    => 'required|string',
                'event_type'  => 'required|string',
            ]);
            
            $gallery->update($data);
            return redirect()->route('admin.galleries.index')->with('success', 'Detail galeri berhasil diperbarui.');
        }

        // Jika ada foto baru yang diunggah
        $request->validate(['photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('galleries', 'public');
            $gallery->photos()->create(['path' => $path]);
        }
        return redirect()->route('admin.galleries.show', $gallery)->with('success', 'Foto baru berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function destroyPhoto(GalleryPhoto $photo)
    {
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}