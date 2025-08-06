document.addEventListener('DOMContentLoaded', function() {
    // --- 1. Efek Header saat di-scroll ---
    const header = document.querySelector('.header');
    if (header) {
        // Set initial state
        header.classList.toggle('scrolled', window.scrollY > 50);
        
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    }

    // --- 2. Fungsionalitas Menu Mobile (Toggle Burger) ---
    const navToggle = document.querySelector('.nav-toggle');
    const navbar = document.querySelector('.navbar');
    if (navToggle && navbar) {
        navToggle.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah event bubbling ke document
            const isNavActive = navbar.classList.toggle('active');
            navToggle.setAttribute('aria-expanded', isNavActive);
            
            const icon = navToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars', !isNavActive);
                icon.classList.toggle('fa-times', isNavActive);
            }
            
            // Tutup semua dropdown saat mobile menu ditutup
            if (!isNavActive) {
                document.querySelectorAll('.nav-item.dropdown.active').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        });
    }

    // --- 3. Logika Dropdown yang Disempurnakan (Hover & Klik) ---
    document.querySelectorAll('.nav-item.dropdown').forEach(dropdown => {
        const link = dropdown.querySelector('a.nav-link');
        let hoverTimeout;

        // --- A. Logika Hover untuk Desktop ---
        if (window.innerWidth > 992) {
            dropdown.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimeout);
                dropdown.classList.add('active');
            });

            dropdown.addEventListener('mouseleave', () => {
                hoverTimeout = setTimeout(() => {
                    if (!dropdown.matches(':hover')) {
                        dropdown.classList.remove('active');
                    }
                }, 200);
            });
        }

        // --- B. Logika untuk KLIK ---
        link.addEventListener('click', (e) => {
            // Cek jika ini tampilan mobile atau desktop
            if (window.innerWidth <= 992) { // Perilaku untuk Mobile
                e.preventDefault();
                e.stopPropagation();
                
                // Tutup dropdown lainnya sebelum membuka yang baru
                document.querySelectorAll('.nav-item.dropdown').forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.classList.remove('active');
                    }
                });
                
                dropdown.classList.toggle('active');
            } else { // Perilaku untuk Desktop
                e.preventDefault();
                e.stopPropagation();
                const wasActive = dropdown.classList.contains('active');
                
                // Tutup semua dropdown lain terlebih dahulu
                document.querySelectorAll('.nav-item.dropdown').forEach(d => {
                    if (d !== dropdown) {
                        d.classList.remove('active');
                    }
                });
                
                // Jika yang diklik tadi belum aktif, aktifkan sekarang
                if (!wasActive) {
                    dropdown.classList.add('active');
                }
            }
        });
    });

    // --- 4. Menutup Dropdown Saat Klik di Luar Area ---
    document.addEventListener('click', (e) => {
        // Untuk desktop
        if (window.innerWidth > 992) {
            const openDropdown = document.querySelector('.nav-item.dropdown.active');
            if (openDropdown && !openDropdown.contains(e.target)) {
                openDropdown.classList.remove('active');
            }
        }
        // Untuk mobile
        else {
            const navbarActive = navbar && navbar.classList.contains('active');
            if (navbarActive && !e.target.closest('.navbar') && !e.target.closest('.nav-toggle')) {
                navbar.classList.remove('active');
                if (navToggle) {
                    navToggle.setAttribute('aria-expanded', 'false');
                    const icon = navToggle.querySelector('i');
                    if (icon) {
                        icon.classList.replace('fa-times', 'fa-bars');
                    }
                }
                // Tutup semua dropdown
                document.querySelectorAll('.nav-item.dropdown.active').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        }
    });

    // --- 5. Handle Window Resize ---
    window.addEventListener('resize', () => {
        // Jika beralih dari mobile ke desktop, pastikan navbar tidak tetap aktif
        if (window.innerWidth > 992 && navbar && navbar.classList.contains('active')) {
            navbar.classList.remove('active');
            if (navToggle) {
                navToggle.setAttribute('aria-expanded', 'false');
                const icon = navToggle.querySelector('i');
                if (icon) {
                    icon.classList.replace('fa-times', 'fa-bars');
                }
            }
        }
        
        // Tutup semua dropdown saat resize
        document.querySelectorAll('.nav-item.dropdown.active').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    });
});