@extends('layouts.public')

@section('title', 'Struktur Organisasi - HIMMI AMIKOM Yogyakarta')

@section('content')
<div class="page-header" id="struktur-page">
    <div class="container">
        <h1>Struktur Organisasi HIMMI</h1>
        <p>Tim Solid Periode 2024/2025</p>
    </div>
</div>

<section class="section container" id="organization-full">
    
    @foreach ($divisionOrder as $divisionName)
        @php
            $members = $groupedMembers->get($divisionName);
            $title = '';
            switch ($divisionName) {
                case 'BPH': $title = 'Badan Pengurus Harian (BPH)'; break;
                case 'Internal': $title = 'Divisi Internal'; break;
                case 'Eksternal': $title = 'Divisi Eksternal'; break;
                case 'Kesma': $title = 'Divisi Kesejahteraan Mahasiswa'; break;
            }
        @endphp

        @if ($members && $members->count() > 0)
            <div class="structure-group">
                <h2 class="division-title">{{ $title }}</h2>
                
                @if ($divisionName == 'BPH')
                    @php
                        $leaders = $members->take(2);
                        $otherBph = $members->slice(2);
                    @endphp
                    <div class="bph-grid">
                        @if ($leaders->count() > 0)
                            <div class="bph-row">
                                @foreach ($leaders as $member)
                                    @include('pages.partials.member_card', ['member' => $member, 'is_leader' => true])
                                @endforeach
                            </div>
                        @endif

                        @if ($otherBph->count() > 0)
                            <div class="bph-row">
                                @foreach ($otherBph as $member)
                                    @include('pages.partials.member_card', ['member' => $member, 'is_leader' => false])
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <div class="division-grid">
                        @foreach ($members as $member)
                            @include('pages.partials.member_card', ['member' => $member, 'is_leader' => false])
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    @endforeach

</section>
@endsection

@push('styles')
<style>
    /* CSS untuk kartu anggota dan badge nonaktif */
    .member-card {
        position: relative;
        overflow: hidden;   
    }

    .inactive-badge {
        position: absolute;
        top: 15px;
        right: -30px;
        background-color: #bf0013; 
        color: white;
        padding: 5px 30px;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        transform: rotate(45deg);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        z-index: 10;
    }
    
    .grayscale-filter {
        filter: grayscale(100%);
    }

        .member-card-link {
        display: block;
        text-decoration: none; 
        color: inherit; 
        transition: transform 0.3s ease;
    }
    
    .member-card-link:hover {
        transform: translateY(-5px); 
    }
</style>
@endpush