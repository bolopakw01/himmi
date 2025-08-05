@extends('layouts.public')

@section('title', 'Klien Kami - HIMMI AMIKOM')

@section('content')
<div class="page-header" style="background-image: url('{{ asset('assets/img/gallery/9.png') }}'); height: 60vh;">
    <div class="container">
        <h1>Klien & Mitra Kami</h1>
        <p>Organisasi dan perusahaan yang telah mempercayai dan bekerja sama dengan kami.</p>
    </div>
</div>

<section class="section container" id="client-list">
    <div class="section-header">
        <h2 class="section-title">Daftar Klien & Mitra</h2>
    </div>
    <div class="bph-grid">
        @if($clients->count() > 0)
            @foreach ($clients as $client)
                <div class="member-card">
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                    <div class="member-info">
                        <h4>{{ $client->name }}</h4>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">Belum ada data klien yang tersedia.</p>
        @endif
    </div>
</section>
@endsection