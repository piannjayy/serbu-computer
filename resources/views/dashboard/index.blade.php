@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<section class="relative bg-[#F3F3F3] overflow-x-hidden reveal">
    <div class="hidden md:block absolute inset-y-0 left-0 w-[240px] bg-[#090069]"
        style="clip-path: polygon(0 0, 3% 0, 85% 101%, 0% 101%);">
    </div>

    <div class="md:hidden absolute top-0 left-0 w-full h-20 bg-[#090069]"
        style="clip-path: polygon(0 0, 100% 0, 100% 25%, 0 101%);">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 sm:px-10 md:px-16 py-6 md:py-8
                grid grid-cols-1 md:grid-cols-2 items-center md:translate-x-7">

        <div class="relative flex justify-center md:justify-end items-center order-1 md:order-2 mt-2 md:mt-0 mb-4 md:mb-0">
            <img src="{{ asset('images/hero.png') }}" alt="Laptop"
                class="relative z-10 w-[260px] sm:w-[320px] md:w-[480px] object-contain md:translate-x-6 drop-shadow-2xl">
        </div>

        <div class="relative z-10 order-2 md:order-1 text-center md:text-left">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-black leading-tight mb-4 md:mb-6">
                <span class="block">Serbu Kebutuhan</span>
                <span class="block">IT Kamu Sekarang</span>
            </h1>
            <p class="text-gray-700 text-base sm:text-lg md:text-xl mb-6 md:mb-8 max-w-lg mx-auto md:mx-0 leading-relaxed font-medium">
               Sedia berbagai tipe laptop dan aksesori original yang bisa kamu pesan langsung.
            </p>
            <button onclick="scrollToAbout()"
                class="w-full sm:w-auto bg-[#F0B22B] px-10 py-3.5 rounded-full font-bold hover:scale-105 active:scale-95 transition-all shadow-lg text-sm uppercase tracking-widest text-black">
                Mulai Sekarang
            </button>
        </div>
    </div>
</section>

<section id="about-section" class="bg-gradient-to-b from-[#090069] to-[#0c0c3d] px-6 md:px-16 py-16 md:py-24 reveal">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center text-white">
        <div class="flex justify-center order-1">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-[#F0B22B] to-[#090069] rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                <img src="{{ asset('images/laptop-about.png') }}" alt="About" 
                    class="relative w-full max-w-md h-auto rounded-2xl shadow-2xl transition-transform duration-500 hover:scale-[1.02]">
            </div>
        </div>
        <div class="text-center md:text-left order-2">
            <h2 class="text-2xl md:text-3xl font-bold text-[#F0B22B] mb-4 uppercase tracking-wider">Sedikit Tentang Kami</h2>
            <div class="w-16 h-1 bg-[#F0B22B] mb-6 mx-auto md:mx-0"></div>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed">
                Serbu Comp adalah mitra terpercaya Anda dalam menyediakan laptop dan aksesoris berkualitas dengan harga terjangkau. 
                Kami berkomitmen untuk membantu pelajar, profesional, dan kreator digital menemukan perangkat yang tepat.
            </p>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed mt-4">
                Dengan layanan pemesanan yang mudah dan dukungan purna jual yang responsif, kami hadir untuk memastikan pengalaman berbelanja teknologi Anda menjadi lebih sederhana.
            </p>
        </div>
    </div>
</section>

<section class="bg-[#090069] px-4 md:px-16 py-20 reveal">
    <h2 class="text-center text-[#F0B22B] text-2xl font-black mb-12 tracking-widest uppercase">Produk Kami</h2>

    <div class="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-6">
        @foreach ($products as $index => $product)
        <div class="group bg-[#0c0c3d] rounded-2xl overflow-hidden text-white 
                    shadow-[0_8px_24px_rgba(0,0,0,0.3)] transition-all duration-500 
                    hover:-translate-y-2 hover:shadow-[0_16px_40px_rgba(240,178,43,0.15)]
                    hover:border hover:border-[#F0B22B]/20 relative
                    before:absolute before:inset-0 before:bg-gradient-to-br before:from-transparent 
                    before:via-transparent before:to-[#F0B22B]/5 before:opacity-0 
                    before:transition-opacity before:duration-500 hover:before:opacity-100 reveal">

            <div class="absolute top-2 left-2 md:top-4 md:left-4 z-20">
                <span class="px-2 py-0.5 md:px-3 md:py-1 text-[7px] md:text-[10px] font-semibold rounded-full {{ $product->category == 'Laptop' ? 'bg-blue-500' : 'bg-green-500' }} text-white uppercase">
                    {{ $product->category }}
                </span>
            </div>

            <div class="absolute top-2 right-2 md:top-4 md:right-4 z-20">
                @if($product->stock > 0)
                    <span class="px-2 py-0.5 md:px-3 md:py-1 text-[7px] md:text-[10px] font-semibold rounded-full bg-[#F0B22B] text-black">Stok: {{ $product->stock }}</span>
                @else
                    <span class="px-2 py-0.5 md:px-3 md:py-1 text-[7px] md:text-[10px] font-semibold rounded-full bg-red-500 text-white">Habis</span>
                @endif
            </div>

            <div class="h-32 md:h-48 bg-gradient-to-b from-[#003A8F] to-[#002a6a] overflow-hidden relative rounded-t-2xl">
                <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('images/placeholder.png') }}"
                    alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
            </div>

            <div class="p-3 md:p-5 grid grid-cols-2 gap-2 md:gap-4 text-xs min-h-[140px] md:min-h-[160px] relative z-10">
                <div class="flex flex-col">
                    <h3 class="font-semibold text-[10px] md:text-sm mb-1 md:mb-2 leading-snug transition-colors duration-300 group-hover:text-[#F0B22B] line-clamp-2">
                        {{ $product->name }}
                    </h3>
                    <div class="mt-auto">
                        <p class="text-gray-300 text-[8px] md:text-[10px] mb-0.5 md:mb-1">mulai dari :</p>
                        <p class="text-[#F0B22B] text-[9px] md:text-xs font-semibold transition-transform duration-300 group-hover:scale-105 group-hover:translate-x-1">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col text-right">
                    <p class="font-semibold mb-1 md:mb-2 text-[9px] md:text-xs transition-colors duration-300 group-hover:text-[#F0B22B]">Spesifikasi</p>
                    @php $specs = preg_split("/\r\n|\n|,/", $product->specs); @endphp
                    <p class="text-gray-400 leading-tight mb-2 md:mb-4 text-[8px] md:text-[10px] line-clamp-2">
                        {{ $specs[0] ?? '' }}<br>
                        {{ $specs[1] ?? '' }}
                    </p>

                    <a href="{{ route('shop.show', $product->id) }}"
                       class="mt-auto inline-block bg-[#F0B22B] text-black px-2 md:px-4 py-1 md:py-1.5 rounded-full text-[8px] md:text-[10px] self-end font-bold transition-all duration-300 hover:bg-white hover:scale-105 hover:shadow-lg hover:shadow-[#F0B22B]/30 relative overflow-hidden after:absolute after:inset-0 after:bg-gradient-to-r after:from-white/10 after:to-transparent after:translate-x-[-100%] hover:after:translate-x-100 after:transition-transform after:duration-500">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <div class="absolute top-0 right-0 w-12 h-12 bg-gradient-to-bl from-[#F0B22B]/0 via-[#F0B22B]/0 to-[#F0B22B]/10 rounded-bl-2xl transition-all duration-500 group-hover:from-[#F0B22B]/10 group-hover:to-[#F0B22B]/20"></div>
        </div>
        @endforeach
    </div>
</section>

<section class="bg-[#0c0c3d] px-6 md:px-16 py-20 reveal">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-[#F0B22B] text-3xl font-bold mb-10 uppercase tracking-widest">Galeri Kami</h2>
        <div class="swiper myGallery">
            <div class="swiper-wrapper">
                @foreach ($gallery as $image)
                    <div class="swiper-slide py-4">
                        <div class="group bg-white rounded-2xl h-64 overflow-hidden shadow-xl transition-all hover:scale-[1.02]">
                            <img src="{{ asset($image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination !static mt-10"></div>
        </div>
    </div>
</section>

<section class="bg-gradient-to-b from-[#090069] to-[#0c0c3d] px-4 md:px-16 py-16 md:py-24 reveal">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-center text-[#F0B22B] text-2xl md:text-3xl font-bold mb-8 md:mb-12 uppercase tracking-wide">Pertanyaan Umum</h2>
        
        <div class="space-y-3 md:space-y-4">
            @foreach ($faqs as $index => $faq)
                <div class="faq-item rounded-2xl overflow-hidden transition-all border border-white/5 {{ $index === 0 ? 'bg-white' : 'bg-[#0c0c3d]' }}">
                    <button class="faq-question w-full flex justify-between items-center p-4 md:p-6 text-left font-bold text-sm md:text-base {{ $index === 0 ? 'text-[#F0B22B]' : 'text-white' }}">
                        <span class="pr-4">{{ $faq['question'] }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-5 md:h-5 faq-icon transition-transform duration-300 {{ $index === 0 ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div class="faq-answer px-4 md:px-6 pb-4 md:pb-6 {{ $index === 0 ? 'block text-black' : 'hidden text-white' }}">
                        <div class="pt-3 md:pt-4 border-t border-gray-100/20 text-xs md:text-base leading-relaxed">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .swiper-pagination-bullet { width: 10px; height: 10px; background: rgba(255, 255, 255, 0.3) !important; opacity: 1 !important; }
    .swiper-pagination-bullet-active { width: 25px !important; border-radius: 5px !important; background: #F0B22B !important; }
    .reveal { opacity: 0; transform: translateY(20px); transition: all 0.7s ease-out; }
    .reveal.active { opacity: 1; transform: translateY(0); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.myGallery', {
        loop: true, speed: 800, autoplay: { delay: 3500 },
        pagination: { el: '.swiper-pagination', clickable: true },
        breakpoints: { 320: { slidesPerView: 1, spaceBetween: 15 }, 768: { slidesPerView: 2, spaceBetween: 20 }, 1024: { slidesPerView: 3, spaceBetween: 25 } }
    });

    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        item.querySelector('.faq-question').addEventListener('click', () => {
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');
            const isOpen = !answer.classList.contains('hidden');
            faqItems.forEach(i => {
                i.querySelector('.faq-answer').classList.add('hidden');
                i.querySelector('.faq-icon').classList.remove('rotate-180');
                i.classList.replace('bg-white', 'bg-[#0c0c3d]');
                i.querySelector('.faq-question').classList.replace('text-[#F0B22B]', 'text-white');
                i.querySelector('.faq-answer').classList.replace('text-black', 'text-white');
            });
            if (!isOpen) {
                answer.classList.remove('hidden');
                icon.classList.add('rotate-180');
                item.classList.replace('bg-[#0c0c3d]', 'bg-white');
                item.querySelector('.faq-question').classList.replace('text-white', 'text-[#F0B22B]');
                answer.classList.replace('text-white', 'text-black');
            }
        });
    });

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('active'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});
function scrollToAbout() { document.getElementById('about-section')?.scrollIntoView({ behavior: 'smooth' }); }
</script>

@endsection