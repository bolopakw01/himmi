<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Media;
// Pastikan Client di-import

class PageController extends Controller
{
    /**
     * Menampilkan halaman utama (Home).
     */
    public function home()
    {
        $latestGalleries = Gallery::with('photos')
            ->where('is_active', true)
            ->whereHas('photos')
            ->latest()
            ->take(4)
            ->get();

        return view('pages.home', compact('latestGalleries'));
    }

    /**
     * Menampilkan halaman Profil.
     */
    public function profil()
    {
        return view('pages.profil');
    }

    /**
     * Menampilkan halaman Program Kerja.
     */
    public function program()
    {
        return view('pages.program');
    }

    /**
     * Menampilkan halaman Struktur Organisasi.
     */
    public function struktur()
    {
        $allMembers = Media::where('type', 'struktur')
            ->orderBy('id', 'asc')->get();

        $groupedMembers = $allMembers->groupBy('division');
        $divisionOrder  = ['BPH', 'Internal', 'Eksternal', 'Kesma'];
        return view('pages.struktur', compact('groupedMembers', 'divisionOrder'));
    }

 public function artikel()
{
    $articles = \App\Models\Article::where('is_active', true)
                       ->latest('published_at')
                       ->paginate(6);
                       
    return view('pages.artikel', compact('articles'));
}
    
    // --- METODE BARU UNTUK MENAMPILKAN DETAIL ARTIKEL ---
    public function showArticle(Article $article)
    {
        // Ambil juga artikel terbaru lainnya untuk sidebar "Baca Juga"
        $latestArticles = Article::where('is_active', true)
                                   ->where('id', '!=', $article->id) // kecuali artikel yang sedang dibaca
                                   ->latest('published_at')
                                   ->take(4)
                                   ->get();

        return view('pages.article-detail', compact('article', 'latestArticles'));
    }

    /**
     * Menampilkan halaman Galeri.
     */
    public function galeri()
    {
        $galleries = Gallery::with('photos')
            ->where('is_active', true)
            ->whereHas('photos')
            ->latest()
            ->get();
        return view('pages.galeri', compact('galleries'));
    }

    /**
     * Menampilkan halaman Kontak.
     */
    public function kontak()
    {
        return view('pages.kontak');
    }

    /**
     * Menampilkan halaman Klien (fungsi ini mungkin ada di ClientController,
     * tapi untuk kelengkapan, saya letakkan di sini juga jika dipindahkan).
     * Jika Anda menggunakan ClientController, baris ini tidak diperlukan.
     */
    public function klien()
    {
        $clients = Client::latest()->get();
        return view('pages.client', compact('clients'));
    }
}
