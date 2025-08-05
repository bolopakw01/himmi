@extends('layouts.public')

@section('title', 'Profil - HIMMI AMIKOM Yogyakarta')

@section('content')
<div class="page-header" id="profil-page">
    <div class="container">
        <h1>Profil HIMMI</h1>
        <p>Mengenal lebih dekat landasan, tujuan, dan perjalanan kami.</p>
    </div>
</div>

<section class="section container" id="about-full">
    <div class="about-content">
        <div class="about-image">
            <div class="image-swap">
                <img class="front" src="{{ asset('assets/img/team/1.png') }}" alt="Tim HIMMI Bekerja">
                <img class="back" src="{{ asset('assets/img/team/2.png') }}" alt="Tim HIMMI Berdiskusi">
            </div>
        </div>
        <div class="about-text">
            <h2 class="section-title-left">Tentang Kami</h2>
            <p>Himpunan Mahasiswa Manajemen Informatika (HIMMI) adalah organisasi kemahasiswaan resmi yang menjadi wadah
                tunggal bagi seluruh mahasiswa aktif program studi Diploma 3 (D3) Manajemen Informatika di Universitas
                Amikom Yogyakarta.</p>
            <p>Kami berkomitmen untuk merancang program kerja yang relevan dan tepat sasaran sesuai kebutuhan unik para
                anggota, selaras dengan visi Universitas Amikom Yogyakarta sebagai "Creative Economy Park".</p>
        </div>
    </div>
</section>

<section class="section visi-misi-section" id="visi-misi">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Visi & Misi</h2>
        </div>
        <div class="visi-misi-grid">
            <div class="vision-box">
                <h3><i class="fas fa-bullseye"></i> Visi Kami</h3>
                <p>Menjadikan HIMMI sebagai himpunan mahasiswa yang solid, inovatif, dan proaktif dalam mewadahi
                    aspirasi, mengembangkan potensi, serta membangun jaringan profesional bagi mahasiswa D3 Manajemen
                    Informatika untuk mewujudkan lulusan yang kompeten dan berdaya saing tinggi.</p>
            </div>
            <div class="mission-box">
                <h3><i class="fas fa-tasks"></i> Misi Kami</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i>Menyelenggarakan kegiatan pengembangan hard-skill dan
                        soft-skill.</li>
                    <li><i class="fas fa-check-circle"></i>Membangun solidaritas dan lingkungan yang suportif bagi
                        anggota.</li>
                    <li><i class="fas fa-check-circle"></i>Menjalin kemitraan strategis dengan industri dan alumni.</li>
                    <li><i class="fas fa-check-circle"></i>Menjadi jembatan komunikasi yang efektif antara mahasiswa dan
                        prodi.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section container" id="timeline">
    <div class="section-header">
        <h2 class="section-title">Perjalanan HIMMI</h2>
    </div>
    <div class="timeline-horizontal-container">
        <div class="timeline-event">
            <div class="timeline-icon"><i class="fas fa-flag"></i></div>
            <div class="timeline-details">
                <span class="timeline-year">1997</span>
                <h3>Kelahiran Sang Perintis</h3>
                <p>HIMMI didirikan sebagai salah satu organisasi mahasiswa perintis di Universitas Amikom Yogyakarta.
                </p>
            </div>
        </div>
        <div class="timeline-event">
            <div class="timeline-icon"><i class="fas fa-users"></i></div>
            <div class="timeline-details">
                <span class="timeline-year">Era Transisi</span>
                <h3>Fase Sinergi & Kolaborasi</h3>
                <p>HIMMI bergabung dengan Himpunan Mahasiswa Sistem Informasi, membentuk HIMMSI.</p>
            </div>
        </div>
        <div class="timeline-event">
            <div class="timeline-icon"><i class="fas fa-code-branch"></i></div>
            <div class="timeline-details">
                <span class="timeline-year">2022</span>
                <h3>Fokus Baru, Semangat Baru</h3>
                <p>HIMMSI direstrukturisasi kembali, memungkinkan HIMMI merancang program yang lebih relevan bagi D3 MI.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection