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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 18%, #78695E 0%, #5C4F45 42%, #443A32 100%);
            background-attachment: fixed;
            color: #FAF6F0;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-handwriting { font-family: 'Caveat', cursive; }

        /* Custom Scrollbar Vintage */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #443A32; }
        ::-webkit-scrollbar-thumb { background: #8C7A6B; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #B5A18C; }

        /* 3D Motion Keyframe Animations */
        @keyframes float3d {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-8px) rotate(1deg);
            }
        }

        .animate-float-3d {
            animation: float3d 6s ease-in-out infinite;
        }

        /* Abstract Organic Morphing Keyframes for Icons */
        @keyframes morphBlob {
            0%, 100% {
                border-radius: 46% 54% 63% 37% / 41% 44% 56% 59%;
            }
            34% {
                border-radius: 59% 41% 44% 56% / 54% 39% 61% 46%;
            }
            67% {
                border-radius: 39% 61% 57% 43% / 49% 59% 41% 51%;
            }
        }

        /* Abstract Organic Icon Pods (Fluid, Non-Boxy, 5s Transition on Scroll) */
        .abstract-blob {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            animation: morphBlob 9s ease-in-out infinite;
            transition: transform 5s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 5s cubic-bezier(0.16, 1, 0.3, 1),
                        border-radius 5s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 5s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, filter, border-radius;
        }

        /* Frosted Glass Floating Card (Loss, Translucent, Seamless with Canvas) */
        .glass-loss {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 16px 36px -10px rgba(20, 14, 10, 0.35);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .glass-loss:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.13);
            border-color: rgba(255, 255, 255, 0.28);
            box-shadow: 0 24px 48px -12px rgba(20, 14, 10, 0.45);
        }
    </style>
</head>
<body class="text-[#FAF6F0] antialiased min-h-screen flex flex-col selection:bg-[#B5A18C]/40 selection:text-white overflow-x-hidden relative">

    <!-- AMBIENT LUMINOUS GLOWS (TRANSPARAN HANGAT MENYATU DENGAN VINTAGE BACKDROP) -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute -top-20 left-1/4 w-[650px] h-[650px] rounded-full bg-[#F2E3D0]/20 blur-[150px]"></div>
        <div class="absolute top-1/3 right-10 w-[600px] h-[600px] rounded-full bg-[#DFC8B2]/15 blur-[160px]"></div>
        <div class="absolute bottom-10 left-10 w-[700px] h-[700px] rounded-full bg-[#C2A589]/18 blur-[150px]"></div>
    </div>

    <!-- 1. SLIM VINTAGE ACCENT RIBBON -->
    <div class="h-[2px] bg-gradient-to-r from-[#5A4B40] via-[#8C7A6B] via-[#CBBDAA] to-[#5A4B40] w-full relative z-50"></div>

    <!-- 2. NAVBAR MINIMALIS BERSIH (ORGANIC FLUID TRANSPARENT) -->
    <header class="sticky top-0 z-40 bg-[#483D36]/80 backdrop-blur-xl border-b border-white/15 shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Monogram & Title (Abstract Fluid Emblem) -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3.5 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 abstract-blob bg-gradient-to-br from-[#2D231C]/90 via-[#44352A]/90 to-[#5C4B3D]/90 backdrop-blur-md text-[#FAF6F0] flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_4px_16px_rgba(0,0,0,0.35)] border border-[#C5B49F]/40 group-hover:scale-105 transition-all duration-300">
                    <span>M</span>
                </div>
                <div>
                    <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#FAF6F0] block leading-tight group-hover:text-white transition-colors">Mey Bakery.</span>
                    <span class="text-[10px] tracking-widest uppercase text-[#D5C7B8] font-bold block">Artisan Bakes & Cakes</span>
                </div>
            </a>

            <!-- Status Operasional Dapur Toko (Organic Fluid Pill) -->
            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-4 py-1.5 rounded-full text-xs font-semibold text-[#FAF6F0] backdrop-blur-md shadow-xs">
                <span class="w-2.5 h-2.5 abstract-blob bg-[#E5D2BC] animate-ping"></span>
                <span>Dapur Buka • 07.30 – 21.00 WIB</span>
            </div>

        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-16 space-y-16 sm:space-y-24 relative z-10">

        <!-- ==============================================================
             1. SECTION: HERO PROFIL TOKO — "LOSS & ABSTRAK"
             (TANPA TUMPUKAN KOTAK CARD, BEBAS FRAMELESS MENGALIR LANGSUNG DI CANVAS)
             ============================================================== -->
        <section class="relative pt-2 sm:pt-6">
            
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- Left Column: Big Artisan Typography & Frameless Content -->
                <div class="lg:col-span-7 space-y-7 text-center sm:text-left">
                    
                    <!-- Top Minimal Pill Badge -->
                    <div class="inline-flex items-center gap-2.5 bg-white/10 text-[#E5D2BC] border border-white/20 px-4 py-1.5 rounded-full text-[11px] font-bold tracking-wide shadow-xs backdrop-blur-md">
                        <span class="w-5 h-5 abstract-blob bg-white/15 text-xs text-[#FAF6F0]">✨</span>
                        <span>Mey Bakery • Profil Resmi Toko</span>
                    </div>

                    <!-- Main Hero Title: Bold, Elegant & Loss -->
                    <div class="space-y-2">
                        <p class="font-handwriting text-2xl sm:text-3xl text-[#E5D2BC]/90 -rotate-2 inline-block">Artisan Fresh Daily Oven</p>
                        <h1 class="text-4xl sm:text-6xl md:text-6xl lg:text-7xl font-serif font-black text-[#FAF6F0] leading-[1.08] tracking-tight">
                            Selamat Datang di <br class="hidden sm:inline">
                            <span class="italic text-[#E5D2BC] drop-shadow-[0_4px_16px_rgba(0,0,0,0.35)]">Mey Bakery</span>
                        </h1>
                    </div>

                    <p class="text-base sm:text-lg text-[#D5C7B8] font-normal leading-relaxed max-w-xl">
                        Kelezatan artisan roti hangat dan kue istimewa, dipanggang baru setiap pagi dari dapur rumahan dengan bahan alami pilihan terbaik tanpa pengawet.
                    </p>

                    <!-- TOMBOL UTAMA: "MULAI BELANJA" (LOSS ORGANIC CAPSULES) -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center sm:justify-start gap-4">
                        <a href="{{ route('shop') }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-9 py-4 sm:py-4.5 rounded-[32px_14px_36px_16px] font-black text-sm sm:text-base text-[#FAF6F0] tracking-wide hover:-translate-y-1 hover:brightness-110 active:translate-y-1 transition-all duration-200 cursor-pointer select-none group shadow-[0_8px_0_#1E1611,0_16px_30px_rgba(0,0,0,0.45)]"
                            style="background: linear-gradient(180deg, #382A20 0%, #201712 100%); border-top: 1px solid rgba(229, 210, 188, 0.4);">
                            <span>Mulai Belanja</span>
                            <span class="w-7 h-7 abstract-blob bg-white/15 text-lg group-hover:translate-x-2 transition-transform duration-300">→</span>
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20tanya%20seputar%20menu" target="_blank"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-[16px_32px_18px_30px] font-bold text-xs sm:text-sm text-[#FAF6F0] bg-white/10 hover:bg-white/20 border border-white/20 shadow-[0_4px_16px_rgba(0,0,0,0.2)] backdrop-blur-md active:translate-y-1 transition-all">
                            <span class="w-6 h-6 abstract-blob bg-white/20 text-sm">💬</span>
                            <span>Tanya WhatsApp</span>
                        </a>
                    </div>

                    <!-- 3 Ringkasan Profil Unggulan — MURNI ABSTRAK IKON FLOATING (BUKAN KOTAK KAKU) -->
                    <div class="grid grid-cols-3 gap-4 pt-6 max-w-lg border-t border-white/15">
                        <!-- Pod 1 -->
                        <div class="flex flex-col items-center sm:items-start text-center sm:text-left group">
                            <div class="w-12 h-12 abstract-blob bg-gradient-to-br from-[#8C7A6B]/50 to-[#4E3F35]/70 border border-white/20 text-[#FAF6F0] text-xl shadow-md group-hover:scale-110 transition-transform">
                                <span>🌾</span>
                            </div>
                            <p class="text-xs sm:text-sm font-black text-[#FAF6F0] mt-2.5">Bahan Murni</p>
                            <p class="text-[11px] text-[#D5C7B8]/80">Tanpa pengawet</p>
                        </div>
                        <!-- Pod 2 -->
                        <div class="flex flex-col items-center sm:items-start text-center sm:text-left group">
                            <div class="w-12 h-12 abstract-blob bg-gradient-to-br from-[#8C7A6B]/50 to-[#4E3F35]/70 border border-white/20 text-[#FAF6F0] text-xl shadow-md group-hover:scale-110 transition-transform">
                                <span>🔥</span>
                            </div>
                            <p class="text-xs sm:text-sm font-black text-[#FAF6F0] mt-2.5">Fresh Oven</p>
                            <p class="text-[11px] text-[#D5C7B8]/80">Pagi tiap hari</p>
                        </div>
                        <!-- Pod 3 -->
                        <div class="flex flex-col items-center sm:items-start text-center sm:text-left group">
                            <div class="w-12 h-12 abstract-blob bg-gradient-to-br from-[#8C7A6B]/50 to-[#4E3F35]/70 border border-white/20 text-[#FAF6F0] text-xl shadow-md group-hover:scale-110 transition-transform">
                                <span>🛵</span>
                            </div>
                            <p class="text-xs sm:text-sm font-black text-[#FAF6F0] mt-2.5">Antar Toko</p>
                            <p class="text-[11px] text-[#D5C7B8]/80">Bisa COD</p>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Abstract Sculptural Cake Display (Loss, Floating, Organic Glow) -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm sm:max-w-md animate-float-3d">
                        
                        <!-- Ambient Radial Halo Behind Showcase -->
                        <div class="absolute inset-0 bg-[#E5D2BC]/15 rounded-full blur-3xl -z-10 scale-110 pointer-events-none"></div>

                        <!-- Fluid Organic Arch Silhouette (No Card Wrapper Box) -->
                        <div class="relative p-2 rounded-[58px_24px_64px_30px] bg-gradient-to-b from-white/25 via-white/10 to-transparent border border-white/25 shadow-[0_24px_50px_-12px_rgba(15,10,6,0.65)] backdrop-blur-sm">
                            <div class="relative aspect-[4/3.8] rounded-[50px_18px_56px_24px] overflow-hidden bg-[#2D231C]">
                                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80" 
                                    alt="Artisan Pastry Mey Bakery" 
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1A120D]/90 via-[#1A120D]/20 to-transparent"></div>
                                
                                <div class="absolute bottom-4 left-4 right-4 text-white flex items-end justify-between">
                                    <div>
                                        <span class="text-[9px] uppercase font-bold text-[#E5D2BC] tracking-wider block">Karya Resep Autentik</span>
                                        <h4 class="font-serif text-sm sm:text-base font-bold leading-tight text-[#FAF6F0]">Mey Signature Cake & Pastry</h4>
                                    </div>
                                    <span class="abstract-blob w-12 h-7 bg-[#43352A]/90 text-[#FAF6F0] text-[10px] font-bold border border-white/20 shadow-xs">Fresh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Translucent Glass Badge 1: Rating Pelanggan -->
                        <div class="absolute -top-4 -left-3 glass-loss px-4 py-2.5 rounded-[24px_10px_26px_12px] flex items-center gap-2.5">
                            <span class="w-7 h-7 abstract-blob bg-[#E5D2BC]/20 text-xs text-[#E5D2BC]">★</span>
                            <div>
                                <p class="text-xs font-black text-[#FAF6F0] leading-none">4.9 / 5.0</p>
                                <p class="text-[9px] text-[#D5C7B8] font-semibold mt-0.5">Rating Kepuasan</p>
                            </div>
                        </div>

                        <!-- Floating Translucent Glass Badge 2: Jaminan Kualitas -->
                        <div class="absolute -bottom-4 -right-2 glass-loss px-4 py-2.5 rounded-[12px_26px_14px_24px] flex items-center gap-2.5">
                            <span class="w-7 h-7 abstract-blob bg-white/15 text-xs text-[#FAF6F0]">✨</span>
                            <div>
                                <p class="text-xs font-bold leading-none text-[#FAF6F0]">100% Halal</p>
                                <p class="text-[9px] text-[#D5C7B8] font-medium mt-0.5">Dapur Higienis</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             2. SECTION: PENILAIAN PELANGGAN — LOSS & ABSTRAK
             (ETHEREAL TRANSLUCENT GLASS CLOUDS, TANPA KOTAK OPAQUE KAKU)
             ============================================================== -->
        <section class="space-y-6 pt-4">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-white/15 pb-4">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Ulasan Jujur</span>
                    <h2 class="text-2xl sm:text-4xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Penilaian Pelanggan</h2>
                </div>
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-4 py-2 rounded-full text-xs font-bold text-[#FAF6F0] backdrop-blur-md shadow-xs self-start sm:self-auto">
                    <span class="w-5 h-5 abstract-blob bg-[#E5D2BC]/25 text-[#E5D2BC] text-xs">★</span>
                    <span>4.9 / 5.0</span>
                    <span class="text-[#D5C7B8] font-normal">• 500+ Pelanggan Puas</span>
                </div>
            </div>

            <!-- 4 Dialogue Glass Clouds (Loss, Translucent, Seamless) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- Review 1 -->
                <div class="glass-loss rounded-[38px_14px_42px_18px] p-6 space-y-3.5 flex flex-col justify-between">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-white/10 text-[#E5D2BC] text-sm">★</span>
                            <span class="text-xs font-black text-[#E5D2BC]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#FAF6F0]/90 leading-relaxed font-normal">
                            "Roti sangat empuk dan aromanya khas butter premium. Kuenya tidak kemanisan, keluarga sangat suka!"
                        </p>
                    </div>
                    <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#8C7A6B]/50 text-[#FAF6F0] text-[10px] font-bold border border-white/20">SA</span>
                        <div>
                            <p class="font-bold text-xs text-[#FAF6F0]">Sarah Angelina</p>
                            <span class="text-[10px] text-[#D5C7B8] block">Lamongan • Verified Buyer</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="glass-loss rounded-[16px_40px_18px_36px] p-6 space-y-3.5 flex flex-col justify-between">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-white/10 text-[#E5D2BC] text-sm">★</span>
                            <span class="text-xs font-black text-[#E5D2BC]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#FAF6F0]/90 leading-relaxed font-normal">
                            "Pesan dadakan untuk ulang tahun, pengiriman kurir toko tepat waktu dan hiasan kuenya rapi banget."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#8C7A6B]/50 text-[#FAF6F0] text-[10px] font-bold border border-white/20">DP</span>
                        <div>
                            <p class="font-bold text-xs text-[#FAF6F0]">Dimas Prasetyo</p>
                            <span class="text-[10px] text-[#D5C7B8] block">Pelanggan Tetap</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="glass-loss rounded-[36px_18px_34px_22px] p-6 space-y-3.5 flex flex-col justify-between">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-white/10 text-[#E5D2BC] text-sm">★</span>
                            <span class="text-xs font-black text-[#E5D2BC]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#FAF6F0]/90 leading-relaxed font-normal">
                            "Pastry dan croissant-nya renyah di luar, lembut di dalam. Selalu pesan rutin buat teman kopi pagi."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#8C7A6B]/50 text-[#FAF6F0] text-[10px] font-bold border border-white/20">LK</span>
                        <div>
                            <p class="font-bold text-xs text-[#FAF6F0]">Linda Kurnia</p>
                            <span class="text-[10px] text-[#D5C7B8] block">Verified Buyer</span>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="glass-loss rounded-[20px_36px_16px_40px] p-6 space-y-3.5 flex flex-col justify-between">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-white/10 text-[#E5D2BC] text-sm">★</span>
                            <span class="text-xs font-black text-[#E5D2BC]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#FAF6F0]/90 leading-relaxed font-normal">
                            "Sistem pesanannya sangat mudah, invoice keluar otomatis dan respon via WhatsApp super ramah."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-white/10 flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#8C7A6B]/50 text-[#FAF6F0] text-[10px] font-bold border border-white/20">RF</span>
                        <div>
                            <p class="font-bold text-xs text-[#FAF6F0]">Reza Firmansyah</p>
                            <span class="text-[10px] text-[#D5C7B8] block">Pembeli Online</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             3. SECTION: ALAMAT TOKO & GOOGLE MAPS — LOSS & INTEGRATED
             ============================================================== -->
        <section class="space-y-5 pt-4">
            <div class="border-b border-white/15 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Lokasi Fisik Gerai</span>
                <h2 class="text-2xl sm:text-4xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Alamat Toko</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                
                <!-- Left: Informasi Detail Alamat (Loss Frosted Glass Pod) -->
                <div class="md:col-span-5 glass-loss rounded-[42px_16px_48px_22px] p-6 sm:p-8 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#6E5A4B] to-[#9E8672] text-[#FAF6F0] flex items-center justify-center font-bold text-xl shadow-md border border-white/20">
                            <span>📍</span>
                        </div>
                        
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#E5D2BC] tracking-wider block">Alamat Resmi</span>
                            <p class="font-bold text-base sm:text-lg text-[#FAF6F0] leading-snug mt-1">
                                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
                            </p>
                        </div>

                        <div class="pt-3 border-t border-white/10 space-y-2 text-xs text-[#D5C7B8]">
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#FAF6F0]">Jam Buka:</span>
                                <span>07.30 – 21.00 WIB (Setiap Hari)</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#FAF6F0]">Layanan:</span>
                                <span>Kurir Toko, Pick-up, & COD</span>
                            </p>
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank"
                        class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-full font-bold text-xs sm:text-sm text-[#FAF6F0] bg-white/10 hover:bg-white/20 border border-white/20 shadow-md active:translate-y-0.5 transition-all">
                        <span>Buka Titik di Google Maps</span>
                        <span class="w-5 h-5 abstract-blob bg-white/20 text-xs">↗</span>
                    </a>
                </div>

                <!-- Right: Google Maps Embed Card (Organic Silhouette Frame) -->
                <div class="md:col-span-7 h-72 sm:h-80 md:h-full min-h-[320px] rounded-[22px_48px_24px_42px] overflow-hidden border border-white/20 shadow-[0_20px_45px_-10px_rgba(20,14,10,0.5)] bg-[#2D231C]">
                    <iframe 
                        class="w-full h-full min-h-[320px]"
                        src="https://maps.google.com/maps?q=-6.898962,112.197332&z=15&output=embed" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             4. SECTION: SOSIAL MEDIA RESMI BRAND (LOSS ABSTRACT LIQUID PODS)
             ============================================================== -->
        <section class="space-y-5 pt-4">
            <div class="border-b border-white/15 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Komunikasi Langsung</span>
                <h2 class="text-2xl sm:text-4xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Sosial Media</h2>
            </div>

            <!-- 3 Abstract Fluid Pods (Loss Glassmorphism) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5">
                
                <!-- Instagram -->
                <a href="https://instagram.com" target="_blank" 
                    class="glass-loss rounded-[36px_14px_38px_18px] p-6 flex items-center gap-4 group">
                    <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#833AB4] to-[#C13584] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-110 transition-transform">
                        <span>📸</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#E5D2BC] tracking-wider block">Instagram</span>
                        <p class="font-bold text-sm text-[#FAF6F0] group-hover:text-[#E5D2BC] transition-colors">@meybakery.official</p>
                        <p class="text-[11px] text-[#D5C7B8] mt-0.5">Galeri foto roti & update harian</p>
                    </div>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com" target="_blank" 
                    class="glass-loss rounded-[16px_38px_18px_34px] p-6 flex items-center gap-4 group">
                    <div class="w-12 h-12 abstract-blob bg-[#1E1713] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-110 transition-transform border border-white/20">
                        <span>🎵</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#E5D2BC] tracking-wider block">TikTok</span>
                        <p class="font-bold text-sm text-[#FAF6F0] group-hover:text-[#E5D2BC] transition-colors">@meybakery</p>
                        <p class="text-[11px] text-[#D5C7B8] mt-0.5">Video seru proses baking oven</p>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20memesan" target="_blank" 
                    class="glass-loss rounded-[34px_16px_36px_20px] p-6 flex items-center gap-4 group">
                    <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#059669] to-[#10B981] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-110 transition-transform">
                        <span>💬</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-emerald-400 tracking-wider block">WhatsApp Resmi</span>
                        <p class="font-bold text-sm text-[#FAF6F0] group-hover:text-emerald-300 transition-colors">0812-3456-7890</p>
                        <p class="text-[11px] text-[#D5C7B8] mt-0.5">Chat langsung pesanan khusus</p>
                    </div>
                </a>

            </div>
        </section>

    </main>

    <!-- 5. FOOTER MINIMALIS VINTAGE ELEGAN (ORGANIC FLOW) -->
    <footer class="bg-[#382E28]/90 border-t border-white/15 py-8 text-center text-xs text-[#D5C7B8] mt-12 relative z-10 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 space-y-2">
            <div class="flex items-center justify-center gap-2">
                <span class="w-6 h-6 abstract-blob bg-[#5A4B40] text-[#FAF6F0] flex items-center justify-center font-serif font-black text-xs shadow-xs border border-white/20">M</span>
                <span class="font-serif font-black text-sm text-[#FAF6F0]">Mey Bakery.</span>
            </div>
            
            <p class="font-medium text-[#FAF6F0]/90">
                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
            </p>

            <p class="text-[11px] text-[#D5C7B8]/80 pt-1">
                © {{ date('Y') }} Mey Bakery. Artisan Fresh Bakes & Pâtisserie.
            </p>
        </div>
    </footer>

    <!-- DYNAMIC 5-SECOND SCROLL TRANSITION JAVASCRIPT LOGIC UNTUK ABSTRACT BLOB ICONS -->
    <script>
        let isScrollingTimer;
        let lastScrollPos = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentPos = window.scrollY;
            const scrollDiff = currentPos - lastScrollPos;
            const dir = scrollDiff >= 0 ? 1 : -1;
            lastScrollPos = currentPos;

            const blobs = document.querySelectorAll('.abstract-blob');
            blobs.forEach((blob, idx) => {
                // Terapkan transisi gerakan durasi 5 detik dengan pelunakan organik
                blob.style.transition = 'transform 5s cubic-bezier(0.16, 1, 0.3, 1), filter 5s ease, border-radius 5s ease';
                
                // Gerakan dinamis responsif terhadap guliran website
                const swayAngle = (idx % 2 === 0 ? 1 : -1) * 12;
                const floatLift = dir * -14;
                blob.style.transform = `translateY(${floatLift}px) rotate(${swayAngle}deg) scale(1.18)`;
                blob.style.filter = 'drop-shadow(0 14px 28px rgba(229, 210, 188, 0.45))';
            });

            clearTimeout(isScrollingTimer);
            isScrollingTimer = setTimeout(() => {
                blobs.forEach(blob => {
                    // Meluncur kembali secara halus selama sisa transisi 5 detik
                    blob.style.transform = 'translateY(0px) rotate(0deg) scale(1)';
                    blob.style.filter = 'none';
                });
            }, 600);
        }, { passive: true });
    </script>

</body>
</html>
