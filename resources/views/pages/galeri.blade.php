@extends('layouts.public')

@section('title', 'Galeri - HIMMI AMIKOM Yogyakarta')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
@endpush

@section('content')
    <header class="gallery-header">
        <h1>Galeri Kegiatan HIMMI</h1>
        <p>Dokumentasi momen-momen berharga dari berbagai kegiatan yang telah kami selenggarakan.</p>
    </header>

    <div class="filter-container">
        <div class="filter-group" data-group="divisi">
            <h3>Filter Berdasarkan Divisi:</h3>
            <button class="filter-btn active" data-filter="all">Semua Divisi</button>
            <button class="filter-btn" data-filter="bph">BPH</button>
            <button class="filter-btn" data-filter="internal">Internal</button>
            <button class="filter-btn" data-filter="eksternal">Eksternal</button>
            <button class="filter-btn" data-filter="kesma">Kesma</button>
        </div>

        <div class="filter-group" data-group="acara">
            <h3>Filter Berdasarkan Jenis Acara:</h3>
            <button class="filter-btn active" data-filter="all-event">Semua Acara</button>
            <button class="filter-btn" data-filter="event">Event</button>
            <button class="filter-btn" data-filter="non-event">Non-Event</button>
            <button class="filter-btn" data-filter="kerja-sama">Kerja Sama</button>
        </div>
    </div>

    <div class="gallery-container">
        <div class="gallery-grid">
            @forelse ($galleries as $gallery)
                @if ($gallery->photos->isNotEmpty())
                    @php
                        // PERUBAHAN UTAMA: Siapkan data semua foto dalam format JSON
                        $photosData = $gallery->photos->map(function($photo) use ($gallery) {
                            return [
                                'path' => asset('storage/' . $photo->path),
                                'caption' => $gallery->title // Menggunakan judul album sebagai caption
                            ];
                        });
                    @endphp
                    <div class="gallery-item" 
                         data-divisi="{{ strtolower($gallery->division) }}" 
                         data-acara="{{ strtolower(str_replace(' ', '-', $gallery->event_type)) }}"
                         data-photos="{{ $photosData->toJson() }}" {{-- Sisipkan data JSON ke atribut data-photos --}}
                         >
                        <img src="{{ asset('storage/' . $gallery->photos->first()->path) }}" alt="{{ $gallery->title }}" class="gallery-img">
                        <div class="gallery-caption">
                            <span class="badge">{{ $gallery->division }}</span>
                            <span class="badge">{{ $gallery->event_type }}</span>
                            <h3>{{ $gallery->title }}</h3>
                            <p>{{ $gallery->description }}</p>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center" style="grid-column: 1 / -1; padding: 2rem;">Belum ada galeri yang bisa ditampilkan.</p>
            @endforelse
        </div>
    </div>

    <div class="lightbox" id="lightbox">
        <span class="close-btn" id="close-btn">&times;</span>
        <span class="prev-btn" id="prev-btn">&#10094;</span>
        <span class="next-btn" id="next-btn">&#10095;</span>
        <div class="lightbox-content">
            <div class="lightbox-loading">Loading...</div>
            <img src="" alt="" class="lightbox-img" id="lightbox-img">
            <div class="lightbox-caption" id="lightbox-caption"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/gallery.js?v=' . time()) }}" defer></script>
@endpush