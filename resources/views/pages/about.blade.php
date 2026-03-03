@extends('layouts.main')

@section('content')

<section class="relative bg-[#F3F3F3] overflow-hidden py-6 md:py-8 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
    <div class="hidden md:block absolute top-0 right-0 w-[120px] h-full bg-[#090069] z-0"
    style="clip-path: polygon(100% 0, 100% 100%, 0% 100%, 80% 0);">
    </div>

    <div class="md:hidden absolute top-0 left-0 w-full h-6 bg-[#090069]"
        style="clip-path: polygon(0 0, 100% 0, 100% 20%, 0 100%);">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 md:px-16 z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="order-1 flex justify-center md:justify-start">
                <div class="relative">
                    <img src="{{ asset('images/hero.png') }}" alt="Laptop Serbu Computer"
                        class="relative z-10 w-[260px] sm:w-[340px] md:w-[480px] object-contain drop-shadow-xl">
                </div>
            </div>

            <div class="order-2 text-center md:text-left">
                <h1 class="text-3xl sm:text-5xl md:text-6xl font-black text-black leading-tight mb-4">
                    About Serbu Computer
                </h1>
                <p class="text-gray-700 text-base md:text-lg max-w-lg leading-relaxed font-medium mx-auto md:mx-0">
                    Your trusted place for laptops and accessories in 
                    <span class="inline-block text-[#090069] font-bold border-b-4 border-[#F0B22B] pb-1">Serbu Computer</span>.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="about-section" class="bg-gradient-to-b from-[#090069] to-[#0c0c3d] py-16 px-6 md:px-16 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
        <div class="rounded-2xl h-72 md:h-80 overflow-hidden shadow-2xl border border-white/10 transition-transform duration-500 hover:scale-[1.02]">
            <img src="{{ asset('images/masag.jpeg') }}" class="w-full h-full object-cover"> 
        </div>

        <div class="text-white">
            <h3 class="text-[#F0B22B] text-2xl font-bold mb-4">Pemilik & Pendiri</h3>
            <p class="text-gray-300 leading-relaxed text-justify md:text-left">
                Agong Wibowo adalah pendiri Serbu Computer Sawojajar yang berpengalaman dalam penjualan dan servis laptop. Dengan mengutamakan kejujuran dan kualitas layanan, Serbu Computer hadir sebagai solusi terpercaya untuk kebutuhan laptop dan teknologi pelanggan.
            </p>
        </div>
    </div>
</section>

<section class="bg-gradient-to-b from-[#0c0c3d] to-[#090069] py-16 px-6 md:px-16 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
        <div class="text-white order-2 md:order-1">
            <h3 class="text-[#F0B22B] text-2xl font-bold mb-4">Profil Toko</h3>
            <p class="text-gray-300 leading-relaxed text-justify md:text-left">
                Serbu Computer merupakan toko laptop dan aksesoris di Sawojajar, Kota Malang yang melayani jual beli, upgrade, dan servis laptop dengan harga bersaing serta pelayanan yang cepat dan transparan.
            </p>
        </div>

        <div class="rounded-2xl h-72 md:h-80 overflow-hidden shadow-2xl border border-white/10 order-1 md:order-2 mb-6 md:mb-0 transition-transform duration-500 hover:scale-[1.02]">
            <img src="{{ asset('images/warung.jpeg') }}" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<section class="bg-[#090069] py-16 px-6 md:px-16">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
            <h3 class="text-[#F0B22B] text-2xl md:text-3xl font-bold mb-2">Mengapa Memilih Kami?</h3>
            <p class="text-gray-400 text-sm md:text-base">Komitmen Serbu Computer untuk memberikan pengalaman terbaik bagi Anda.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $items = [
                    ['title' => 'Keamanan Terjamin', 'desc' => 'Setiap transaksi aman dan data privasi pelanggan kami lindungi sepenuhnya.', 'svg' => '<path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5zm-1 15l-4-4 1.41-1.41L11 14.17l5.59-5.59L18 10l-7 7z"/>'],
                    ['title' => 'Harga Terbaik', 'desc' => 'Penawaran harga yang jujur, transparan, dan sangat kompetitif di wilayah Sawojajar.', 'svg' => '<path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.05-.59-1.42zM5.5 8.25c-.97 0-1.75-.78-1.75-1.75s.78-1.75 1.75-1.75 1.75.78 1.75 1.75-.78 1.75-1.75 1.75z"/>'],
                    ['title' => 'Layanan Responsif', 'desc' => 'Tim teknisi kami siap memberikan konsultasi gratis dan perbaikan dengan durasi cepat.', 'svg' => '<path d="M7 2v11h3v9l7-12h-4l4-8z"/>'],
                    ['title' => 'Kualitas Teruji', 'desc' => 'Seluruh unit laptop dan aksesori telah melewati tahap Quality Control yang ketat.', 'svg' => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"/>'],
                ];
            @endphp

            @foreach($items as $item)
            <div class="reveal-item opacity-0 transform translate-y-8 transition-all duration-700 flex items-center gap-5 bg-[#0c0c3d] rounded-2xl p-6 text-white border border-white/5 hover:border-[#F0B22B]/40 transition-all duration-300 group shadow-lg">
                <div class="flex-shrink-0 w-14 h-14 bg-[#F0B22B] rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(240,178,43,0.2)] group-hover:shadow-[0_0_20px_rgba(240,178,43,0.4)] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-[#090069]" fill="currentColor" viewBox="0 0 24 24">
                        {!! $item['svg'] !!}
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-1 group-hover:text-[#F0B22B] transition-colors uppercase tracking-tight">
                        {{ $item['title'] }}
                    </h4>
                    <p class="text-gray-400 text-sm leading-relaxed italic">
                        {{ $item['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Section Sosial Media --}}
<section class=" bg-gradient-to-b from-[#090069] to-[#0c0c3d] py-16 px-6 md:px-16 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
    <div class="max-w-6xl mx-auto text-center">
        <h3 class="text-[#F0B22B] text-2xl md:text-3xl font-bold mb-4">Hubungi Kami</h3>
        <p class="text-gray-400 mb-10 max-w-2xl mx-auto">Punya pertanyaan atau ingin konsultasi seputar laptop? Jangan ragu untuk menyapa kami melalui platform media sosial berikut.</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            {{-- WhatsApp --}}
            <a href="https://wa.me/6285755705143" target="_blank" 
               class="flex flex-col items-center p-8 bg-[#090069] rounded-2xl border border-white/5 hover:border-green-500/50 hover:scale-105 transition-all duration-300 group shadow-lg">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(34,197,94,0.4)] transition-all">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>
                <h4 class="text-white font-bold text-lg">WhatsApp</h4>
                <p class="text-gray-400 text-sm mt-1">Konsultasi Cepat</p>
            </a>

            {{-- Instagram --}}
            <a href="https://instagram.com/serbucomputer" target="_blank" 
               class="flex flex-col items-center p-8 bg-[#090069] rounded-2xl border border-white/5 hover:border-pink-500/50 hover:scale-105 transition-all duration-300 group shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 rounded-full flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(236,72,153,0.4)] transition-all">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </div>
                <h4 class="text-white font-bold text-lg">Instagram</h4>
                <p class="text-gray-400 text-sm mt-1">Update & Promo</p>
            </a>

            {{-- Facebook --}}
            <a href="https://facebook.com/serbucomputer" target="_blank" 
               class="flex flex-col items-center p-8 bg-[#090069] rounded-2xl border border-white/5 hover:border-blue-500/50 hover:scale-105 transition-all duration-300 group shadow-lg">
                <div class="w-16 h-16 bg-[#1877F2] rounded-full flex items-center justify-center mb-4 group-hover:shadow-[0_0_20px_rgba(24,119,242,0.4)] transition-all">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </div>
                <h4 class="text-white font-bold text-lg">Facebook</h4>
                <p class="text-gray-400 text-sm mt-1">Komunitas Pelanggan</p>
            </a>
        </div>
    </div>
</section>

<section class="bg-[#0c0c3d] py-12 md:py-16 px-6 md:px-16 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
    <div class="max-w-6xl mx-auto">
        <h3 class="text-[#F0B22B] text-3xl font-bold mb-6 text-center">Lokasi Toko Kami</h3>
        <p class="text-gray-400 mb-10 max-w-2xl mx-auto text-center">Kami berlokasi di Jl. Danau Djonge H8/H19, Kota Malang. Anda dapat mengunjungi toko kami untuk membeli komponen komputer terbaik dan layanan teknisi profesional.</p>

        <div class="rounded-2xl overflow-hidden border border-white/10 bg-[#0c0c3d] shadow-2xl">
            <div id="map" class="w-full h-60 md:h-80"></div>
            <div class="p-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-start gap-3 text-gray-200">
                    <div class="mt-1 shrink-0">
                        <svg class="w-7 h-7 text-[#F0B22B]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Serbu Computer Sawojajar</p>
                        <p class="text-sm text-gray-400">Jl. Danau Djonge H8/H19, Kota Malang</p>
                    </div>
                </div>
                <a href="https://maps.app.goo.gl/bjeKXvUjmE6XMz8C7" target="_blank"
                   class="bg-[#F0B22B] text-[#090069] px-6 py-2.5 rounded-full font-bold text-sm text-center hover:bg-white transition-all duration-300">
                    Lihat di Google Maps
                </a>
            </div>
        </div>
    </div>
</section>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Map Logic
    const coords = [-7.975041062529727, 112.67047620610623];
    const map = L.map('map', {
        center: coords,
        zoom: 16,
        scrollWheelZoom: false
    });
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    L.marker(coords).addTo(map);

    // --- REVEAL ANIMATION LOGIC ---
    const revealItems = document.querySelectorAll('.reveal-item');
    
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Mencari index elemen di antara semua reveal-item untuk staggered effect
                const allItems = Array.from(revealItems);
                const index = allItems.indexOf(entry.target);
                
                setTimeout(() => {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }, 100); // Delay dasar, bisa disesuaikan

                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealItems.forEach(el => observer.observe(el));
});
</script>

<style>
    .leaflet-control-attribution { display: none !important; }
</style>

@endsection