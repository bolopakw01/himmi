document.addEventListener('DOMContentLoaded', () => {
    // --- Inisialisasi Elemen ---
    const galleryGrid = document.querySelector('.gallery-grid');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const lightbox = document.getElementById('lightbox');

    if (!galleryGrid || !lightbox) return;

    // Inisialisasi Elemen Lightbox
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxLoading = document.querySelector('.lightbox-loading');
    const closeBtn = document.getElementById('close-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    // --- State Management ---
    let filterState = {
        divisi: 'all',
        acara: 'all-event',
    };
    // Variabel khusus untuk lightbox
    let lightboxItems = [];
    let currentIndex = 0;

    // --- Fungsi Filter ---
    const applyFilters = () => {
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            const isDivisiMatch = filterState.divisi === 'all' || item.dataset.divisi === filterState.divisi;
            const isAcaraMatch = filterState.acara === 'all-event' || item.dataset.acara === filterState.acara;
            item.style.display = (isDivisiMatch && isAcaraMatch) ? 'block' : 'none';
        });
    };

    filterButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const groupElement = button.closest('.filter-group');
            filterState[groupElement.dataset.group] = button.dataset.filter;
            groupElement.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            applyFilters();
        });
    });

    // --- PERBAIKAN UTAMA: Logika Lightbox ---
    const updateLightbox = () => {
        // Tampilkan/sembunyikan tombol navigasi
        const showNav = lightboxItems.length > 1;
        prevBtn.style.display = showNav ? 'flex' : 'none';
        nextBtn.style.display = showNav ? 'flex' : 'none';
        
        const currentPhoto = lightboxItems[currentIndex];
        
        lightboxLoading.style.display = 'block';
        lightboxImg.style.opacity = 0;

        const highResImg = new Image();
        highResImg.src = currentPhoto.path;
        highResImg.onload = () => {
            lightboxImg.src = highResImg.src;
            lightboxCaption.textContent = currentPhoto.caption;
            lightboxLoading.style.display = 'none';
            lightboxImg.style.opacity = 1;
        };
    };

    const openLightbox = (clickedItem) => {
        // Ambil data foto dari atribut data-photos
        lightboxItems = JSON.parse(clickedItem.dataset.photos);
        currentIndex = 0; // Selalu mulai dari gambar pertama (cover)
        
        if (lightboxItems.length > 0) {
            document.body.style.overflow = 'hidden';
            updateLightbox();
            lightbox.style.display = 'flex';
        }
    };

    const closeLightbox = () => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    };

    const showPrevImage = () => {
        currentIndex = (currentIndex - 1 + lightboxItems.length) % lightboxItems.length;
        updateLightbox();
    };

    const showNextImage = () => {
        currentIndex = (currentIndex + 1) % lightboxItems.length;
        updateLightbox();
    };

    // Event Delegation untuk membuka lightbox
    galleryGrid.addEventListener('click', (e) => {
        const galleryItem = e.target.closest('.gallery-item');
        if (galleryItem) {
            openLightbox(galleryItem);
        }
    });

    closeBtn.addEventListener('click', closeLightbox);
    prevBtn.addEventListener('click', showPrevImage);
    nextBtn.addEventListener('click', showNextImage);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', (e) => {
        if (lightbox.style.display === 'flex') {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') showPrevImage();
            if (e.key === 'ArrowRight') showNextImage();
        }
    });
    
    // Inisialisasi tinggi grid untuk mencegah "lompat"
    setTimeout(() => {
        galleryGrid.style.minHeight = `${galleryGrid.offsetHeight}px`;
    }, 500);
});