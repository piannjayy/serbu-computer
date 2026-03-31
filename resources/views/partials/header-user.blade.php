<header class="bg-[#090069] px-4 sm:px-6 md:px-16 py-3 sm:py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- LOGO -->
        <a href="{{ route('dashboard') }}" class="flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" 
                 alt="Serbu Comp" 
                 class="h-8 sm:h-10">
        </a>

        <!-- DESKTOP MENU -->
        <nav class="hidden md:flex gap-8 text-sm font-semibold text-[#F0B22B]">
            <a href="{{ route('dashboard') }}" 
               class="hover:text-white transition-colors duration-200">
                Dashboard
            </a>
            <a href="{{ route('shop.index') }}" 
               class="hover:text-white transition-colors duration-200">
                Produk
            </a>
            <a href="{{ route('riwayat.index') }}" 
               class="hover:text-white transition-colors duration-200">
                Riwayat
            </a>
            <a href="{{ route('pages.about') }}" 
               class="hover:text-white transition-colors duration-200">
                Tentang Kami
            </a>
        </nav>

        <!-- DESKTOP ICONS -->
        <div class="hidden md:flex items-center gap-4">

            <!-- Wishlist / Favorite -->
<a href="{{ route('wishlist.index') }}"
   class="text-[#F0B22B] hover:text-white transition-colors duration-200">
    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 24 24"
         fill="currentColor"
         class="w-5 h-5 sm:w-6 sm:h-6">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                 2 5.42 4.42 3 7.5 3
                 9.24 3 10.91 3.81 12 5.08
                 13.09 3.81 14.76 3 16.5 3
                 19.58 3 22 5.42 22 8.5
                 22 12.28 18.6 15.36 13.45 20.04
                 L12 21.35z"/>
    </svg>
</a>

            <!-- User Dropdown -->
            <div class="relative">
    <button id="desktopUserBtn" 
            class="text-[#F0B22B] hover:text-white transition-colors duration-200 focus:outline-none flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-5 h-5 sm:w-6 sm:h-6" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor" 
             stroke-width="2">
            <circle cx="12" cy="7" r="4"/>
            <path d="M5.5 21a6.5 6.5 0 0 1 13 0"/>
        </svg>
    </button>

    <div id="desktopUserMenu"
         class="hidden absolute right-0 mt-3 w-48 bg-[#090069] text-white 
                rounded-xl shadow-2xl z-50 border border-white/10 overflow-hidden 
                transition-all duration-300">
        
        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 px-4 py-3 text-sm hover:bg-[#F0B22B] hover:text-[#090069] transition-colors duration-200 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F0B22B] group-hover:text-[#090069]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>Profil</span>
        </a>

        <div class="h-[1px] bg-white/10 mx-2"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-400 hover:bg-red-500 hover:text-white transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="font-semibold">Keluar</span>
            </button>
        </form>
    </div>
</div>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <button id="mobileMenuBtn" class="md:hidden text-[#F0B22B]">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-6 h-6" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor" 
                 stroke-width="2">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- MOBILE MENU OVERLAY -->
        <div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu" 
             class="fixed top-0 right-0 h-full w-64 bg-[#090069] transform translate-x-full 
                    transition-transform duration-300 z-50 md:hidden">
            
            <div class="p-4 border-b border-white/20 flex justify-between items-center">
                <span class="text-[#F0B22B] font-bold">Menu</span>
                <button id="closeMenu" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="p-4 space-y-4">
                <a href="{{ route('dashboard') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Dashboard
                </a>
                <a href="{{ route('shop.index') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Produk
                </a>
                <a href="{{ route('riwayat.index') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Riwayat
                </a>
                <a href="{{ route('pages.about') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Tentang Kami
                </a>

                <hr class="border-white/10 my-2">

                {{-- Wishlist Mobile --}}
                <a href="{{ route('wishlist.index') }}"
                   class="flex items-center gap-3 text-white hover:text-[#F0B22B] py-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3 9.24 3 10.91 3.81 12 5.08 13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5 22 12.28 18.6 15.36 13.45 20.04 L12 21.35z"/>
                    </svg>
                    <span>Wishlist</span>
                </a>

                {{-- Profile Mobile --}}
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center gap-3 text-white hover:text-[#F0B22B] py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M5.5 21a6.5 6.5 0 0 1 13 0"/>
                    </svg>
                    <span>Profil</span>
                </a>
            </nav>

            {{-- Logout Mobile --}}
<div class="p-4 border-t border-white/20">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="flex items-center justify-center gap-4 w-full px-4 py-3.5 text-[#F0B22B] bg-white/5 hover:bg-red-500 hover:text-white rounded-2xl transition-all duration-300 font-black italic uppercase text-sm tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/>
            </svg>
            <span>Keluar</span>
        </button>
    </form>
</div>
        </div>
    </div>
</header>

<script>
    // Desktop User Dropdown
    const desktopUserBtn = document.getElementById('desktopUserBtn');
    const desktopUserMenu = document.getElementById('desktopUserMenu');

    if (desktopUserBtn) {
        desktopUserBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            desktopUserMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', () => {
            desktopUserMenu.classList.add('hidden');
        });
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    function openMenu() {
        mobileOverlay.classList.remove('hidden');
        mobileMenu.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
    }

    function closeMenuFunc() {
        mobileOverlay.classList.add('hidden');
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = '';
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenu.addEventListener('click', closeMenuFunc);
        mobileOverlay.addEventListener('click', closeMenuFunc);
        
        // Close menu when clicking links
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenuFunc);
        });
    }
</script>