<header class="bg-[#090069] px-4 sm:px-6 md:px-16 py-3 sm:py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- LOGO -->
        <a href="{{ route('home') }}" class="flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" 
                 alt="Serbu Comp" 
                 class="h-8 sm:h-10">
        </a>

        <!-- DESKTOP MENU -->
        <nav class="hidden md:flex gap-8 text-sm font-semibold text-[#F0B22B]">
            <a href="{{ route('home') }}" 
               class="hover:text-white transition-colors duration-200">
                Beranda
            </a>
            <a href="{{ route('shop.index') }}" 
               class="hover:text-white transition-colors duration-200">
                Produk
            </a>
            <a href="{{ route('pages.about') }}" 
               class="hover:text-white transition-colors duration-200">
                Tentang Kami
            </a>
        </nav>

        <!-- DESKTOP BUTTONS -->
        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('login') }}"
               class="bg-[#F0B22B] text-black font-semibold px-4 sm:px-5 py-1.5 sm:py-2 rounded-full
                      hover:bg-white hover:scale-105 transition-all duration-200 text-xs sm:text-sm">
                Masuk
            </a>
            <a href="{{ route('register') }}"
               class="border border-white text-white font-semibold px-4 sm:px-5 py-1.5 sm:py-2 rounded-full
                      hover:bg-white hover:text-[#090069] transition-all duration-200 text-xs sm:text-sm">
                Daftar
            </a>
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
                <a href="{{ route('home') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Beranda
                </a>
                <a href="{{ route('shop.index') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Produk
                </a>
                <a href="{{ route('pages.about') }}" 
                   class="block text-white hover:text-[#F0B22B] py-2">
                    Tentang Kami
                </a>
            </nav>

            <div class="p-4 border-t border-white/20 space-y-3">
                <a href="{{ route('login') }}"
                   class="block bg-[#F0B22B] text-black font-semibold px-4 py-2 rounded-full text-center">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="block border border-white text-white font-semibold px-4 py-2 rounded-full text-center">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</header>

<script>
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
    }
</script>