@extends('layouts.public')

@section('title', 'Artikel & Wawasan - HIMMI AMIKOM Yogyakarta')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
@endpush

@section('content')
    <header class="article-header">
        <h1>Artikel & Wawasan</h1>
        <p>Jelajahi wawasan terbaru seputar dunia teknologi, pengembangan karir, dan kreativitas dari tim HIMMI.</p>
    </header>

    <section class="article-section">
        <div class="container">
            @if ($articles->count() > 0)
                {{-- Ini adalah grid yang akan membuat artikel berjejer --}}
                <div class="article-grid">
                    
                    {{-- Loop untuk menampilkan setiap artikel sebagai kartu --}}
                    @foreach ($articles as $article)
                        {{-- Setiap kartu adalah tautan ke halaman detail --}}
                        <a href="{{ route('artikel.show', $article) }}" class="article-card">
                            <div class="article-image-container">
                                <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : 'https://source.unsplash.com/random/600x400/?technology,'.$loop->index }}" 
                                     alt="{{ $article->title }}" class="article-image">
                            </div>
                            <div class="article-content">
                                <h3 class="article-title">{{ $article->title }}</h3>
                                <p class="article-meta">
                                    Oleh <strong>{{ $article->author ?? 'Tim HIMMI' }}</strong> &middot; 
                                    {{ \Carbon\Carbon::parse($article->published_at)->isoFormat('D MMMM YYYY') }}
                                </p>
                                <p class="article-excerpt">
                                    {{ Str::limit(strip_tags($article->content), 120) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Menampilkan tombol navigasi halaman jika artikel lebih dari 6 --}}
                <div class="pagination-container">
                    {{ $articles->links() }}
                </div>

            @else
                <div class="text-center" style="padding: 3rem 0;">
                    <p>Saat ini belum ada artikel yang diterbitkan.</p>
                </div>
            @endif
        </div>
    </section>
@endsection