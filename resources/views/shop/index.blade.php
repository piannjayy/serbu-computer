@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-[#090069]">
    <div class="bg-gradient-to-b from-[#090069] to-[#0c0c3d] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                    Produk <span class="text-[#F0B22B]">Kami</span>
                </h1>
                <p class="text-gray-300 text-base md:text-lg">
                    Temukan laptop dan aksesori komputer terbaik
                </p>
            </div>

            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <div class="flex flex-wrap gap-2 w-full lg:w-auto">
                    <a href="{{ route('shop.index') }}" 
                       class="px-4 py-2 rounded-full {{ !$category ? 'bg-[#F0B22B] text-black' : 'bg-white/10 text-white hover:bg-white/20' }} transition-colors font-medium text-xs md:text-base">
                       Semua
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'Laptop']) }}" 
                       class="px-4 py-2 rounded-full {{ $category == 'Laptop' ? 'bg-[#F0B22B] text-black' : 'bg-white/10 text-white hover:bg-white/20' }} transition-colors font-medium text-xs md:text-base">
                       Laptop
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'Aksesoris']) }}" 
                       class="px-4 py-2 rounded-full {{ $category == 'Aksesoris' ? 'bg-[#F0B22B] text-black' : 'bg-white/10 text-white hover:bg-white/20' }} transition-colors font-medium text-xs md:text-base">
                       Aksesori
                    </a>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                    <form action="{{ route('shop.index') }}" method="GET" class="relative w-full sm:w-64">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari produk..." 
                               class="w-full pl-4 pr-10 py-2.5 bg-white/10 border border-white/20 rounded-full text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F0B22B] text-sm">
                        <button type="submit" class="absolute right-3 top-3 text-[#F0B22B]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>

                    <div class="relative w-full sm:w-48">
                        <select id="sortSelect" class="w-full px-4 py-2.5 bg-[#0c0c3d] border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#F0B22B] text-sm appearance-none">
                            <option value="newest">Urutan: Terbaru</option>
                            <option value="price-low">Urutan: Harga Terendah</option>
                            <option value="price-high">Urutan: Harga Tertinggi</option>
                            <option value="name">Urutan: Nama A-Z</option>
                        </select>
                    </div>
                </div>
            </div>

            @if($category || $search)
            <div class="mb-6 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="text-gray-400 text-sm">Filter aktif:</span>
                    @if($category)
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs bg-[#F0B22B] text-black font-medium">
                        {{ $category }}
                        <a href="{{ route('shop.index', ['search' => $search]) }}" class="ml-1.5 hover:text-red-600">×</a>
                    </span>
                    @endif
                    <a href="{{ route('shop.index') }}" class="text-[#F0B22B] hover:text-white text-sm ml-2 font-medium">Hapus semua</a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($products->count() > 0)
        <div id="product-grid" class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-6">
            @foreach ($products as $index => $product)
            <div class="reveal-item opacity-0 transform translate-y-8 transition-all duration-700 group bg-[#0c0c3d] rounded-2xl overflow-hidden text-white 
                        shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:-translate-y-2 hover:shadow-[0_16px_40px_rgba(240,178,43,0.15)]
                        hover:border hover:border-[#F0B22B]/20 relative">

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
                            <p class="text-[#F0B22B] text-[9px] md:text-xs font-semibold">
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
                           class="mt-auto inline-block bg-[#F0B22B] text-black px-2 md:px-4 py-1 md:py-1.5 rounded-full text-[8px] md:text-[10px] self-end font-bold transition-all duration-300 hover:bg-white hover:scale-105">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($products->hasPages())
        <div class="mt-12 flex justify-center reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
            <div class="flex items-center gap-2 bg-[#0c0c3d] p-2 rounded-xl border border-white/10 shadow-lg">
                @if(!$products->onFirstPage())
                <a href="{{ $products->previousPageUrl() }}" class="px-3 py-1.5 bg-white/5 hover:bg-[#F0B22B] hover:text-black rounded-lg text-white transition-all text-sm">←</a>
                @endif
                <span class="px-4 text-[#F0B22B] text-sm font-bold">Halaman {{ $products->currentPage() }}</span>
                @if($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="px-3 py-1.5 bg-white/5 hover:bg-[#F0B22B] hover:text-black rounded-lg text-white transition-all text-sm">→</a>
                @endif
            </div>
        </div>
        @endif

        @else
        <div class="text-center py-20 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
            <div class="w-20 h-20 bg-[#0c0c3d] rounded-full flex items-center justify-center mx-auto mb-4 border border-white/10">
                <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Produk tidak ditemukan</h3>
            <p class="text-gray-400 text-sm mb-6">Coba filter atau kata kunci pencarian yang lain</p>
            <a href="{{ route('shop.index') }}" class="inline-block bg-[#F0B22B] text-black px-8 py-3 rounded-full font-bold hover:bg-white transition-all">Hapus Semua Filter</a>
        </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sort Logic
        const sortSelect = document.getElementById('sortSelect');
        if (sortSelect) {
            const urlParams = new URLSearchParams(window.location.search);
            sortSelect.value = urlParams.get('sort') || 'newest';
            sortSelect.addEventListener('change', function() {
                let url = new URL(window.location.href);
                if (this.value === 'newest') { url.searchParams.delete('sort'); } 
                else { url.searchParams.set('sort', this.value); }
                window.location.href = url.toString();
            });
        }
        
        // --- REVEAL ANIMATION LOGIC ---
        const revealItems = document.querySelectorAll('.reveal-item');
        
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Cek semua elemen reveal-item
                    const allItems = Array.from(revealItems);
                    const index = allItems.indexOf(entry.target);
                    
                    // Gunakan setTimeout untuk efek staggered (bergantian)
                    setTimeout(() => {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }, index * 50); // Kecepatan muncul antar kartu (50ms)

                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealItems.forEach(el => observer.observe(el));
    });
</script>

<style>
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23F0B22B' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
</style>
@endsection