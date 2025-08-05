@extends('layouts.public')

@section('title', 'Hubungi Kami - HIMMI AMIKOM Yogyakarta')

@section('content')
<div class="page-header" id="kontak-page">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Kami siap menerima pertanyaan, masukan, dan proposal kerja sama.</p>
    </div>
</div>

<section class="section container" id="contact-page">
    <div class="contact-page-grid">
        <div class="contact-info-wrapper">
            <div class="contact-card-page">
                <i class="fas fa-envelope"></i>
                <h3>Email Resmi</h3>
                <p>Saluran utama untuk proposal dan surat-menyurat resmi.</p>
                <a href="mailto:himmi@amikom.ac.id">himmi@amikom.ac.id</a>
            </div>
             <div class="contact-card-page">
                <i class="fab fa-instagram"></i>
                <h3>Instagram</h3>
                <p>Ikuti kami untuk mendapatkan update kegiatan terbaru.</p>
                <a href="https://instagram.com/himmi.amikom" target="_blank">@himmi.amikom</a>
            </div>
             <div class="contact-card-page">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Sekretariat</h3>
                <p>Gedung Unit 5, Universitas Amikom Yogyakarta<br>Jl. Ring Road Utara, Condong Catur, Depok, Sleman, Yogyakarta, 55283</p>
            </div>
        </div>
        <div class="contact-map-wrapper">
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2875323634!2d110.40662237580196!3d-7.75926947711488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599bd3bdc4ef%3A0x978a6318353375f9!2sUniversity%20of%20Amikom%20Yogyakarta!5e0!3m2!1sen!2sid!4v1692878481234!5m2!1sen!2sid" 
                    width="600" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection