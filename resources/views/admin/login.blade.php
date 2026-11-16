<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Admin Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FAF7F0] min-h-screen flex items-center justify-center p-4 text-[#2C1A11] antialiased selection:bg-[#F3E5C8] selection:text-[#3D251A]">
    <div class="max-w-md w-full bg-[#FFFDF9] p-8 md:p-10 rounded-[32px] shadow-[0_20px_50px_rgba(44,26,17,0.08),0_4px_0_#E0D9CE] border border-[#E2DDD5]">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-12 h-12 mx-auto rounded-2xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF9A28] text-white flex items-center justify-center font-serif font-black text-2xl shadow-[0_3px_0_#1D120B] border border-white/30 mb-3">
                M
            </div>
            <h1 class="text-2xl font-serif font-black text-[#2C1A11]">Mey Bakery.</h1>
            <p class="text-[11px] uppercase tracking-[0.2em] text-[#8C7D70] font-extrabold mt-1">Management Portal</p>
        </div>

        @if($errors->any())
            <div class="p-3.5 mb-5 text-xs text-rose-700 bg-rose-50 border border-rose-200 rounded-2xl flex items-center gap-2">
                <span class="font-bold">✕</span>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('login.post', [], false) }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Email Input -->
            <div>
                <label class="block text-xs uppercase tracking-wider font-bold text-[#5A524A] mb-1.5">Email Administrator</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@toko.com"
                    class="w-full bg-[#F1EDE6] border border-[#DDD5C8] rounded-xl px-4 py-2.5 text-xs text-[#2C1A11] placeholder-[#8C7D70] focus:bg-[#FFFDF9] focus:border-[#DF9A28] outline-none transition shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]">
            </div>

            <!-- Password Input dengan Toggle Lihat Sandi -->
            <div>
                <label class="block text-xs uppercase tracking-wider font-bold text-[#5A524A] mb-1.5">Password</label>
                <div class="relative">
                    <input type="password" id="passwordInput" name="password" required placeholder="••••••••"
                        class="w-full bg-[#F1EDE6] border border-[#DDD5C8] rounded-xl pl-4 pr-11 py-2.5 text-xs text-[#2C1A11] placeholder-[#8C7D70] focus:bg-[#FFFDF9] focus:border-[#DF9A28] outline-none transition shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]">
                    
                    <button type="button" onclick="togglePasswordVisibility()" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8C7D70] hover:text-[#2C1A11] p-1 transition cursor-pointer"
                        title="Tampilkan / Sembunyikan Sandi">
                        <!-- Ikon Mata Terbuka -->
                        <svg id="eyeOpenIcon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Ikon Mata Tertutup -->
                        <svg id="eyeClosedIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Tombol Masuk (Oren Gold 3D Button) -->
            <button type="submit" 
                class="w-full bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] hover:from-[#C98224] hover:to-[#8C4610] text-white font-extrabold py-3.5 rounded-xl border-t border-white/40 shadow-[0_4px_0_#5C2E0D,0_10px_20px_rgba(201,130,36,0.25)] hover:-translate-y-0.5 active:translate-y-1 active:shadow-[0_1px_0_#5C2E0D] transition-all text-xs uppercase tracking-wider mt-3 cursor-pointer select-none">
                Masuk ke Dashboard
            </button>
        </form>

        <!-- Link Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('landing') }}" class="text-xs text-[#8C7D70] hover:text-[#2C1A11] transition font-bold">
                ← Kembali ke Halaman Utama Toko
            </a>
        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeOpen = document.getElementById('eyeOpenIcon');
            const eyeClosed = document.getElementById('eyeClosedIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
