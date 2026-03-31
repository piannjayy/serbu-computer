<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Serbu Comp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            background: radial-gradient(circle, #090069 0%, #0000FF 100%);
        }
        .register-card {
            background-color: #161B33;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 py-12">

    <div class="relative w-full max-w-[450px]">
        <div class="absolute -top-12 left-1/2 -translate-x-1/2 z-10">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-36 drop-shadow-xl">
        </div>

        <div class="register-card rounded-[24px] px-8 pt-16 pb-10 shadow-2xl border border-white/5">
            
            <div class="text-center mb-8">
                <h1 class="text-xl font-semibold tracking-tight">
                    <span class="text-white">Masukkan</span>
                    <span class="text-[#F0B22B]">Informasi Pribadi</span>
                </h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-500/10 border-l-4 border-red-500 text-red-400 text-[12px] p-3 rounded mb-6">
                    <ul class="list-disc ml-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-3">
                @csrf
                
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required
                           class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">
                    
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" required
                           class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">
                </div>

                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                       class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">

                <div class="grid grid-cols-2 gap-3">
                    <input type="text" 
                           name="tanggal_lahir" 
                           value="{{ old('tanggal_lahir') }}" 
                           placeholder="Tanggal Lahir"
                           onfocus="(this.type='date'); this.showPicker()"
                           onblur="if(!this.value) this.type='text'"
                           class="w-full bg-[#2A314D]/50 text-gray-500 text-sm px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">

                    <select name="jenis_kelamin"
                            class="w-full bg-[#2A314D]/50 text-gray-500 text-sm px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">
                        <option value="" disabled {{ old('jenis_kelamin') == '' ? 'selected' : '' }} hidden>Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="No HP "
                       class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">

                <textarea name="alamat" placeholder="Alamat Lengkap" rows="2"
                          class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all resize-none">{{ old('alamat') }}</textarea>

                <div class="grid grid-cols-2 gap-3">
                    <div class="relative group">
                        <input type="password" id="reg-pass" name="password" placeholder="Password" required
                               class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 pr-10 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">
                        <button type="button" onclick="toggleRegPassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-[#F0B22B]">
                            <i id="eye-icon-1" data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                    
                    <div class="relative group">
                        <input type="password" id="reg-confirm" name="password_confirmation" placeholder="Confirm" required
                               class="w-full bg-[#2A314D]/50 text-gray-300 text-sm placeholder-gray-500 px-4 py-3 pr-10 rounded-xl border border-white/5 focus:border-[#F0B22B]/50 focus:outline-none transition-all">
                        <button type="button" onclick="toggleRegPassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-[#F0B22B]">
                            <i id="eye-icon-2" data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-[#B8860B] to-[#F0B22B] text-white text-sm font-bold py-3.5 rounded-xl shadow-lg hover:brightness-110 active:scale-[0.98] transition-all uppercase tracking-wide mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <div class="text-center mt-6">
                <p class="text-gray-400 text-[13px]">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-[#F0B22B] hover:text-white transition-colors font-medium ml-1">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
        let regTimer;

        function toggleRegPassword() {
            const pass = document.getElementById('reg-pass');
            const confirm = document.getElementById('reg-confirm');
            const icon1 = document.getElementById('eye-icon-1');
            const icon2 = document.getElementById('eye-icon-2');
            
            clearTimeout(regTimer);

            if (pass.type === 'password') {
                // Tampilkan keduanya
                pass.type = 'text';
                confirm.type = 'text';
                icon1.setAttribute('data-lucide', 'eye-off');
                icon2.setAttribute('data-lucide', 'eye-off');
                lucide.createIcons();

                regTimer = setTimeout(() => {
                    hideRegPassword();
                }, 3000);
            } else {
                hideRegPassword();
            }
        }

        function hideRegPassword() {
            const pass = document.getElementById('reg-pass');
            const confirm = document.getElementById('reg-confirm');
            const icon1 = document.getElementById('eye-icon-1');
            const icon2 = document.getElementById('eye-icon-2');
            
            pass.type = 'password';
            confirm.type = 'password';
            icon1.setAttribute('data-lucide', 'eye');
            icon2.setAttribute('data-lucide', 'eye');
            lucide.createIcons();
        }
    </script>
</body>
</html>