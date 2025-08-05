{{-- File: resources/views/pages/partials/member_card.blade.php --}}

{{-- Cek apakah link ada --}}
@if($member->link_url)
    <a href="{{ $member->link_url }}" target="_blank" rel="noopener noreferrer" class="member-card-link">
@endif

    {{-- Kartu anggota tetap menjadi container utama dengan position: relative --}}
    <div class="member-card {{ $is_leader ? 'leader-card' : '' }}">
        
        {{-- Badge Nonaktif --}}
        @if(!$member->is_active)
            <div class="inactive-badge">
                <span>NONAKTIF</span>
            </div>
        @endif

        {{-- Div ini yang akan menerima efek grayscale --}}
        <div class="member-content-wrapper @if(!$member->is_active) grayscale-filter @endif">
            <img src="{{ asset('storage/' . $member->path) }}" alt="{{ $member->name }}">
            <div class="member-info">
                <h4>{{ $member->name }}</h4>
                <p>{{ $member->position }}</p>
                <p class="member-nim">{{ $member->nim }}</p>
            </div>
        </div>
    </div>

@if($member->link_url)
    </a>
@endif