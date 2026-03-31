@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-[#090069] py-8">
    <div class="max-w-5xl mx-auto px-4">
        
        {{-- Header Section --}}
        <div class="mb-8 reveal opacity-0 transform translate-y-10 transition duration-700">
            <h1 class="text-3xl font-black text-white mb-2 uppercase tracking-tight">Finalisasi Pembelian</h1>
            <div class="flex items-center gap-2">
                <span class="h-1 w-12 bg-[#F0B22B] rounded-full"></span>
                <p class="text-gray-300 text-sm italic">Lengkapi detail pembayaran Anda di bawah ini</p>
            </div>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/50 rounded-2xl text-red-400 reveal shadow-lg">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <p class="font-bold text-sm uppercase">Peringatan Input:</p>
                </div>
                <ul class="list-disc pl-9 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-xs font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.store', $product->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- KOLOM KIRI: DATA PEMBELI & PEMBAYARAN --}}
                <div class="lg:col-span-2 space-y-6">
                    
                    {{-- FORM: DATA PEMBELI --}}
                    <div class="bg-[#0c0c3d] rounded-2xl p-6 border border-white/5 reveal shadow-xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-[#F0B22B]/10 rounded-lg">
                                <svg class="w-5 h-5 text-[#F0B22B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <h2 class="text-lg font-bold text-white uppercase tracking-wider">Informasi Kontak</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-2 ml-1">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $lastOrder->nama_lengkap ?? auth()->user()->nama) }}"
                                    class="w-full bg-[#090069] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:ring-2 focus:ring-[#F0B22B] transition-all"
                                    placeholder="Nama sesuai identitas" required>
                            </div>

                            <div>
                                <label class="block text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-2 ml-1">Nomor WhatsApp</label>
                                <input type="text" name="no_hp"
                                    value="{{ old('no_hp', $lastOrder->no_hp ?? auth()->user()->no_hp) }}"
                                    class="w-full bg-[#090069] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:ring-2 focus:ring-[#F0B22B] transition-all"
                                    placeholder="Contoh: 0812xxxx" required>
                            </div>
                        </div>
                    </div>

                    {{-- FORM: METODE PEMBAYARAN --}}
                    <div class="bg-[#0c0c3d] rounded-2xl p-6 border border-white/5 reveal shadow-xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-[#F0B22B]/10 rounded-lg">
                                <svg class="w-5 h-5 text-[#F0B22B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            </div>
                            <h2 class="text-lg font-bold text-white uppercase tracking-wider">Metode Pembayaran</h2>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="relative group/select">
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="w-full bg-[#090069] border border-white/10 rounded-xl px-5 py-3.5 text-gray-200 text-sm focus:ring-2 focus:ring-[#F0B22B] appearance-none cursor-pointer transition-all duration-300 pr-12 group-hover/select:border-[#F0B22B]/30 shadow-inner"
                                    required>
                                    <option value="" disabled selected class="bg-[#0c0c3d]">Pilih cara pembayaran</option>
                                    <option value="tunai" {{ old('metode_pembayaran') === 'tunai' ? 'selected' : '' }} class="bg-[#0c0c3d]">Cash / Tunai di Toko</option>
                                    <option value="bca" {{ old('metode_pembayaran') === 'bca' ? 'selected' : '' }} class="bg-[#0c0c3d]">Transfer Bank (BCA)</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500 group-hover/select:text-[#F0B22B] transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            {{-- Info Tunai --}}
                            <div id="info_tunai_div" class="hidden bg-blue-500/5 border border-blue-500/20 rounded-xl p-4 animate-fade-in">
                                <div class="flex gap-3 text-blue-300">
                                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <p class="text-xs leading-relaxed">Silakan lakukan pembayaran langsung di kasir **Toko Serbu Computer** saat pengambilan barang. Pesanan akan dibatalkan otomatis jika tidak diambil dalam 1x24 jam.</p>
                                </div>
                            </div>

                            {{-- Info BCA & Upload --}}
                            <div id="info_bca_div" class="hidden space-y-4 animate-fade-in">
                                <div class="bg-blue-500/5 border border-blue-500/20 rounded-xl p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Rekening Tujuan</span>
                                        <span class="text-[#F0B22B] text-xs font-bold uppercase">BCA Personal</span>
                                    </div>
                                    <p class="text-white font-black text-lg tracking-widest">3660 2716 34</p>
                                    <p class="text-gray-400 text-xs">a.n Moch Agung Wibowo</p>
                                </div>

                                <div id="bukti_bayar_div">
                                    <label class="block text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-2 ml-1">Upload Bukti Transfer</label>
                                    <div class="relative group">
                                        <input type="file" name="bukti_bayar" id="bukti_input"
                                            class="w-full file:hidden bg-[#090069] border border-dashed border-white/20 rounded-xl px-4 py-8 text-center text-xs text-gray-400 cursor-pointer hover:border-[#F0B22B]/50 transition-all">
                                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none" id="file_label_container">
                                            <svg class="w-6 h-6 text-gray-500 mb-2 group-hover:text-[#F0B22B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                            <span id="file_name_display">Klik untuk pilih foto struk</span>
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-gray-500 mt-2 italic text-center">*Format JPG/PNG, Maksimal 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PESAN TAMBAHAN --}}
                    <div class="bg-[#0c0c3d] rounded-2xl p-6 border border-white/5 reveal shadow-xl">
                        <label class="block text-white font-bold uppercase tracking-wider text-sm mb-4">Catatan Pesanan (Opsional)</label>
                        <textarea name="pesan" rows="2"
                            class="w-full bg-[#090069] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:ring-2 focus:ring-[#F0B22B] transition-all resize-none"
                            placeholder="Contoh: 'Tolong siapkan nota fisik' atau 'Saya ambil sore hari'">{{ old('pesan') }}</textarea>
                    </div>
                </div>

                {{-- KOLOM KANAN: RINGKASAN --}}
                <div class="space-y-6">
                    {{-- CARD: PRODUK --}}
                    <div class="bg-[#0c0c3d] rounded-2xl p-5 border border-white/5 reveal shadow-xl overflow-hidden relative">
                        <div class="absolute top-0 right-0 p-3">
                            <span class="bg-[#F0B22B] text-black text-[9px] font-black px-2 py-0.5 rounded uppercase">{{ $product->category ?? 'Produk' }}</span>
                        </div>
                        
                        <h2 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Item Pesanan</h2>
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-20 bg-[#003A8F] rounded-xl overflow-hidden shrink-0 border border-white/5">
                                <img src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('images/placeholder.png') }}"
                                     alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-white font-bold text-sm truncate leading-tight mb-1">{{ $product->name }}</h3>
                                <p class="text-[#F0B22B] font-black text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- CARD: TOTAL --}}
                    <div class="bg-[#0c0c3d] rounded-2xl p-6 border border-[#F0B22B]/20 reveal shadow-2xl relative overflow-hidden">
                        {{-- Decorative background --}}
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#F0B22B]/5 rounded-full blur-2xl"></div>
                        
                        <h2 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">Ringkasan Biaya</h2>
                        
                        <div class="space-y-4">
                            {{-- Quantity Selector --}}
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400 text-xs font-bold uppercase">Jumlah</span>
                                <div class="flex items-center bg-[#090069] border border-white/10 rounded-lg p-1">
                                    <button type="button" onclick="decreaseQuantity()" class="w-8 h-8 text-white hover:text-[#F0B22B] transition-colors font-bold text-lg">−</button>
                                    <input type="number" id="quantity" name="qty" 
                                        value="{{ old('qty', request('quantity', 1)) }}" 
                                        min="1" max="{{ min($product->stock, 2) }}"
                                        class="w-10 bg-transparent text-center text-white font-black text-sm border-none focus:ring-0 appearance-none">
                                    <button type="button" onclick="increaseQuantity()" class="w-8 h-8 text-white hover:text-[#F0B22B] transition-colors font-bold text-lg">+</button>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-white/5 space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 text-xs">Harga Subtotal</span>
                                    <span class="text-white font-bold text-sm" id="subtotal_display">Rp 0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 text-xs">Biaya Layanan</span>
                                    <span class="text-green-400 font-bold text-sm uppercase text-[10px]">Gratis</span>
                                </div>
                                <div class="flex justify-between items-center pt-3 border-t border-white/10">
                                    <span class="text-white text-xs font-black uppercase tracking-tighter">Total Akhir</span>
                                    <span id="total_harga" class="text-[#F0B22B] font-black text-xl tracking-tight">Rp 0</span>
                                </div>
                            </div>
                        </div>

                        {{-- TOMBOL SUBMIT --}}
                        <button type="submit" 
                                class="w-full mt-8 bg-[#F0B22B] hover:bg-white text-black font-black py-4 rounded-xl transition-all duration-500 shadow-[0_10px_30px_rgba(240,178,43,0.2)] hover:shadow-[0_15px_35px_rgba(240,178,43,0.3)] text-sm uppercase tracking-widest transform hover:-translate-y-1">
                            Konfirmasi
                        </button>
                    </div>

                    {{-- Keamanan --}}
                    <div class="flex items-center justify-center gap-2 text-gray-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 4.925-3.367 8.684-9.031 10.956L10 18l-.969-.043C3.367 15.684 0 11.925 0 7.001c0-.681.056-1.35.166-2.002zm3.333 4.89l3.098 3.097L15.42 6.5l-1.06-1.06-5.773 5.774-2.038-2.038-1.06 1.06z" clip-rule="evenodd"/></svg>
                        <span class="text-[10px] font-bold uppercase tracking-widest">Transaksi Aman & Terenkripsi</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Tombol Kembali Floating --}}
<a href="{{ route('shop.show', $product->id) }}"
   class="fixed bottom-6 left-6 z-50 inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#0c0c3d]/90 backdrop-blur-md border border-white/10 text-xs font-bold text-gray-300 shadow-2xl hover:text-[#F0B22B] transition-all">
    ← BATALKAN
</a>

<style>
    @keyframes fade-in { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fade-in 0.4s ease-out forwards; }
    input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('metode_pembayaran');
        const infoTunaiDiv = document.getElementById('info_tunai_div');
        const infoBcaDiv = document.getElementById('info_bca_div');
        const qtyInput = document.getElementById('quantity');
        const fileInput = document.getElementById('bukti_input');
        const fileNameDisplay = document.getElementById('file_name_display');

        // Logic Toggle Metode Pembayaran
        select.addEventListener('change', () => {
            infoTunaiDiv.classList.add('hidden');
            infoBcaDiv.classList.add('hidden');
            
            if(select.value === 'bca') infoBcaDiv.classList.remove('hidden');
            if(select.value === 'tunai') infoTunaiDiv.classList.remove('hidden');
        });

        // Styling File Input
        fileInput.addEventListener('change', (e) => {
            const name = e.target.files[0]?.name || 'Klik untuk pilih foto struk';
            fileNameDisplay.textContent = name;
            fileNameDisplay.classList.add('text-[#F0B22B]', 'font-bold');
        });

        // Quantity & Price Logic
        window.updatePrice = function() {
            const qty = parseInt(qtyInput.value) || 1;
            const price = {{ $product->price }};
            const total = qty * price;
            
            const formatter = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });
            
            document.getElementById('subtotal_display').textContent = formatter.format(total);
            document.getElementById('total_harga').textContent = formatter.format(total);
        };

        window.increaseQuantity = function() {
            if (parseInt(qtyInput.value) < parseInt(qtyInput.max)) {
                qtyInput.value = parseInt(qtyInput.value) + 1;
                updatePrice();
            }
        };

        window.decreaseQuantity = function() {
            if (parseInt(qtyInput.value) > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
                updatePrice();
            }
        };

        // Scroll Reveal
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        
        updatePrice(); // Init price
    });
</script>
@endsection