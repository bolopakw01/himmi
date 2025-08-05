<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Gallery; // <-- TAMBAHKAN BARIS INI

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function program()
    {
        return view('pages.program');
    }

    public function struktur()
    {
        // Ambil semua anggota (aktif dan non-aktif)
        $allMembers = Media::where('type', 'struktur')
            ->orderBy('id', 'asc')->get();

        $groupedMembers = $allMembers->groupBy('division');
        $divisionOrder  = ['BPH', 'Internal', 'Eksternal', 'Kesma'];
        return view('pages.struktur', compact('groupedMembers', 'divisionOrder'));
    }

    public function galeri()
    {
        // Ambil semua galeri aktif beserta foto-fotonya
        $galleries = Gallery::with('photos')->where('is_active', true)->latest()->get();
        return view('pages.galeri', compact('galleries'));
    }

    public function artikel()
    {
        return view('pages.artikel');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
}