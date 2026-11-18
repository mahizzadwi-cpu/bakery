<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Artisan Bakes & Pâtisserie</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Playfair Display for Classic Boutique & Plus Jakarta Sans for Crisp Modern UI -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #FAF7F0; }
        ::-webkit-scrollbar-thumb { background: #D5CBC0; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #B8A99A; }

        /* 3D Motion Keyframe Animations */
        @keyframes float3d {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-12px) rotate(1deg);
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(223, 133, 26, 0.2);
            }
            50% {
                box-shadow: 0 0 40px rgba(223, 133, 26, 0.45);
            }
        }

        @keyframes badgeShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(200%); }
        }

        .animate-float-3d {
            animation: float3d 5s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulseGlow 3.5s ease-in-out infinite;
        }

        .card-3d {
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-3d:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="bg-[#FAF7F0] text-[#2C1A11] antialiased min-h-screen flex flex-col selection:bg-[#F3E5C8] selection:text-[#3D251A] overflow-x-hidden">

    <!-- 1. SLIM HARMONIC TOP ACCENT RIBBON: ABU SLATE -> COKLAT PEKAT -> OREN GOLD -> VANILA -->
    <div class="h-[3px] bg-gradient-to-r from-[#64748B] via-[#3D251A] via-[#DF851A] to-[#F5EFE4] w-full"></div>

    <!-- 2. NAVBAR MINIMALIS BERSIH (HANYA LOGO/BRAND & STATUS OPERASIONAL, TANPA KERANJANG/ADMIN) -->
    <header class="sticky top-0 z-40 bg-[#FFFDF9]/95 backdrop-blur-md border-b border-[#E8DFD5] shadow-xs">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Monogram & Title -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF851A] text-white flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_3px_0_#1D120B] border border-white/30 group-hover:scale-105 group-hover:rotate-2 transition-all duration-300">
                    M
                </div>
                <div>
                    <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#2C1A11] block leading-tight">Mey Bakery.</span>
                    <span class="text-[10px] tracking-widest uppercase text-[#7A6E65] font-bold block">Artisan Bakes & Cakes</span>
                </div>
            </a>

            <!-- Status Operasional Dapur Toko (Informasi Bersih) -->
            <div class="inline-flex items-center gap-2 bg-[#FAF7F2] border border-[#E2DDD5] px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#5A524A] shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#DF851A] animate-ping"></span>
                <span>Dapur Buka • 07.30 – 21.00 WIB</span>
            </div>

        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-14 space-y-12 sm:space-y-16">

        <!-- ==============================================================
             1. SECTION: PROFIL TOKO & SELAMAT DATANG + TOMBOL "MULAI" (3D HERO)
             ============================================================== -->
        <section class="relative bg-gradient-to-br from-white via-[#FFFDF9] to-[#FAF7F2] rounded-3xl sm:rounded-4xl border-2 border-[#E8DFD5] shadow-[0_10px_0_#E2DDD5,0_25px_50px_rgba(44,26,17,0.08)] p-6 sm:p-10 md:p-14 overflow-hidden">
            <!-- Ambient Glow Effect -->
            <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#DF851A]/15 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#A85816]/10 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- Left Column: Profil & CTA Mulai -->
                <div class="lg:col-span-7 space-y-5 text-center sm:text-left">
                    <div class="inline-flex items-center gap-2 bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D] px-3.5 py-1.5 rounded-full text-[11px] font-black tracking-wide shadow-xs">
                        <span>✨</span>
                        <span>Mey Bakery • Profil Resmi Toko</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl md:text-5xl lg:text-6xl font-serif font-black text-[#2C1A11] leading-[1.12] tracking-tight">
                        Selamat Datang di <span class="bg-gradient-to-r from-[#DF851A] via-[#C98224] to-[#8C4610] bg-clip-text text-transparent italic">Mey Bakery</span>
                    </h1>

                    <p class="text-sm sm:text-base md:text-lg text-[#6B5E52] font-normal leading-relaxed max-w-xl">
                        Kelezatan artisan roti hangat dan kue istimewa, dipanggang baru setiap pagi dari dapur rumahan dengan bahan alami pilihan terbaik.
                    </p>

                    <!-- TOMBOL UTAMA: "MULAI" (MENGARAH LANGSUNG KE TAMPILAN SHOP) -->
                    <div class="pt-3 flex flex-col sm:flex-row items-center justify-center sm:justify-start gap-4">
                        <a href="{{ route('shop') }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 sm:px-10 py-4 sm:py-4.5 rounded-2xl font-black text-sm sm:text-base text-white tracking-wide shadow-[0_6px_0_#7A3E05,0_16px_32px_rgba(178,93,7,0.35)] hover:-translate-y-1.5 hover:shadow-[0_9px_0_#7A3E05,0_22px_40px_rgba(178,93,7,0.45)] active:translate-y-1 active:shadow-[0_1px_0_#7A3E05] transition-all duration-200 cursor-pointer select-none group"
                            style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%); border-top: 2px solid rgba(254, 215, 170, 0.65);">
                            <span>Mulai Belanja</span>
                            <span class="text-lg group-hover:translate-x-2 transition-transform duration-200">→</span>
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20tanya%20seputar%20menu" target="_blank"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl font-bold text-xs sm:text-sm text-[#2C1A11] bg-white hover:bg-[#FAF7F2] border-2 border-[#D5CBC0] shadow-[0_3px_0_#CEC3B4] active:translate-y-1 active:shadow-none transition-all">
                            <span>💬 Tanya WhatsApp</span>
                        </a>
                    </div>

                    <!-- 3 Ringkasan Profil Unggulan 3D -->
                    <div class="grid grid-cols-3 gap-2.5 sm:gap-3.5 pt-4 max-w-lg">
                        <div class="bg-white p-3 rounded-2xl border border-[#E2DDD5] shadow-[0_3px_0_#E0D9CE] text-center">
                            <span class="text-base block">🌾</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#2C1A11] mt-0.5">Bahan Murni</p>
                            <p class="text-[10px] text-[#7A6E65]">Tanpa pengawet</p>
                        </div>
                        <div class="bg-white p-3 rounded-2xl border border-[#E2DDD5] shadow-[0_3px_0_#E0D9CE] text-center">
                            <span class="text-base block">🔥</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#2C1A11] mt-0.5">Fresh Oven</p>
                            <p class="text-[10px] text-[#7A6E65]">Pagi tiap hari</p>
                        </div>
                        <div class="bg-white p-3 rounded-2xl border border-[#E2DDD5] shadow-[0_3px_0_#E0D9CE] text-center">
                            <span class="text-base block">🛵</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#2C1A11] mt-0.5">Antar Toko</p>
                            <p class="text-[10px] text-[#7A6E65]">Bisa COD</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: 3D Aesthetic Floating Showcase Card -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm sm:max-w-md animate-float-3d">
                        
                        <!-- Main 3D Showcase Image Card -->
                        <div class="relative bg-white p-3.5 sm:p-4 rounded-3xl border-2 border-[#E2DDD5] shadow-[0_12px_0_#D5CBC0,0_24px_48px_rgba(44,26,17,0.12)] overflow-hidden">
                            <div class="relative aspect-[4/3.5] rounded-2xl overflow-hidden bg-[#F5EFE4]">
                                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80" 
                                    alt="Artisan Pastry Mey Bakery" 
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1D120B]/70 via-transparent to-transparent"></div>
                                
                                <div class="absolute bottom-3 left-3 right-3 text-white flex items-end justify-between">
                                    <div>
                                        <span class="text-[9px] uppercase font-bold text-[#FDE68A] tracking-wider block">Karya Resep Autentik</span>
                                        <h4 class="font-serif text-sm sm:text-base font-bold leading-tight">Mey Signature Cake & Pastry</h4>
                                    </div>
                                    <span class="bg-[#DF851A] text-white text-[10px] font-black px-2 py-0.5 rounded-lg shadow-xs">Fresh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating 3D Badge 1: Rating Pelanggan -->
                        <div class="absolute -top-4 -left-4 bg-white px-3.5 py-2 rounded-2xl border-2 border-[#E2DDD5] shadow-[0_4px_0_#D5CBC0,0_8px_16px_rgba(0,0,0,0.06)] flex items-center gap-2">
                            <span class="text-sm">⭐</span>
                            <div>
                                <p class="text-xs font-black text-[#2C1A11] leading-none">4.9 / 5.0</p>
                                <p class="text-[9px] text-[#7A6E65] font-semibold mt-0.5">Rating Kepuasan</p>
                            </div>
                        </div>

                        <!-- Floating 3D Badge 2: Jaminan Kualitas -->
                        <div class="absolute -bottom-4 -right-3 bg-gradient-to-r from-[#2C1A11] to-[#3D251A] text-white px-4 py-2 rounded-2xl border-2 border-white/20 shadow-[0_4px_0_#120A06,0_10px_20px_rgba(29,18,11,0.25)] flex items-center gap-2">
                            <span class="text-sm">✨</span>
                            <div>
                                <p class="text-xs font-bold leading-none">100% Halal</p>
                                <p class="text-[9px] text-[#DF851A] font-medium mt-0.5">Dapur Higienis</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             2. SECTION: PENILAIAN PELANGGAN (TESTIMONI 3D ESTETIK)
             ============================================================== -->
        <section class="space-y-6 pt-2">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b-2 border-[#E2DDD5] pb-4">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-[#A85816] block">Ulasan Jujur</span>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight mt-0.5">Penilaian Pelanggan</h2>
                </div>
                <div class="inline-flex items-center gap-2 bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D] px-4 py-2 rounded-full text-xs font-black shadow-xs self-start sm:self-auto">
                    <span>⭐ 4.9 / 5.0</span>
                    <span class="text-[#7A6E65] font-normal">• 500+ Pelanggan Puas</span>
                </div>
            </div>

            <!-- 4 Kartu Penilaian 3D Estetik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- Review 1 -->
                <div class="card-3d bg-white rounded-3xl border-2 border-[#E8DFD5] p-5 shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Roti sangat empuk dan aromanya khas butter premium. Kuenya tidak kemanisan, keluarga sangat suka!"
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Sarah Angelina</p>
                        <span class="text-[10px] text-[#7A6E65] block">Lamongan • Verified Buyer</span>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card-3d bg-white rounded-3xl border-2 border-[#E8DFD5] p-5 shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Pesan dadakan untuk ulang tahun, pengiriman kurir toko tepat waktu dan hiasan kuenya rapi banget."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Dimas Prasetyo</p>
                        <span class="text-[10px] text-[#7A6E65] block">Pelanggan Tetap</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="card-3d bg-white rounded-3xl border-2 border-[#E8DFD5] p-5 shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Pastry dan croissant-nya renyah di luar, lembut di dalam. Selalu pesan rutin buat teman kopi pagi."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Linda Kurnia</p>
                        <span class="text-[10px] text-[#7A6E65] block">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="card-3d bg-white rounded-3xl border-2 border-[#E8DFD5] p-5 shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Sistem pesanannya sangat mudah, invoice keluar otomatis dan respon via WhatsApp super ramah."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Reza Firmansyah</p>
                        <span class="text-[10px] text-[#7A6E65] block">Pembeli Online</span>
                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             3. SECTION: ALAMAT TOKO & TITIK LOKASI GOOGLE MAPS (3D EMBED)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b-2 border-[#E2DDD5] pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#A85816] block">Lokasi Fisik Gerai</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight mt-0.5">Alamat Toko</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 sm:gap-6 items-stretch">
                
                <!-- Left: Informasi Detail Alamat -->
                <div class="md:col-span-5 bg-white rounded-3xl border-2 border-[#E8DFD5] p-6 shadow-[0_8px_0_#E2DDD5,0_16px_30px_rgba(44,26,17,0.06)] flex flex-col justify-between space-y-5">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D] flex items-center justify-center font-bold text-lg shadow-xs">
                            📍
                        </div>
                        
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#7A6E65] tracking-wider block">Alamat Resmi</span>
                            <p class="font-bold text-sm sm:text-base text-[#2C1A11] leading-snug mt-1">
                                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
                            </p>
                        </div>

                        <div class="pt-2 border-t border-[#F2ECE2] space-y-2 text-xs text-[#5A524A]">
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#2C1A11]">Jam Buka:</span>
                                <span>07.30 – 21.00 WIB (Setiap Hari)</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#2C1A11]">Layanan:</span>
                                <span>Kurir Toko, Pick-up, & COD</span>
                            </p>
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank"
                        class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl font-bold text-xs text-[#2C1A11] bg-[#FAF7F2] hover:bg-[#F2ECE2] border-2 border-[#D5CBC0] shadow-[0_3px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all">
                        <span>Buka Titik di Google Maps</span>
                        <span>↗</span>
                    </a>
                </div>

                <!-- Right: Google Maps Embed Card -->
                <div class="md:col-span-7 h-72 sm:h-80 md:h-full min-h-[300px] rounded-3xl overflow-hidden border-2 border-[#E8DFD5] shadow-[0_8px_0_#E2DDD5,0_16px_30px_rgba(44,26,17,0.06)] bg-[#F5EFE4]">
                    <iframe 
                        class="w-full h-full min-h-[300px]"
                        src="https://maps.google.com/maps?q=-6.898962,112.197332&z=15&output=embed" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             4. SECTION: SOSIAL MEDIA RESMI BRAND (KARTU 3D INTERAKTIF)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b-2 border-[#E2DDD5] pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#A85816] block">Komunikasi Langsung</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight mt-0.5">Sosial Media</h2>
            </div>

            <!-- 3 Kartu Sosial Media 3D -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5">
                
                <!-- Instagram -->
                <a href="https://instagram.com" target="_blank" 
                    class="card-3d bg-white p-5 rounded-3xl border-2 border-[#E8DFD5] shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] hover:border-[#DF851A] flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#FD1D1D] to-[#833AB4] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform">
                        📸
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#7A6E65] tracking-wider block">Instagram</span>
                        <p class="font-bold text-sm text-[#2C1A11] group-hover:text-[#A85816] transition-colors">@meybakery.official</p>
                        <p class="text-[10px] text-[#A89F95] mt-0.5">Galeri foto roti & update harian</p>
                    </div>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com" target="_blank" 
                    class="card-3d bg-white p-5 rounded-3xl border-2 border-[#E8DFD5] shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] hover:border-[#DF851A] flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#000000] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform">
                        🎵
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#7A6E65] tracking-wider block">TikTok</span>
                        <p class="font-bold text-sm text-[#2C1A11] group-hover:text-[#A85816] transition-colors">@meybakery</p>
                        <p class="text-[10px] text-[#A89F95] mt-0.5">Video seru proses baking oven</p>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20memesan" target="_blank" 
                    class="card-3d bg-white p-5 rounded-3xl border-2 border-[#E8DFD5] shadow-[0_6px_0_#E2DDD5,0_12px_24px_rgba(44,26,17,0.04)] hover:border-[#059669] flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#059669] to-[#10B981] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform">
                        💬
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-emerald-800 tracking-wider block">WhatsApp Resmi</span>
                        <p class="font-bold text-sm text-[#2C1A11] group-hover:text-emerald-700 transition-colors">0812-3456-7890</p>
                        <p class="text-[10px] text-[#A89F95] mt-0.5">Chat langsung pesanan khusus</p>
                    </div>
                </a>

            </div>
        </section>

    </main>

    <!-- 5. FOOTER MINIMALIS ELEGAN (VERIFIED ADDRESS & COPYRIGHT) -->
    <footer class="bg-white border-t border-[#E8DFD5] py-8 text-center text-xs text-[#7A6E65] mt-12">
        <div class="max-w-6xl mx-auto px-4 space-y-2">
            <div class="flex items-center justify-center gap-2">
                <span class="w-6 h-6 rounded-lg bg-[#3D251A] text-white flex items-center justify-center font-serif font-black text-xs">M</span>
                <span class="font-serif font-black text-sm text-[#2C1A11]">Mey Bakery.</span>
            </div>
            
            <p class="font-medium text-[#2C1A11]">
                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
            </p>

            <p class="text-[11px] text-[#A89F95] pt-1">
                © {{ date('Y') }} Mey Bakery. Artisan Fresh Bakes & Pâtisserie.
            </p>
        </div>
    </footer>

</body>
</html>
