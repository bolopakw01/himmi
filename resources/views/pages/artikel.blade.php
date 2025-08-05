@extends('layouts.public')

@section('title', 'Artikel & Wawasan - HIMMI AMIKOM Yogyakarta')

@section('content')
<div class="page-header" id="artikel-page">
    <div class="container">
        <h1>Artikel & Wawasan</h1>
        <p>Jelajahi wawasan terbaru seputar dunia teknologi, pengembangan karir, dan kreativitas dari tim HIMMI.</p>
    </div>
</div>

<section class="section container" id="artikel-page">
    <div class="artikel-category" id="dev">
        <h2 class="division-title">Pengembangan IT</h2>
        <div class="artikel-grid">
            <a href="#" class="artikel-card">
                <span class="artikel-meta">Mobile Dev • 1 Agu 2025</span>
                <h4>5 Tren Terbaru dalam Pengembangan Aplikasi Mobile di Tahun 2025</h4>
                <p>Pelajari tren terkini yang akan membentuk masa depan pengembangan aplikasi mobile, dari AI-integration hingga cross-platform development.</p>
            </a>
            <a href="#" class="artikel-card">
                <span class="artikel-meta">Web Dev • 15 Jul 2025</span>
                <h4>Memahami Perbedaan Antara SSR, CSR, dan SSG untuk Website Modern</h4>
                <p>Kupas tuntas konsep rendering pada web development dan kapan waktu yang tepat untuk menggunakan masing-masing pendekatan.</p>
            </a>
            <a href="#" class="artikel-card">
                <span class="artikel-meta">Cyber Security • 1 Jul 2025</span>
                <h4>Langkah Awal Menjadi Ahli Keamanan Siber: Panduan untuk Pemula</h4>
                <p>Dunia siber penuh tantangan. Pelajari dasar-dasar keamanan siber dan jalur karir yang bisa Anda tempuh.</p>
            </a>
        </div>
    </div>

    <div class="artikel-category" id="karir">
        <h2 class="division-title">Karir & Tips</h2>
        <div class="artikel-grid">
            <a href="#" class="artikel-card">
                <span class="artikel-meta">Karir • 20 Jul 2025</span>
                <h4>Tips & Trik Membangun Portofolio Web Developer yang Dilirik Perusahaan</h4>
                <p>Langkah-langkah praktis untuk membuat portofolio yang menonjol di mata perekrut, dari pemilihan proyek hingga presentasi.</p>
            </a>
            <a href="#" class="artikel-card">
                <span class="artikel-meta">Mahasiswa • 5 Jul 2025</span>
                <h4>Manajemen Proyek untuk Mahasiswa IT: Cara Mengelola Tugas Akhir</h4>
                <p>Kiat efektif untuk merencanakan, mengeksekusi, dan mendokumentasikan proyek tugas akhir Anda dengan sukses menggunakan tools modern.</p>
            </a>
        </div>
    </div>
</section>
@endsection