@extends('layouts.public')

@section('title', 'HIMMI - Universitas AMIKOM Yogyakarta')

@section('content')
<section class="hero">
    <div class="hero-content">
        <div class="hero-logos">
            <img src="{{ asset('assets/img/PRODI.png') }}" alt="Logo Prodi Manajemen Informatika">
            <img src="{{ asset('assets/img/HIMMI.png') }}" alt="Logo HIMMI">
            <img src="{{ asset('assets/img/AMIKOM.png') }}" alt="Logo Universitas AMIKOM">
        </div>
        <h2>Membangun Profesional IT Masa Depan</h2>
        <p>Bersama Himpunan Mahasiswa Manajemen Informatika (HIMMI), wujudkan potensi Anda melalui program
            inovatif, kolaborasi, dan pengembangan keahlian teknologi.</p>
        <div class="hero-buttons">
            <a href="{{ url('/program') }}" class="cta-btn">Jelajahi Program</a>
            <a href="{{ url('/profil') }}" class="cta-btn secondary">Kunjungi Profil</a>
        </div>
    </div>
</section>

<section class="section container" id="about-summary">
    <div class="about-content">
        <div class="about-image">
            <div class="image-swap">
                <img class="front" src="{{ asset('assets/img/team/1.png') }}" alt="Tim HIMMI Bekerja">
                <img class="back" src="{{ asset('assets/img/team/2.png') }}" alt="Tim HIMMI Berdiskusi">
            </div>
        </div>
        <div class="about-text">
            <h2 class="section-title-left">Selamat Datang di HIMMI AMIKOM</h2>
            <p>Himpunan Mahasiswa Manajemen Informatika (HIMMI) adalah organisasi kemahasiswaan resmi yang
                menjadi wadah tunggal bagi seluruh mahasiswa aktif program studi Diploma 3 (D3) Manajemen
                Informatika di Universitas Amikom Yogyakarta.</p>
            <p>Kami berfokus pada misi sebagai pusat kegiatan, advokasi, dan pengembangan keterampilan bagi
                mahasiswa, selaras dengan visi Universitas Amikom Yogyakarta sebagai "Creative Economy Park".
            </p>
            <a href="{{ url('/profil') }}" class="link-arrow">Pelajari Sejarah & Visi Kami <i
                    class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<section class="section program-summary-section" id="program-summary">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Program Unggulan</h2>
            <p class="section-subtitle">Beberapa inisiatif utama kami yang dirancang untuk Anda.</p>
        </div>
        <div class="program-summary-grid">
            <div class="summary-card">
                <div class="program-icon"><i class="fas fa-users"></i></div>
                <h3>Upgrading & Keakraban</h3>
                <p>Mempererat tali persaudaraan dan meningkatkan kualitas internal pengurus melalui kegiatan
                    yang inspiratif.</p>
            </div>
            <div class="summary-card">
                <div class="program-icon"><i class="fas fa-building"></i></div>
                <h3>Company Visit</h3>
                <p>Memberikan wawasan langsung mengenai dunia kerja, budaya perusahaan, dan proses bisnis di
                    industri IT.</p>
            </div>
            <div class="summary-card">
                <div class="program-icon"><i class="fas fa-comments"></i></div>
                <h3>HIMMI Talk</h3>
                <p>Menjadi jembatan komunikasi antara mahasiswa dan pihak program studi untuk membahas isu-isu
                    akademik.</p>
            </div>
        </div>
        <div class="section-cta">
            <a href="{{ url('/program') }}" class="cta-btn">Lihat Semua Program Kerja</a>
        </div>
    </div>
</section>

<section class="section gallery-summary-section" id="gallery-summary">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Galeri Kegiatan</h2>
            <p class="section-subtitle">Momen berharga dari berbagai kegiatan yang telah kami selenggarakan.</p>
        </div>

        {{-- Cek apakah ada galeri untuk ditampilkan --}}
        @if($latestGalleries->isNotEmpty())
            <div class="gallery-grid-summary">
                {{-- Loop melalui 4 galeri terbaru --}}
                @foreach ($latestGalleries as $gallery)
                    <a href="{{ route('galeri') }}" class="gallery-item-summary">
                        {{-- Tampilkan foto pertama dari setiap album --}}
                        <img src="{{ asset('storage/' . $gallery->photos->first()->path) }}" alt="{{ $gallery->title }}">
                        <div class="gallery-item-overlay">
                            {{-- <h3>{{ $gallery->title }}</h3> --}}
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="section-cta">
                <a href="{{ route('galeri') }}" class="cta-btn">Kunjungi Galeri Lengkap</a>
            </div>
        @else
            <div class="text-center text-gray-500">
                <p>Belum ada kegiatan yang didokumentasikan.</p>
            </div>
        @endif
    </div>
</section>
@endsection