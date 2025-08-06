<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Pastikan Str di-import untuk membuat slug

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar semua artikel.
     */
    public function index()
    {
        $articles = Article::latest('published_at')->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $data['author'] = $data['author'] ?? auth()->user()->name;
        $data['published_at'] = now();
        $data['slug'] = Str::slug($data['title']); // Membuat slug saat artikel baru dibuat

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diterbitkan.');
    }

    /**
     * Menampilkan form untuk mengedit artikel.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Memperbarui artikel yang ada di database.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'nullable|string|max:255',
        ]);

        // Cek jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            // Simpan gambar baru
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        // Buat ulang slug jika judul berubah
        $data['slug'] = Str::slug($data['title']);

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel dari database.
     */
    public function destroy(Article $article)
    {
        // Hapus gambar sampul dari storage jika ada
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }
        // Hapus record artikel dari database
        $article->delete();
        
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}