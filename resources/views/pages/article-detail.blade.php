@extends('layouts.public')

@section('title', $article->title . ' - HIMMI AMIKOM Yogyakarta')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
@endpush

@section('content')
    <section class="article-detail-section">
        <div class="container">
            <div class="article-detail-grid">
                {{-- KONTEN UTAMA ARTIKEL --}}
                <main class="article-detail-content">
                    <h1>{{ $article->title }}</h1>
                    <p class="meta">
                        Ditulis oleh <strong>{{ $article->author ?? 'Tim HIMMI' }}</strong>
                        pada {{ \Carbon\Carbon::parse($article->published_at)->isoFormat('dddd, D MMMM YYYY') }}
                    </p>
                    
                    @if($article->image_path)
                        <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" class="article-detail-image">
                    @endif

                    <div class="article-body">
                        {{-- Menampilkan konten artikel dengan format paragraf --}}
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </main>

                {{-- SIDEBAR UNTUK ARTIKEL LAINNYA --}}
                <aside class="article-sidebar">
                    <h3>Baca Juga</h3>
                    <div class="sidebar-article-list">
                        @forelse($latestArticles as $latest)
                            <a href="{{ route('artikel.show', $latest) }}">
                                <img src="{{ $latest->image_path ? asset('storage/' . $latest->image_path) : 'https://source.unsplash.com/random/160x120/?coding,'.$loop->index }}" alt="{{ $latest->title }}">
                                <div>
                                    <h4>{{ $latest->title }}</h4>
                                </div>
                            </a>
                        @empty
                            <p>Tidak ada artikel lain.</p>
                        @endforelse
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection