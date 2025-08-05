<?php
// File: app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use App\Models\Media;

class PageController extends Controller
{
    public function home()
    {return view('pages.home');}
    public function profil()
    {return view('pages.profil');}
    public function program()
    {return view('pages.program');}

    public function struktur()
    {
        $allMembers = Media::where('type', 'struktur')
            ->orderBy('id', 'asc')->get();

        $groupedMembers = $allMembers->groupBy('division');
        $divisionOrder  = ['BPH', 'Internal', 'Eksternal', 'Kesma'];
        return view('pages.struktur', compact('groupedMembers', 'divisionOrder'));
    }

    public function galeri()
    {
        $galeriItems = Media::where('type', 'galeri')
            ->where('is_active', true)
            ->latest()->get();
        return view('pages.galeri', compact('galeriItems'));
    }

    public function artikel()
    {return view('pages.artikel');}

    public function kontak()
    {return view('pages.kontak');}
}
