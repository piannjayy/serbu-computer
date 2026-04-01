@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')

{{-- Header dengan animasi --}}
<div class="mb-10 reveal-anim" style="animation-delay: 0.1s">
    <h2 class="text-white text-2xl font-bold">Admin Dashboard Overview</h2>
    <p class="text-gray-400 mt-2">Welcome back! Here is a summary of Serbu Comp's store performance today.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    
    {{-- Total User --}}
    <a href="{{ route('admin.users.index') }}" class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-white/10 hover:shadow-xl hover:scale-[1.03] transition-all duration-300 group" style="animation-delay: 0.2s">
        <div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Member</p>
            <h3 class="text-3xl font-bold text-[#090069] mt-1">{{ $totalUsers }}</h3>
        </div>
        <div class="bg-[#F0B22B]/10 p-3 rounded-2xl group-hover:bg-[#F0B22B]/20 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F0B22B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
    </a>

    {{-- Total Product --}}
    <a href="{{ route('admin.products.index') }}" class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-white/10 hover:shadow-xl hover:scale-[1.03] transition-all duration-300 group" style="animation-delay: 0.3s">
        <div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Product</p>
            <h3 class="text-3xl font-bold text-[#090069] mt-1">{{ $totalProducts }}</h3>
        </div>
        <div class="bg-[#F0B22B]/10 p-3 rounded-2xl group-hover:bg-[#F0B22B]/20 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F0B22B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
    </a>

    {{-- Total Transaction --}}
    <a href="{{ route('admin.orders.index') }}" class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-white/10 hover:shadow-xl hover:scale-[1.03] transition-all duration-300 group" style="animation-delay: 0.4s">
        <div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Transaction</p>
            <h3 class="text-3xl font-bold text-[#090069] mt-1">{{ $totalOrders }}</h3>
        </div>
        <div class="bg-[#F0B22B]/10 p-3 rounded-2xl group-hover:bg-[#F0B22B]/20 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F0B22B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
            </svg>
        </div>
    </a>

    {{-- Revenue --}}
    <a href="{{ route('admin.orders.index') }}" class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-white/10 hover:shadow-xl hover:scale-[1.03] transition-all duration-300 group" style="animation-delay: 0.5s">
        <div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Revenue</p>
            <h3 class="text-2xl font-bold text-[#090069] mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-[#F0B22B]/10 p-3 rounded-2xl group-hover:bg-[#F0B22B]/20 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F0B22B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
    </a>

    {{-- Revenue Today --}}
<a href="{{ route('admin.orders.index') }}" 
   class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-white/10 hover:shadow-xl hover:scale-[1.03] transition-all duration-300 group" 
   style="animation-delay: 0.55s">

    <div>
        <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">
            Revenue Today
        </p>
        <h3 class="text-2xl font-bold text-green-600 mt-1">
            Rp {{ number_format($todayRevenue, 0, ',', '.') }}
        </h3>
    </div>

    <div class="bg-green-100 p-3 rounded-2xl group-hover:bg-green-200 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-8 h-8 text-green-600" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor" 
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 
                     3 .895 3 2-1.343 2-3 2m0-8V7m0 1v8m0 0v1m0-1
                     c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 
                     11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>
</a>

    {{-- Pending Orders (Kondisional dengan Hover Spesifik) --}}
    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" 
    class="reveal-anim bg-white p-6 rounded-[24px] shadow-sm flex items-center justify-between border border-gray-50 transition-all duration-500 group hover:scale-[1.02] {{ $pendingOrders > 0 ? 'hover:border-red-200 hover:shadow-lg hover:shadow-red-500/5' : 'hover:shadow-lg hover:border-gray-200' }}" 
    style="animation-delay: 0.6s">
    
    <div>
        <p class="text-gray-400 text-sm font-medium uppercase tracking-wider group-hover:text-gray-500 transition-colors">Pending Orders</p>
        <h3 class="text-3xl font-bold mt-1 {{ $pendingOrders > 0 ? 'text-red-500' : 'text-[#090069]' }}">
            {{ $pendingOrders }}
        </h3>

        @if($pendingOrders > 0)
            <p class="text-[10px] text-red-400/40 font-bold mt-1 uppercase tracking-tighter group-hover:text-red-500/70 transition-colors italic">
                *Immediate action required
            </p>
        @endif
    </div>

    <div class="{{ $pendingOrders > 0 ? 'bg-red-50 text-red-400 group-hover:bg-red-500 group-hover:text-white' : 'bg-[#F0B22B]/5 text-[#F0B22B] group-hover:bg-[#F0B22B] group-hover:text-white' }} p-3 rounded-2xl transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>
</a>

    {{-- Quick Action --}}
    <a href="{{ route('admin.products.index') }}" 
       class="reveal-anim bg-[#F0B22B] p-6 rounded-[24px] shadow-lg flex items-center justify-between hover:scale-[1.05] hover:shadow-[#F0B22B]/40 active:scale-[0.98] transition-all duration-300 cursor-pointer group" style="animation-delay: 0.7s">
        <div>
            <p class="text-[#090069]/60 text-sm font-bold uppercase tracking-wider">Quick Action</p>
            <h3 class="text-xl font-extrabold text-[#090069] mt-1">Manage Products</h3>
        </div>
        <div class="bg-white/20 p-3 rounded-2xl group-hover:bg-white/40 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#090069]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </div>
    </a>

</div>

<style>
    @keyframes cardFadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .reveal-anim {
        opacity: 0;
        animation: cardFadeIn 0.5s ease-out forwards;
    }
</style>
@endsection