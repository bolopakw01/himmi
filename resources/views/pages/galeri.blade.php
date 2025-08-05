{{-- File: resources/views/pages/galeri.blade.php --}}
@extends('layouts.public')

@section('title', 'Galeri - HIMMI AMIKOM Yogyakarta')

@section('content')
<div class="page-header" id="galeri-page">
    <div class="container">
        <h1>Galeri Kegiatan</h1>
        <p>Momen-momen berharga dari berbagai kegiatan yang telah kami selenggarakan.</p>
    </div>
</div>

<section class="section container" id="gallery-full">
    <div class="gallery-grid-full">
        @forelse ($galeriItems as $item)
            <div class="gallery-item-full">
                <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->caption }}">
                {{-- Anda bisa menambahkan caption di bawah gambar jika perlu --}}
            </div>
        @empty
            <p class="text-center">Belum ada foto di galeri.</p>
        @endforelse
    </div>
</section>
@endsection