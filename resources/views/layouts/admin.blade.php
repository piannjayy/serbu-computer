<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Serbu Comp</title>
    <link rel="icon" type="image/png" href="{{ asset('images/iconsc.png') }}">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #090069; margin: 0; }
        .main-container { background-color: #111161; border-top-left-radius: 0px; }
        @media (max-width: 1024px) { .main-container { border-top-left-radius: 0; } }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" 
         x-cloak
         @click="sidebarOpen = false" 
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[40] lg:hidden transition-opacity">
    </div>

    <aside 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed lg:static inset-y-0 left-0 w-64 bg-[#090069] text-white flex flex-col h-screen border-r border-white/5 z-[50] transition-transform duration-300 ease-in-out lg:translate-x-0">
        
        @include('partials.sidebar-admin')
    </aside>

    <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">
        
        <div class="lg:hidden flex items-center px-6 py-4 bg-[#090069]">
            <button @click="sidebarOpen = true" class="text-[#F0B22B]">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
            <span class="ml-4 text-white font-bold uppercase tracking-widest text-sm">Serbu Comp Admin</span>
        </div>

        <main class="main-container flex-1 overflow-y-auto p-6 md:p-10 shadow-2xl">
            @yield('content')
        </main>
    </div>

</body>
</html>