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
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 18%, #78695E 0%, #5C4F45 42%, #443A32 100%);
            background-attachment: fixed;
            color: #FAF6F0;
        }
        .font-serif { font-family: 'Playfair Display', serif; }

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
                transform: translateY(-8px) rotate(0.8deg);
            }
        }

        .animate-float-3d {
            animation: float3d 5s ease-in-out infinite;
        }

        /* Abstract Organic Morphing Keyframes for Icons */
        @keyframes morphBlob {
            0%, 100% {
                border-radius: 48% 52% 65% 35% / 40% 45% 55% 60%;
            }
            34% {
                border-radius: 58% 42% 45% 55% / 55% 38% 62% 45%;
            }
            67% {
                border-radius: 38% 62% 58% 42% / 48% 60% 40% 52%;
            }
        }

        /* Abstract Organic Icon Pods (Fluid, Non-Boxy, 5s Transition on Scroll) */
        .abstract-blob {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            animation: morphBlob 10s ease-in-out infinite;
            transition: transform 5s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 5s cubic-bezier(0.16, 1, 0.3, 1),
                        border-radius 5s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 5s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, filter, border-radius;
        }

        /* Organic Pebble Fluid Panels (Free-flowing, Asymmetrical, No Rigid Boxes) */
        .pebble-panel {
            background: rgba(253, 250, 245, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 16px 36px -10px rgba(35, 25, 18, 0.28);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .pebble-panel:hover {
            transform: translateY(-5px);
            background: rgba(255, 254, 252, 0.95);
            border-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 24px 48px -12px rgba(35, 25, 18, 0.38);
        }
    </style>
</head>
<body class="text-[#FAF6F0] antialiased min-h-screen flex flex-col selection:bg-[#B5A18C]/40 selection:text-white overflow-x-hidden relative">

    <!-- AMBIENT LUMINOUS GLOWS (TRANSPARAN HANGAT MENYATU DENGAN VINTAGE BACKDROP) -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute -top-20 left-1/4 w-[600px] h-[600px] rounded-full bg-[#F2E3D0]/25 blur-[140px]"></div>
        <div class="absolute top-1/3 right-10 w-[600px] h-[600px] rounded-full bg-[#DFC8B2]/20 blur-[150px]"></div>
        <div class="absolute bottom-10 left-10 w-[700px] h-[700px] rounded-full bg-[#C2A589]/22 blur-[140px]"></div>
    </div>

    <!-- 1. SLIM VINTAGE ACCENT RIBBON -->
    <div class="h-[2px] bg-gradient-to-r from-[#5A4B40] via-[#8C7A6B] via-[#CBBDAA] to-[#5A4B40] w-full relative z-50"></div>

    <!-- 2. NAVBAR MINIMALIS BERSIH (ORGANIC FLUID TRANSPARENT) -->
    <header class="sticky top-0 z-40 bg-[#483D36]/80 backdrop-blur-xl border-b border-white/20 shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Monogram & Title (Abstract Fluid Emblem) -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3.5 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 abstract-blob bg-gradient-to-br from-[#3D322B]/90 via-[#4F4035]/90 to-[#635345]/90 backdrop-blur-md text-[#FAF6F0] flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_4px_12px_rgba(0,0,0,0.3)] border border-[#C5B49F]/40 group-hover:scale-105 transition-all duration-300">
                    <span>M</span>
                </div>
                <div>
                    <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#FAF6F0] block leading-tight group-hover:text-white transition-colors">Mey Bakery.</span>
                    <span class="text-[10px] tracking-widest uppercase text-[#D5C7B8] font-bold block">Artisan Bakes & Cakes</span>
                </div>
            </a>

            <!-- Status Operasional Dapur Toko (Organic Fluid Pill) -->
            <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20 px-4 py-1.5 rounded-full text-xs font-semibold text-[#FAF6F0] backdrop-blur-md shadow-xs">
                <span class="w-2.5 h-2.5 abstract-blob bg-[#E5D2BC] animate-ping"></span>
                <span>Dapur Buka • 07.30 – 21.00 WIB</span>
            </div>

        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-14 space-y-14 sm:space-y-20 relative z-10">

        <!-- ==============================================================
             1. SECTION: PROFIL TOKO & SELAMAT DATANG (ORGANIC FLUID SHAPES & ABSTRACT ICONS)
             ============================================================== -->
        <section class="pebble-panel rounded-[46px_20px_54px_24px] p-6 sm:p-10 md:p-14 overflow-hidden relative text-[#241812]">
            <!-- Subtle Fluid Interior Radial Aura -->
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#B5A18C]/15 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-[#EAE2D5]/40 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- Left Column: Profil & CTA Mulai -->
                <div class="lg:col-span-7 space-y-6 text-center sm:text-left">
                    <div class="inline-flex items-center gap-2.5 bg-[#EAE2D5]/80 text-[#544335] border border-[#CBBDAA] px-4 py-1.5 rounded-full text-[11px] font-bold tracking-wide shadow-xs">
                        <span class="w-5 h-5 abstract-blob bg-[#FAF6F0] text-[#7A604A] text-xs">✨</span>
                        <span>Mey Bakery • Profil Resmi Toko</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl md:text-5xl lg:text-6xl font-serif font-black text-[#241812] leading-[1.12] tracking-tight">
                        Selamat Datang di <span class="bg-gradient-to-r from-[#3D2C21] via-[#6B533E] to-[#423125] bg-clip-text text-transparent italic">Mey Bakery</span>
                    </h1>

                    <p class="text-sm sm:text-base md:text-lg text-[#52443A] font-normal leading-relaxed max-w-xl">
                        Kelezatan artisan roti hangat dan kue istimewa, dipanggang baru setiap pagi dari dapur rumahan dengan bahan alami pilihan terbaik.
                    </p>

                    <!-- TOMBOL UTAMA: "MULAI BELANJA" (ORGANIC FLUID CAPSULE) -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center sm:justify-start gap-4">
                        <a href="{{ route('shop') }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 sm:px-10 py-4 sm:py-4.5 rounded-[30px_14px_34px_16px] font-black text-sm sm:text-base text-[#F5EFE6] tracking-wide hover:-translate-y-1 hover:brightness-110 active:translate-y-1 transition-all duration-200 cursor-pointer select-none group shadow-[0_6px_0_#1A130F,0_14px_28px_rgba(0,0,0,0.35)]"
                            style="background: linear-gradient(180deg, #44352A 0%, #2A2019 100%); border-top: 1px solid rgba(230, 215, 195, 0.35);">
                            <span>Mulai Belanja</span>
                            <span class="w-7 h-7 abstract-blob bg-white/15 text-lg group-hover:translate-x-2 transition-transform duration-300">→</span>
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20tanya%20seputar%20menu" target="_blank"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-[16px_30px_18px_28px] font-bold text-xs sm:text-sm text-[#241812] bg-[#EFE9DF]/80 hover:bg-[#E5DDD0] border border-[#C8BAA9] shadow-[0_3px_0_#B8A795] active:translate-y-1 active:shadow-none transition-all">
                            <span class="w-6 h-6 abstract-blob bg-white/60 text-sm">💬</span>
                            <span>Tanya WhatsApp</span>
                        </a>
                    </div>

                    <!-- 3 Ringkasan Profil Unggulan Berbentuk Abstract Fluid Pods (Bukan Kotak Kaku) -->
                    <div class="grid grid-cols-3 gap-3 sm:gap-4 pt-4 max-w-lg">
                        <div class="p-3.5 rounded-[28px_12px_26px_14px] bg-[#EAE2D5]/60 hover:bg-[#EAE2D5]/90 border border-[#D5C9B8]/70 text-center transition-all group">
                            <span class="w-10 h-10 mx-auto abstract-blob bg-gradient-to-tr from-[#E0D3C1] to-[#FAF6F0] text-lg shadow-xs">🌾</span>
                            <p class="text-[11px] sm:text-xs font-black text-[#241812] mt-1.5">Bahan Murni</p>
                            <p class="text-[10px] text-[#695C51]">Tanpa pengawet</p>
                        </div>
                        <div class="p-3.5 rounded-[14px_28px_12px_26px] bg-[#EAE2D5]/60 hover:bg-[#EAE2D5]/90 border border-[#D5C9B8]/70 text-center transition-all group">
                            <span class="w-10 h-10 mx-auto abstract-blob bg-gradient-to-tr from-[#E0D3C1] to-[#FAF6F0] text-lg shadow-xs">🔥</span>
                            <p class="text-[11px] sm:text-xs font-black text-[#241812] mt-1.5">Fresh Oven</p>
                            <p class="text-[10px] text-[#695C51]">Pagi tiap hari</p>
                        </div>
                        <div class="p-3.5 rounded-[26px_14px_28px_12px] bg-[#EAE2D5]/60 hover:bg-[#EAE2D5]/90 border border-[#D5C9B8]/70 text-center transition-all group">
                            <span class="w-10 h-10 mx-auto abstract-blob bg-gradient-to-tr from-[#E0D3C1] to-[#FAF6F0] text-lg shadow-xs">🛵</span>
                            <p class="text-[11px] sm:text-xs font-black text-[#241812] mt-1.5">Antar Toko</p>
                            <p class="text-[10px] text-[#695C51]">Bisa COD</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Abstract Sculptural Showcase Display (Organic Arch, Bukan Kotak Card) -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm sm:max-w-md animate-float-3d">
                        
                        <!-- Main Abstract Showcase Frame (Organic Arch Silhouette) -->
                        <div class="relative p-2.5 sm:p-3 rounded-[54px_22px_60px_28px] bg-gradient-to-b from-[#FAF7F1] via-[#EFE9DF] to-[#E2D5C3] shadow-[0_20px_40px_-10px_rgba(35,25,18,0.35)] border border-[#D5C9B8]">
                            <div class="relative aspect-[4/3.5] rounded-[46px_16px_52px_22px] overflow-hidden bg-[#ECE4D8]">
                                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80" 
                                    alt="Artisan Pastry Mey Bakery" 
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#140F0C]/80 via-transparent to-transparent"></div>
                                
                                <div class="absolute bottom-3.5 left-3.5 right-3.5 text-white flex items-end justify-between">
                                    <div>
                                        <span class="text-[9px] uppercase font-bold text-[#DDD3C7] tracking-wider block">Karya Resep Autentik</span>
                                        <h4 class="font-serif text-sm sm:text-base font-bold leading-tight text-[#F4EFE6]">Mey Signature Cake & Pastry</h4>
                                    </div>
                                    <span class="abstract-blob w-12 h-7 bg-[#3B2C22] text-[#F5EFE6] text-[10px] font-bold border border-[#9E8B78]/40 shadow-xs">Fresh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Abstract Liquid Badge 1: Rating Pelanggan -->
                        <div class="absolute -top-4 -left-3 bg-[#FAF7F1]/95 px-4 py-2.5 rounded-[24px_10px_26px_12px] border border-[#D5C9B8] shadow-[0_6px_18px_rgba(0,0,0,0.14)] flex items-center gap-2.5">
                            <span class="w-7 h-7 abstract-blob bg-[#EFE9DF] text-xs text-[#B89658]">★</span>
                            <div>
                                <p class="text-xs font-black text-[#241812] leading-none">4.9 / 5.0</p>
                                <p class="text-[9px] text-[#695C51] font-semibold mt-0.5">Rating Kepuasan</p>
                            </div>
                        </div>

                        <!-- Floating Abstract Liquid Badge 2: Jaminan Kualitas -->
                        <div class="absolute -bottom-4 -right-2 bg-gradient-to-r from-[#2B211A] to-[#3D2F25] text-white px-4 py-2.5 rounded-[12px_26px_14px_24px] border border-white/15 shadow-[0_8px_20px_rgba(0,0,0,0.25)] flex items-center gap-2.5">
                            <span class="w-7 h-7 abstract-blob bg-white/10 text-xs">✨</span>
                            <div>
                                <p class="text-xs font-bold leading-none text-[#F4EFE6]">100% Halal</p>
                                <p class="text-[9px] text-[#C5B49F] font-medium mt-0.5">Dapur Higienis</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             2. SECTION: PENILAIAN PELANGGAN (ORGANIC DIALOGUE PEBBLES, BUKAN KOTAK2 KAKU)
             ============================================================== -->
        <section class="space-y-6 pt-2">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-white/15 pb-4">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Ulasan Jujur</span>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Penilaian Pelanggan</h2>
                </div>
                <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20 px-4 py-2 rounded-full text-xs font-bold text-[#FAF6F0] backdrop-blur-md shadow-xs self-start sm:self-auto">
                    <span class="w-5 h-5 abstract-blob bg-[#E5D2BC]/30 text-[#E5D2BC] text-xs">★</span>
                    <span>4.9 / 5.0</span>
                    <span class="text-[#D5C7B8] font-normal">• 500+ Pelanggan Puas</span>
                </div>
            </div>

            <!-- 4 Dialogue Stones / Asymmetric Organic Pebbles -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- Review 1: Organic Pebble A -->
                <div class="pebble-panel rounded-[38px_14px_42px_18px] p-6 space-y-3.5 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-[#EAE2D5] text-[#B89658] text-sm">★</span>
                            <span class="text-xs font-black text-[#7A604A]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Roti sangat empuk dan aromanya khas butter premium. Kuenya tidak kemanisan, keluarga sangat suka!"
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9] flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#6E5A4B] text-[#FAF6F0] text-[10px] font-bold">SA</span>
                        <div>
                            <p class="font-bold text-xs text-[#241812]">Sarah Angelina</p>
                            <span class="text-[10px] text-[#695C51] block">Lamongan • Verified Buyer</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2: Organic Pebble B -->
                <div class="pebble-panel rounded-[16px_40px_18px_36px] p-6 space-y-3.5 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-[#EAE2D5] text-[#B89658] text-sm">★</span>
                            <span class="text-xs font-black text-[#7A604A]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Pesan dadakan untuk ulang tahun, pengiriman kurir toko tepat waktu dan hiasan kuenya rapi banget."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9] flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#4A3B31] text-[#FAF6F0] text-[10px] font-bold">DP</span>
                        <div>
                            <p class="font-bold text-xs text-[#241812]">Dimas Prasetyo</p>
                            <span class="text-[10px] text-[#695C51] block">Pelanggan Tetap</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3: Organic Pebble C -->
                <div class="pebble-panel rounded-[36px_18px_34px_22px] p-6 space-y-3.5 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-[#EAE2D5] text-[#B89658] text-sm">★</span>
                            <span class="text-xs font-black text-[#7A604A]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Pastry dan croissant-nya renyah di luar, lembut di dalam. Selalu pesan rutin buat teman kopi pagi."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9] flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#5C493B] text-[#FAF6F0] text-[10px] font-bold">LK</span>
                        <div>
                            <p class="font-bold text-xs text-[#241812]">Linda Kurnia</p>
                            <span class="text-[10px] text-[#695C51] block">Verified Buyer</span>
                        </div>
                    </div>
                </div>

                <!-- Review 4: Organic Pebble D -->
                <div class="pebble-panel rounded-[20px_36px_16px_40px] p-6 space-y-3.5 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 abstract-blob bg-[#EAE2D5] text-[#B89658] text-sm">★</span>
                            <span class="text-xs font-black text-[#7A604A]">5.0 Bintang</span>
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Sistem pesanannya sangat mudah, invoice keluar otomatis dan respon via WhatsApp super ramah."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9] flex items-center gap-2.5">
                        <span class="w-7 h-7 abstract-blob bg-[#3B2F26] text-[#FAF6F0] text-[10px] font-bold">RF</span>
                        <div>
                            <p class="font-bold text-xs text-[#241812]">Reza Firmansyah</p>
                            <span class="text-[10px] text-[#695C51] block">Pembeli Online</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             3. SECTION: ALAMAT TOKO & TITIK LOKASI GOOGLE MAPS (ORGANIC SCULPTURAL DESIGN)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b border-white/15 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Lokasi Fisik Gerai</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Alamat Toko</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 sm:gap-6 items-stretch">
                
                <!-- Left: Informasi Detail Alamat (Organic Asymmetric Shape) -->
                <div class="md:col-span-5 pebble-panel rounded-[42px_16px_48px_22px] p-6 sm:p-7 flex flex-col justify-between space-y-5 text-[#241812]">
                    <div class="space-y-4">
                        <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#6E5A4B] to-[#9E8672] text-white flex items-center justify-center font-bold text-xl shadow-md">
                            <span>📍</span>
                        </div>
                        
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#695C51] tracking-wider block">Alamat Resmi</span>
                            <p class="font-bold text-sm sm:text-base text-[#241812] leading-snug mt-1">
                                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
                            </p>
                        </div>

                        <div class="pt-2 border-t border-[#DFD6C9] space-y-2 text-xs text-[#52443A]">
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#241812]">Jam Buka:</span>
                                <span>07.30 – 21.00 WIB (Setiap Hari)</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-[#241812]">Layanan:</span>
                                <span>Kurir Toko, Pick-up, & COD</span>
                            </p>
                        </div>
                    </div>

                    <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank"
                        class="w-full inline-flex items-center justify-center gap-2.5 px-5 py-3.5 rounded-full font-bold text-xs text-[#241812] bg-[#EAE2D5] hover:bg-[#DFD5C6] border border-[#C2B3A0] shadow-[0_3px_0_#B8A795] active:translate-y-0.5 active:shadow-none transition-all">
                        <span>Buka Titik di Google Maps</span>
                        <span class="w-5 h-5 abstract-blob bg-white/70 text-xs">↗</span>
                    </a>
                </div>

                <!-- Right: Google Maps Embed Card (Sculptural Organic Silhouette) -->
                <div class="md:col-span-7 h-72 sm:h-80 md:h-full min-h-[300px] rounded-[22px_48px_24px_42px] overflow-hidden border border-[#D5C9B8] shadow-[0_16px_36px_-10px_rgba(35,25,18,0.28)] bg-[#EBE3D6]">
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
             4. SECTION: SOSIAL MEDIA RESMI BRAND (ABSTRACT LIQUID PODS)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b border-white/15 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#D5C7B8] block">Komunikasi Langsung</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#FAF6F0] tracking-tight mt-0.5">Sosial Media</h2>
            </div>

            <!-- 3 Abstract Fluid Pods (Bukan Kotak Card Biasa) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 text-[#241812]">
                
                <!-- Instagram: Abstract Fluid Pod -->
                <a href="https://instagram.com" target="_blank" 
                    class="pebble-panel rounded-[36px_14px_38px_18px] p-5 flex items-center gap-3.5 group">
                    <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#833AB4] to-[#C13584] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-105 transition-transform">
                        <span>📸</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#695C51] tracking-wider block">Instagram</span>
                        <p class="font-bold text-sm text-[#241812] group-hover:text-[#6E5A4B] transition-colors">@meybakery.official</p>
                        <p class="text-[10px] text-[#8C7E72] mt-0.5">Galeri foto roti & update harian</p>
                    </div>
                </a>

                <!-- TikTok: Abstract Fluid Pod -->
                <a href="https://tiktok.com" target="_blank" 
                    class="pebble-panel rounded-[16px_38px_18px_34px] p-5 flex items-center gap-3.5 group">
                    <div class="w-12 h-12 abstract-blob bg-[#2D231C] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-105 transition-transform border border-white/15">
                        <span>🎵</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#695C51] tracking-wider block">TikTok</span>
                        <p class="font-bold text-sm text-[#241812] group-hover:text-[#6E5A4B] transition-colors">@meybakery</p>
                        <p class="text-[10px] text-[#8C7E72] mt-0.5">Video seru proses baking oven</p>
                    </div>
                </a>

                <!-- WhatsApp: Abstract Fluid Pod -->
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20memesan" target="_blank" 
                    class="pebble-panel rounded-[34px_16px_36px_20px] p-5 flex items-center gap-3.5 group">
                    <div class="w-12 h-12 abstract-blob bg-gradient-to-tr from-[#059669] to-[#10B981] text-white flex items-center justify-center text-xl shadow-md shrink-0 group-hover:scale-105 transition-transform">
                        <span>💬</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-emerald-800 tracking-wider block">WhatsApp Resmi</span>
                        <p class="font-bold text-sm text-[#241812] group-hover:text-emerald-700 transition-colors">0812-3456-7890</p>
                        <p class="text-[10px] text-[#8C7E72] mt-0.5">Chat langsung pesanan khusus</p>
                    </div>
                </a>

            </div>
        </section>

    </main>

    <!-- 5. FOOTER MINIMALIS VINTAGE ELEGAN (ORGANIC FLOW) -->
    <footer class="bg-[#382E28]/95 border-t border-white/15 py-8 text-center text-xs text-[#D5C7B8] mt-12 relative z-10">
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
                const swayAngle = (idx % 2 === 0 ? 1 : -1) * 10;
                const floatLift = dir * -12;
                blob.style.transform = `translateY(${floatLift}px) rotate(${swayAngle}deg) scale(1.15)`;
                blob.style.filter = 'drop-shadow(0 12px 24px rgba(220, 190, 155, 0.55))';
            });

            clearTimeout(isScrollingTimer);
            isScrollingTimer = setTimeout(() => {
                blobs.forEach(blob => {
                    // Meluncur kembali secara halus selama sisa transisi 5 detik
                    blob.style.transform = 'translateY(0px) rotate(0deg) scale(1)';
                    blob.style.filter = 'none';
                });
            }, 700);
        }, { passive: true });
    </script>

</body>
</html>
