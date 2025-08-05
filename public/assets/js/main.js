document.addEventListener('DOMContentLoaded', function() {
    // --- Sticky Header with Parallax Effect ---
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    }

    // --- Mobile Navigation Toggle ---
    const navToggle = document.querySelector('.nav-toggle');
    const navbar = document.querySelector('.navbar');
    
    if (navToggle && navbar) {
        navToggle.addEventListener('click', () => {
            const isNavActive = navbar.classList.toggle('active');
            navToggle.setAttribute('aria-expanded', isNavActive);
            
            // Toggle hamburger icon
            const icon = navToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars', !isNavActive);
                icon.classList.toggle('fa-times', isNavActive);
            }
        });
    }

    // --- Enhanced Dropdown Menu Logic ---
    // (Desktop Hover with Delay & Mobile Click with Submenu Handling)
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        let hoverTimeout;
        const link = dropdown.querySelector('a');
        
        // Desktop hover behavior
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
                }, 200);
            }
        };
        
        // Mobile click behavior
        const toggleDropdownMobile = (e) => {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                
                // Close other open dropdowns
                document.querySelectorAll('.dropdown.active').forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.classList.remove('active');
                    }
                });
                
                // Toggle current dropdown
                dropdown.classList.toggle('active');
            }
        };

        // Event listeners
        dropdown.addEventListener('mouseenter', openDropdown);
        dropdown.addEventListener('mouseleave', closeDropdown);
        link.addEventListener('click', toggleDropdownMobile);
    });

    // --- Set Active State for Navigation Links ---
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-list .nav-link').forEach(link => {
        const linkPage = link.getAttribute('href').split('/').pop();
        
        if (linkPage === currentPage) {
            link.classList.add('active');
            
            // Activate parent dropdown if exists
            const parentDropdown = link.closest('.dropdown');
            if (parentDropdown) {
                parentDropdown.querySelector('a.nav-link').classList.add('active');
            }
        }
    });

    // Close dropdowns when clicking outside (mobile view)
    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 992 && navbar.classList.contains('active')) {
            if (!e.target.closest('.navbar') && !e.target.closest('.nav-toggle')) {
                navbar.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
                
                const icon = navToggle.querySelector('i');
                if (icon) {
                    icon.classList.replace('fa-times', 'fa-bars');
                }
                
                // Close all dropdowns
                document.querySelectorAll('.dropdown.active').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        }
    });
});