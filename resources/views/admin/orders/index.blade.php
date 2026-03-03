@extends('layouts.admin')

@section('page_title', 'Transaction Management')

@section('content')
    <div class="space-y-8 px-4 md:px-0 pb-12">

        {{-- BARIS 1: JUDUL & HEADER --}}
        <div class="reveal-anim" style="animation-delay: 0.1s">
            <h2 class="text-white text-2xl font-bold tracking-tight">Transaction Management</h2>
            <p class="text-gray-400 text-sm mt-1 uppercase tracking-widest">
                Monitoring Real-time Data Transaksi Member
            </p>
        </div>

        {{-- BARIS 2: SEARCH, SHOW PER PAGE & BUTTON --}}
        <div class="reveal-anim flex flex-col lg:flex-row items-center justify-between gap-4 bg-white/5 p-4 rounded-[28px] border border-white/10 shadow-2xl backdrop-blur-md"
            style="animation-delay: 0.2s">

            {{-- FORM FILTER --}}
            <form method="GET" action="{{ route('admin.orders.index') }}"
                class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                {{-- SELECT SHOW PER PAGE --}}
                <select name="per_page" onchange="this.form.submit()"
                    class="bg-[#090069] border border-white/10 rounded-xl px-3 py-2.5 text-sm text-white focus:border-[#F0B22B] focus:outline-none transition-all cursor-pointer w-full sm:w-auto">
                    <option value="6" {{ request('per_page') == 6 ? 'selected' : '' }}>Show 6</option>
                    <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>Show 12</option>
                    <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>Show 24</option>
                </select>

                {{-- SEARCH INPUT --}}
                <div class="relative w-full sm:w-80">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search Transaction ID or Product..."
                        class="w-full bg-[#090069] border border-white/10 rounded-xl pl-10 pr-4 py-2.5 text-sm text-white focus:border-[#F0B22B] focus:outline-none transition-all">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                </div>
            </form>

            <div class="flex flex-wrap items-center justify-center gap-4 w-full lg:w-auto">
                {{-- TOTAL INFO --}}
                <div class="flex items-center gap-3 bg-[#F0B22B]/10 px-4 py-2 rounded-xl border border-[#F0B22B]/20">
                    <span class="w-2 h-2 rounded-full bg-[#F0B22B] animate-pulse"></span>
                    <span class="text-[#F0B22B] text-xs font-bold uppercase tracking-wider">
                        {{ $orders->total() }} Orders
                    </span>
                </div>

                {{-- TOMBOL TAMBAH --}}
                <a href="{{ route('admin.orders.create') }}"
                    class="flex items-center gap-2 bg-[#F0B22B] text-[#090069] font-black uppercase text-[10px] tracking-widest px-6 py-2.5 rounded-xl hover:scale-105 active:scale-95 transition-all shadow-lg shadow-[#F0B22B]/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    New Transaction
                </a>
            </div>
        </div>

        {{-- GRID CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 reveal-anim" style="animation-delay: 0.3s">
            @forelse ($orders as $index => $order)
                <div class="row-anim group relative bg-[#111827]/40 backdrop-blur-md rounded-[50px] border border-white/5 p-8 hover:border-[#F0B22B]/30 transition-all duration-500 hover:-translate-y-2"
                    style="animation-delay: {{ 0.4 + $index * 0.05 }}s">

                    {{-- Header Card --}}
                    <div class="flex items-center justify-between mb-8">
                        <div class="bg-white/5 px-4 py-2 rounded-full border border-white/10">
                            <span
                                class="text-gray-400 text-[10px] font-black tracking-widest italic uppercase">#{{ $order->id }}</span>
                        </div>

                        @php
                            $statusConfig = match ($order->status) {
                                'selesai' => [
                                    'label' => 'COMPLETED',
                                    'color' => 'text-green-400',
                                    'bg' => 'bg-green-500/10',
                                    'border' => 'border-green-500/20',
                                ],
                                'menunggu_verifikasi' => [
                                    'label' => 'VERIFYING',
                                    'color' => 'text-blue-400',
                                    'bg' => 'bg-blue-500/10',
                                    'border' => 'border-blue-500/20',
                                ],
                                'menunggu_pembayaran_tunai' => [
                                    'label' => 'PENDING CASH',
                                    'color' => 'text-yellow-400',
                                    'bg' => 'bg-yellow-500/10',
                                    'border' => 'border-yellow-500/20',
                                ],
                                'dibatalkan' => [
                                    'label' => 'CANCELLED',
                                    'color' => 'text-red-400',
                                    'bg' => 'bg-red-500/10',
                                    'border' => 'border-red-500/20',
                                ],
                                default => [
                                    'label' => 'UNKNOWN',
                                    'color' => 'text-gray-400',
                                    'bg' => 'bg-gray-500/10',
                                    'border' => 'border-gray-500/20',
                                ],
                            };
                        @endphp
                        <div
                            class="flex items-center gap-2 {{ $statusConfig['bg'] }} {{ $statusConfig['color'] }} {{ $statusConfig['border'] }} border px-4 py-2 rounded-full">
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-current opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-current"></span>
                            </span>
                            <span class="text-[9px] font-black tracking-[0.2em]">{{ $statusConfig['label'] }}</span>
                        </div>
                    </div>

                    {{-- Price Display --}}
                    <div class="mb-8">
                        <div class="flex flex-col">
                            <span
                                class="text-[#F0B22B] text-[10px] font-black uppercase tracking-[0.3em] mb-1 opacity-80">Total
                                Payment</span>
                            <h2
                                class="text-white text-2xl font-black italic tracking-tighter leading-none group-hover:scale-105 transition-transform duration-500 origin-left">
                                <span
                                    class="text-xl mr-1 not-italic opacity-50 font-bold">Rp</span>{{ number_format($order->total_harga, 0, ',', '.') }}
                            </h2>
                        </div>

                        <div class="mt-6 space-y-2">
                            <h3
                                class="text-gray-200 text-lg font-black leading-tight line-clamp-1 italic group-hover:text-[#F0B22B] transition-colors">
                                {{ $order->nama_produk }}
                            </h3>
                            <div class="flex items-center gap-3">
                                <span
                                    class="text-gray-500 text-[10px] font-black tracking-widest uppercase">{{ $order->qty }}
                                    Units</span>
                                <div class="w-1 h-1 rounded-full bg-white/20"></div>
                                <span
                                    class="text-gray-500 text-[10px] font-black tracking-widest uppercase italic">{{ str_replace('_', ' ', $order->metode_pembayaran) }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- User Info --}}
                    <div class="flex items-center gap-4 p-5 bg-white/[0.03] rounded-[30px] border border-white/5 mb-8 hover:bg-white/[0.08] transition-all cursor-pointer group/user"
                        onclick='showUserDetail(@json($order->user))'>
                        <div class="relative">
                            <img src="{{ $order->user && $order->user->foto ? asset('storage/foto/' . $order->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($order->user->nama ?? 'G') . '&background=F0B22B&color=090069' }}"
                                class="w-14 h-14 rounded-2xl object-cover border-2 border-white/10 group-hover/user:border-[#F0B22B] transition-all duration-500">
                            <div
                                class="absolute -bottom-1 -right-1 bg-green-500 w-4 h-4 rounded-full border-4 border-[#111827]">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-white text-sm font-black truncate tracking-wide">
                                {{ $order->user->nama ?? 'Guest' }}</p>
                            <p class="text-gray-500 text-[10px] font-bold truncate tracking-widest uppercase opacity-70">
                                {{ $order->user->email ?? 'N/A' }}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="#F0B22B" stroke-width="3"
                            class="opacity-0 group-hover/user:opacity-100 transition-all -translate-x-4 group-hover/user:translate-x-0">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-4">
                        @if ($order->bukti_bayar)
                            <button onclick="toggleImage('{{ asset('storage/' . $order->bukti_bayar) }}')"
                                class="flex-1 flex items-center justify-center gap-3 bg-white/5 hover:bg-white/10 text-white py-4 rounded-2xl border border-white/10 transition-all active:scale-95 group/btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="#F0B22B" stroke-width="2.5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span class="text-[10px] font-black uppercase tracking-[0.2em]">Proof</span>
                            </button>
                        @else
                            <div
                                class="flex-1 flex items-center justify-center gap-3 bg-white/5 opacity-30 text-gray-500 py-4 rounded-2xl border border-white/5 italic">
                                <span class="text-[10px] font-black uppercase tracking-widest">No Proof</span>
                            </div>
                        @endif

                        {{-- TOMBOL UPDATE STATUS LANGSUNG --}}
                        @if ($order->status !== 'selesai' && $order->status !== 'dibatalkan')
                            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" name="status" value="selesai"
                                    class="w-full flex items-center justify-center gap-3 bg-[#F0B22B] hover:bg-[#ffc13b] text-[#090069] py-4 rounded-2xl transition-all shadow-lg shadow-[#F0B22B]/20 active:scale-95">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em]">Complete</span>
                                </button>
                            </form>
                        @else
                            <div
                                class="flex-1 flex items-center justify-center gap-3 bg-white/5 text-gray-500/50 py-4 rounded-2xl border border-white/5 cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span class="text-[10px] font-black uppercase tracking-widest">Locked</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div
                        class="inline-block p-16 bg-white/5 rounded-[60px] border border-white/5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#F0B22B]/5 to-transparent"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1"
                            class="mx-auto text-gray-700 mb-6 opacity-30">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <p class="text-gray-500 font-black uppercase tracking-[0.5em] text-sm relative z-10">No
                            Transactions Found</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($orders->hasPages())
            <div class="mt-20 flex justify-center custom-pagination reveal-anim" style="animation-delay: 0.8s">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL USER --}}
    <div id="userModal" class="fixed inset-0 z-[9999] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-[#090069]/95 backdrop-blur-2xl" onclick="closeModal()"></div>
        <div class="bg-[#161B33] border border-white/10 w-full max-w-xl rounded-[60px] p-10 md:p-14 relative z-10 shadow-2xl transform transition-all duration-500 scale-90 opacity-0"
            id="modalContent">
            <button onclick="closeModal()"
                class="absolute top-12 right-12 text-gray-500 hover:text-[#F0B22B] transition-all hover:rotate-90">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="3">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="flex flex-col items-center text-center">
                <div class="relative mb-8">
                    <div class="absolute -inset-6 bg-[#F0B22B] rounded-full blur-3xl opacity-20"></div>
                    <img id="modalFoto" src=""
                        class="relative w-40 h-40 rounded-[45px] border-4 border-[#F0B22B]/20 object-cover shadow-2xl">
                </div>
                <h2 id="modalNama" class="text-white text-3xl font-black mb-2 tracking-tight"></h2>
                <p id="modalUsername"
                    class="text-[#F0B22B] text-sm font-black italic mb-12 tracking-[0.2em] uppercase opacity-80"></p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 w-full">
                    <div class="bg-white/5 p-6 rounded-[30px] border border-white/5 text-left">
                        <p class="text-[#F0B22B] text-[10px] font-black uppercase tracking-widest mb-2 opacity-50">E-Mail
                        </p>
                        <p id="modalEmail" class="text-white text-sm font-black truncate"></p>
                    </div>
                    <div class="bg-white/5 p-6 rounded-[30px] border border-white/5 text-left">
                        <p class="text-[#F0B22B] text-[10px] font-black uppercase tracking-widest mb-2 opacity-50">WhatsApp
                        </p>
                        <p id="modalNoHp" class="text-white text-sm font-black"></p>
                    </div>
                </div>
                <div class="w-full mt-5 bg-white/5 p-6 rounded-[30px] border border-white/5 text-left">
                    <p class="text-[#F0B22B] text-[10px] font-black uppercase tracking-widest mb-2 opacity-50">Resident
                        Address</p>
                    <p id="modalAlamat" class="text-white text-sm font-bold italic leading-relaxed"></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* PAGINATION OVERRIDE */
        .custom-pagination nav { background: transparent !important; border: none !important; box-shadow: none !important; }
        .custom-pagination nav>div.hidden>div:first-child { display: none !important; }
        .custom-pagination nav>div.hidden>div:last-child { background: transparent !important; width: 100%; display: flex; justify-content: center; }
        .custom-pagination nav span.relative { background: transparent !important; border: none !important; }
        
        .custom-pagination nav span.relative>span,
        .custom-pagination nav span.relative>a,
        .custom-pagination nav>div:first-child>a,
        .custom-pagination nav>div:first-child>span {
            border-radius: 12px !important;
            background: rgba(255, 255, 255, 0.03) !important;
            color: #6b7280 !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 8px 14px !important;
            font-size: 11px !important;
            font-weight: 800 !important;
            margin: 0 2px !important;
            transition: all 0.3s ease !important;
        }

        .custom-pagination nav span.relative>a:hover { background: rgba(240, 178, 43, 0.1) !important; color: #F0B22B !important; border-color: #F0B22B !important; }
        .custom-pagination nav span[aria-current="page"]>span { background: #F0B22B !important; color: #090069 !important; border-color: #F0B22B !important; }

        /* ANIMATIONS */
        @keyframes slideDownFade { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        .reveal-anim { opacity: 0; animation: slideDownFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .row-anim { opacity: 0; animation: slideInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .img-overlay {
            position: fixed; inset: 0; background: rgba(9, 0, 105, 0.98); backdrop-filter: blur(25px);
            z-index: 99999; display: flex; align-items: center; justify-content: center; cursor: zoom-out;
        }
        .img-overlay img { max-width: 90%; max-height: 85%; border-radius: 40px; border: 4px solid #F0B22B; }
    </style>

    <script>
        function showUserDetail(user) {
            if (!user) return;
            document.getElementById('modalNama').innerText = user.nama;
            document.getElementById('modalUsername').innerText = '@' + user.username;
            document.getElementById('modalEmail').innerText = user.email;
            document.getElementById('modalNoHp').innerText = user.no_hp || 'NO CONTACT';
            document.getElementById('modalAlamat').innerText = user.alamat || 'Address data is not complete.';
            const fotoUrl = user.foto ? `/storage/foto/${user.foto}` :
                `https://ui-avatars.com/api/?name=${encodeURIComponent(user.nama)}&background=F0B22B&color=090069`;
            document.getElementById('modalFoto').src = fotoUrl;
            const modal = document.getElementById('userModal');
            const content = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-90', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('userModal');
            const content = document.getElementById('modalContent');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 400);
        }

        function toggleImage(src) {
            const overlay = document.createElement('div');
            overlay.className = 'img-overlay';
            overlay.innerHTML = `<img src="${src}" class="reveal-anim shadow-2xl">`;
            overlay.onclick = () => overlay.remove();
            document.body.appendChild(overlay);
        }
    </script>
@endsection