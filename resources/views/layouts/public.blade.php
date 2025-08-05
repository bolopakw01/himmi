<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HIMMI - Universitas AMIKOM Yogyakarta')</title>
    <link rel="Icon" type="image/png" href="{{ asset('assets/img/ICON.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <header class="header">
        <div class="header-container container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets/img/LOGO.png') }}" alt="HIMMI Logo">
                <div class="logo-text">
                    <h1>HIMMI</h1>
                    <p>UNIVERSITAS AMIKOM YOGYAKARTA</p>
                </div>
            </a>
            <nav class="navbar">
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('profil') }}" class="nav-link">Profil</a></li>
                    <li class="nav-item"><a href="{{ route('program') }}" class="nav-link">Program Kerja</a></li>
                    <li class="nav-item"><a href="{{ route('struktur') }}" class="nav-link">Struktur</a></li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('artikel') }}" class="nav-link">Artikel <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('artikel') }}#dev">Pengembangan IT</a></li>
                            <li><a href="{{ route('artikel') }}#karir">Karir & Tips</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('galeri') }}" class="nav-link">Galeri</a></li>
                    <li class="nav-item"><a href="{{ route('klien.index') }}" class="nav-link">Klien Kami</a></li>
                    <li class="nav-item"><a href="{{ route('kontak') }}" class="nav-link">Kontak</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button class="nav-toggle" aria-label="Buka menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                 <div class="footer-column">
                    <h3>Tentang HIMMI</h3>
                    <p>Himpunan Mahasiswa D3 Manajemen Informatika Universitas AMIKOM Yogyakarta. Berkomitmen untuk inovasi dan kolaborasi.</p>
                </div>
                <div class="footer-column">
                    <h3>Navigasi</h3>
                    <ul>
                        <li><a href="{{ route('profil') }}">Profil</a></li>
                        <li><a href="{{ route('program') }}">Program Kerja</a></li>
                        <li><a href="{{ route('struktur') }}">Struktur</a></li>
                        <li><a href="{{ route('artikel') }}">Artikel</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Gedung Unit 5, Univ. AMIKOM</li>
                        <li><i class="fas fa-envelope"></i> himmi@amikom.ac.id</li>
                        <li>
                            <div class="social-links">
                                <a href="https://instagram.com/himmi.amikom" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 HIMMI AMIKOM Yogyakarta. Didesain oleh (Nama Anda).</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>