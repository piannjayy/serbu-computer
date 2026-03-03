@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#090069] via-[#0c0c3d] to-[#090069]">

    <div class="bg-gradient-to-b from-[#090069] to-[#0c0c3d] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                    <span class="text-[#F0B22B]">Riwayat</span> Pembelian
                </h1>
                <p class="text-gray-300 text-base md:text-lg">
                    Lacak semua pesanan dan transaksi Anda
                </p>
            </div>
        </div>
    </div>

    <form action="{{ route('riwayat.simulate') }}" method="POST" class="mb-4">
    @csrf
    <button 
        onclick="return confirm('Simulasi order lewat 3 hari?')"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition">
        SIMULASI LEWAT 3 HARI
    </button>
</form>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-300 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-red-300 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            </div>
        @endif

        @if($orders->isEmpty())
            <div class="text-center py-12 md:py-16 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#0c0c3d] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 md:w-10 md:h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-white mb-2">Belum ada riwayat pembelian</h3>
                <p class="text-gray-400 text-sm md:text-base mb-6 max-w-md mx-auto">
                    Mulailah berbelanja untuk melihat riwayat pembelian Anda di sini
                </p>
                <a href="{{ route('shop.index') }}" 
                    class="inline-block bg-[#F0B22B] text-black px-6 py-2.5 rounded-lg font-bold hover:bg-white transition-all transform hover:scale-105">
                    Mulai Berbelanja
                </a>
            </div>
        @else
            <div class="mb-6 reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <p class="text-gray-300 font-medium">
                    Total <span class="text-[#F0B22B]">{{ $orders->count() }}</span> pesanan ditemukan
                </p>
            </div>

            <div id="orders-container" class="space-y-6">
                @foreach($orders as $order)
                <div class="reveal-item opacity-0 transform translate-y-8 transition-all duration-700 group bg-[#0c0c3d] rounded-2xl overflow-hidden text-white border border-white/5
                    shadow-[0_8px_32px_rgba(0,0,0,0.4)] hover:border-[#F0B22B]/30 relative">

                    <div class="p-5 md:p-6 border-b border-white/10 bg-white/5">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <div>
                                <h2 class="font-bold text-lg md:text-xl text-white">
                                    Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                </h2>
                                <div class="flex items-center text-gray-400 text-xs mt-1">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </div>
                            </div>
                            
                            @php
                                $statusColors = [
                                    'selesai' => 'bg-green-500/20 text-green-300 border-green-500/30',
                                    'menunggu_pembayaran_tunai' => 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30',
                                    'menunggu_verifikasi' => 'bg-blue-500/20 text-blue-300 border-blue-500/30',
                                    'dibatalkan' => 'bg-red-500/20 text-red-300 border-red-500/30'
                                ];
                                $statusTexts = [
                                    'selesai' => 'Selesai',
                                    'menunggu_pembayaran_tunai' => 'Menunggu Pembayaran',
                                    'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                    'dibatalkan' => 'Dibatalkan'
                                ];
                            @endphp
                            <span class="px-4 py-1.5 rounded-full border {{ $statusColors[$order->status] ?? 'bg-gray-500/20 text-gray-300' }} font-bold text-xs uppercase tracking-wider">
                                {{ $statusTexts[$order->status] ?? $order->status }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 md:p-6 space-y-4">
                        <div class="flex flex-wrap gap-3">
                            <div class="inline-flex items-center px-3 py-1.5 rounded-lg bg-white/5 border border-white/10">
                                <svg class="w-4 h-4 mr-2 text-[#F0B22B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span class="text-xs text-gray-300 uppercase">
                                    Metode: <span class="text-white font-bold ml-1">{{ strtoupper($order->metode_pembayaran) }}</span>
                                </span>
                            </div>

                            @if($order->status === 'menunggu_pembayaran_tunai' && $order->batas_waktu)
                                <div class="inline-flex items-center px-3 py-1.5 rounded-lg bg-yellow-500/10 border border-yellow-500/20 text-yellow-300">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-xs font-medium italic">Bayar sebelum: {{ \Carbon\Carbon::parse($order->batas_waktu)->format('d M, H:i') }}</span>
                                </div>
                            @endif
                        </div>

                        @if($order->metode_pembayaran === 'bca' && $order->bukti_bayar)
                        <div class="bg-white/5 p-3 rounded-xl border border-white/5">
                            <p class="text-xs text-gray-400 mb-2 font-bold uppercase tracking-widest">Bukti Transfer:</p>
                            <div class="relative w-24 h-24 md:w-32 md:h-32 group/img">
                                <img
                                    src="{{ asset('storage/' . $order->bukti_bayar) }}"
                                    class="w-full h-full object-cover rounded-lg border border-white/10 cursor-pointer hover:border-[#F0B22B] transition-all"
                                    onclick="toggleImage(this)"
                                    alt="Bukti Pembayaran"
                                >
                                <div class="absolute inset-0 bg-black/40 rounded-lg opacity-0 group-hover/img:opacity-100 flex items-center justify-center pointer-events-none transition-opacity">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($order->pesan)
                        <div class="p-3 bg-black/20 rounded-xl border border-white/5 italic">
                            <p class="text-[11px] text-[#F0B22B] font-bold uppercase mb-1">Catatan Pesanan:</p>
                            <p class="text-sm text-gray-300 leading-relaxed">"{{ $order->pesan }}"</p>
                        </div>
                        @endif

                        <div class="flex flex-col md:flex-row justify-between items-end md:items-center pt-4 border-t border-white/10 gap-4">
                            <div>
                                <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Total Pembayaran</p>
                                <p class="text-2xl font-black text-[#F0B22B]">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </p>
                            </div>
                            
                            <div class="w-full md:w-auto">
                                @if(!in_array($order->status, ['selesai', 'dibatalkan']))
                                <form action="{{ route('riwayat.cancel', $order->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                    @csrf
                                    <button class="w-full md:w-auto px-5 py-2 bg-red-500/10 text-red-400 border border-red-500/30 rounded-xl hover:bg-red-500 hover:text-white transition-all text-sm font-bold flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Batalkan Pesanan
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-bl from-[#F0B22B]/10 to-transparent opacity-50"></div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 pt-6 border-t border-white/5 text-center reveal-item opacity-0 transform translate-y-8 transition-all duration-700">
                <p class="text-gray-500 text-xs tracking-widest uppercase">
                    Menampilkan {{ $orders->count() }} pesanan terbaru
                </p>
            </div>
        @endif
    </div>
</div>

{{-- SCRIPT --}}
<script>
// Fungsi Zoom Gambar
function toggleImage(img) {
    if (img.classList.contains('zoomed')) {
        img.classList.remove('zoomed');
        img.style = '';
        document.body.style.overflow = 'auto';
        const overlay = document.getElementById('image-overlay');
        if(overlay) document.body.removeChild(overlay);
    } else {
        img.classList.add('zoomed');
        img.style.position = 'fixed';
        img.style.top = '50%';
        img.style.left = '50%';
        img.style.transform = 'translate(-50%, -50%) scale(1)';
        img.style.width = 'auto';
        img.style.maxWidth = '90vw';
        img.style.maxHeight = '80vh';
        img.style.zIndex = '9999';
        img.style.cursor = 'zoom-out';
        img.style.borderRadius = '12px';
        img.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.8)';
        img.style.border = '2px solid #F0B22B';
        document.body.style.overflow = 'hidden';
        
        const overlay = document.createElement('div');
        overlay.id = 'image-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.95)';
        overlay.style.zIndex = '9998';
        overlay.style.cursor = 'zoom-out';
        overlay.onclick = function() { toggleImage(img); };
        document.body.appendChild(overlay);
    }
}

// Reveal Logic
document.addEventListener('DOMContentLoaded', function() {
    const reveals = document.querySelectorAll('.reveal-item');
    
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Menghitung index elemen di dalam list untuk memberikan delay staggered
                const allItems = Array.from(reveals);
                const index = allItems.indexOf(entry.target);
                
                setTimeout(() => {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }, index * 100); // Delay 100ms antar tiap kartu pesanan

                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    reveals.forEach(el => observer.observe(el));
});
</script>
@endsection