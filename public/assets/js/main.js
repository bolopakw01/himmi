document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.header');
    const navToggle = document.querySelector('.nav-toggle');
    const navbar = document.querySelector('.navbar');

    // --- Sticky Header (Optional) ---
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // --- Mobile Navigation Toggle ---
    if (navToggle && navbar) {
        navToggle.addEventListener('click', () => {
            const isNavActive = navbar.classList.toggle('active');
            navToggle.setAttribute('aria-expanded', isNavActive);
            const icon = navToggle.querySelector('i');
            if (isNavActive) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });
    }
    
    // --- Dropdown Menu Logic (Desktop Hover with Delay & Mobile Click) ---
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        let hoverTimeout;
        const link = dropdown.querySelector('a');
        
        const openDropdown = () => {
            if (window.innerWidth > 992) {
                clearTimeout(hoverTimeout);
                dropdown.classList.add('active');
            }
        };

        const closeDropdown = () => {
             if (window.innerWidth > 992) {
                hoverTimeout = setTimeout(() => {
                    dropdown.classList.remove('active');
                }, 200); // 200ms delay before closing
            }
        };
        
        const toggleDropdownMobile = (e) => {
            if (window.innerWidth <= 992) {
                // Prevent link navigation only if it's the main dropdown link
                if (e.currentTarget === link) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            }
        };

        dropdown.addEventListener('mouseenter', openDropdown);
        dropdown.addEventListener('mouseleave', closeDropdown);
        link.addEventListener('click', toggleDropdownMobile);
    });


    // --- Set Active State for Multi-Page Nav Links ---
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-list .nav-link');
    
    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href').split('/').pop();

        if (linkPage === currentPage) {
            link.classList.add('active');

            // Also activate parent dropdown if it's a dropdown item
            const parentDropdown = link.closest('.dropdown');
            if (parentDropdown) {
                parentDropdown.querySelector('a.nav-link').classList.add('active');
            }
        }
    });
});