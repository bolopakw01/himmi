// File: public/assets/js/gallery.js

document.addEventListener('DOMContentLoaded', () => {
    // --- Bagian Filter Galeri ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    let currentDivisiFilter = 'all';
    let currentAcaraFilter = 'all-event';

    if (filterButtons.length > 0 && galleryItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                const filterGroup = button.closest('.filter-group');
                if (!filterGroup) return;

                const buttonsInGroup = filterGroup.querySelectorAll('.filter-btn');
                buttonsInGroup.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const filterValue = button.dataset.filter;

                // Tentukan jenis filter berdasarkan data-attribute
                if (filterValue.includes('event') || filterValue === 'all-event') {
                    currentAcaraFilter = filterValue;
                } else {
                    currentDivisiFilter = filterValue;
                }

                // Jalankan fungsi untuk memfilter item
                applyFilters();
            });
        });

        function applyFilters() {
            galleryItems.forEach(item => {
                const itemDivisi = item.dataset.divisi || 'all';
                const itemAcara = item.dataset.acara || 'all-event';

                const divisiMatch = currentDivisiFilter === 'all' || itemDivisi === currentDivisiFilter;
                const acaraMatch = currentAcaraFilter === 'all-event' || itemAcara === currentAcaraFilter;
                
                if (divisiMatch && acaraMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    }


    // --- Bagian Lightbox ---
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const closeBtn = document.getElementById('close-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    
    if (lightbox) {
        let visibleItems = [];
        let currentIndex = 0;

        document.querySelectorAll('.gallery-img').forEach(img => {
            img.addEventListener('click', () => {
                // Update daftar item yang terlihat setiap kali gambar diklik
                visibleItems = Array.from(document.querySelectorAll('.gallery-item'))
                                   .filter(item => window.getComputedStyle(item).display !== 'none');
                
                const clickedItem = img.closest('.gallery-item');
                currentIndex = visibleItems.indexOf(clickedItem);

                if (currentIndex !== -1) {
                    updateLightbox();
                    lightbox.style.display = 'flex';
                }
            });
        });

        function updateLightbox() {
            if (visibleItems.length === 0 || currentIndex < 0) return;

            const currentItem = visibleItems[currentIndex];
            const currentImg = currentItem.querySelector('.gallery-img');
            const captionEl = currentItem.querySelector('.gallery-caption h3');
            
            lightboxImg.src = currentImg.src;
            if (captionEl) {
                lightboxCaption.textContent = captionEl.textContent;
            } else {
                lightboxCaption.textContent = '';
            }
        }

        // Event Listeners untuk Lightbox
        closeBtn.addEventListener('click', () => lightbox.style.display = 'none');
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + visibleItems.length) % visibleItems.length;
            updateLightbox();
        });
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % visibleItems.length;
            updateLightbox();
        });
        lightbox.addEventListener('click', e => {
            if (e.target === lightbox) {
                lightbox.style.display = 'none';
            }
        });
        document.addEventListener('keydown', e => {
            if (lightbox.style.display === 'flex') {
                if (e.key === 'Escape') closeBtn.click();
                if (e.key === 'ArrowLeft') prevBtn.click();
                if (e.key === 'ArrowRight') nextBtn.click();
            }
        });
    }
});