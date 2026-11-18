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
            background: linear-gradient(150deg, #0E0C0B 0%, #171412 25%, #221B17 50%, #15181C 75%, #0B0A09 100%);
            background-attachment: fixed;
        }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* Custom Scrollbar Vintage */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #12100F; }
        ::-webkit-scrollbar-thumb { background: #3D332B; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #6E5A4B; }

        /* 3D Motion Keyframe Animations */
        @keyframes float3d {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-10px) rotate(0.8deg);
            }
        }

        .animate-float-3d {
            animation: float3d 5s ease-in-out infinite;
        }

        /* Vintage Translucent Card: Natural Parchment with Blur & Muted 3D Depth */
        .card-vintage {
            background: rgba(246, 241, 233, 0.90);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1.5px solid rgba(215, 203, 188, 0.85);
            box-shadow: 0 8px 0 #A39483, 0 20px 40px rgba(0, 0, 0, 0.4);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-vintage:hover {
            transform: translateY(-6px);
            background: rgba(250, 246, 240, 0.95);
            border-color: #9E8975;
            box-shadow: 0 12px 0 #8E7F6F, 0 26px 48px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="text-white antialiased min-h-screen flex flex-col selection:bg-[#B5A18C]/40 selection:text-white overflow-x-hidden relative">

    <!-- AMBIENT COLOR GLOWS (VINTAGE WARM SEPIA, AGED SLATE & ESPRESSO) -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] rounded-full bg-[#9E8268]/12 blur-[130px]"></div>
        <div class="absolute top-1/3 right-10 w-[600px] h-[600px] rounded-full bg-[#3B4048]/18 blur-[140px]"></div>
        <div class="absolute bottom-10 left-10 w-[600px] h-[600px] rounded-full bg-[#2D1F17]/25 blur-[120px]"></div>
    </div>

    <!-- 1. SLIM VINTAGE ACCENT RIBBON -->
    <div class="h-[2px] bg-gradient-to-r from-[#3D342D] via-[#635345] via-[#A89682] to-[#3D342D] w-full relative z-50"></div>

    <!-- 2. NAVBAR MINIMALIS BERSIH (VINTAGE TRANSPARAN & NATURAL ELEGAN) -->
    <header class="sticky top-0 z-40 bg-[#13100E]/85 backdrop-blur-md border-b border-white/10 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Monogram & Title (Vintage Translucent Emblem) -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3.5 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-gradient-to-br from-[#2D231C]/90 via-[#42342A]/90 to-[#5C493B]/90 backdrop-blur-md text-[#F4EFE6] flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_4px_12px_rgba(0,0,0,0.35)] border border-[#C5B49F]/40 group-hover:scale-105 group-hover:rotate-2 transition-all duration-300">
                    M
                </div>
                <div>
                    <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#F4EFE6] block leading-tight group-hover:text-[#DDD3C7] transition-colors">Mey Bakery.</span>
                    <span class="text-[10px] tracking-widest uppercase text-[#9E9387] font-bold block">Artisan Bakes & Cakes</span>
                </div>
            </a>

            <!-- Status Operasional Dapur Toko (Vintage Frosted Glass Pill) -->
            <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-1.5 rounded-full text-xs font-semibold text-[#DDD5CB] backdrop-blur-md shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#B89C7D] animate-ping"></span>
                <span>Dapur Buka • 07.30 – 21.00 WIB</span>
            </div>

        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-14 space-y-12 sm:space-y-16 relative z-10">

        <!-- ==============================================================
             1. SECTION: PROFIL TOKO & SELAMAT DATANG + TOMBOL "MULAI" (VINTAGE TRANSPARAN 3D)
             ============================================================== -->
        <section class="card-vintage rounded-3xl sm:rounded-4xl p-6 sm:p-10 md:p-14 overflow-hidden relative text-[#241812]">
            <!-- Subtle Vintage Interior Radial Tint -->
            <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#B5A18C]/10 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#EAE2D5]/30 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- Left Column: Profil & CTA Mulai -->
                <div class="lg:col-span-7 space-y-5 text-center sm:text-left">
                    <div class="inline-flex items-center gap-2 bg-[#EAE2D5]/80 text-[#544335] border border-[#CBBDAA] px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-wide shadow-xs">
                        <span>✨</span>
                        <span>Mey Bakery • Profil Resmi Toko</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl md:text-5xl lg:text-6xl font-serif font-black text-[#241812] leading-[1.12] tracking-tight">
                        Selamat Datang di <span class="bg-gradient-to-r from-[#3D2C21] via-[#6B533E] to-[#423125] bg-clip-text text-transparent italic">Mey Bakery</span>
                    </h1>

                    <p class="text-sm sm:text-base md:text-lg text-[#52443A] font-normal leading-relaxed max-w-xl">
                        Kelezatan artisan roti hangat dan kue istimewa, dipanggang baru setiap pagi dari dapur rumahan dengan bahan alami pilihan terbaik.
                    </p>

                    <!-- TOMBOL UTAMA: "MULAI BELANJA" (VINTAGE ESPRESSO ELEGAN, SENATURAL TAPI ELEGAN) -->
                    <div class="pt-3 flex flex-col sm:flex-row items-center justify-center sm:justify-start gap-4">
                        <a href="{{ route('shop') }}" 
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 sm:px-10 py-4 sm:py-4.5 rounded-2xl font-black text-sm sm:text-base text-[#F5EFE6] tracking-wide hover:-translate-y-1 hover:brightness-110 active:translate-y-1 transition-all duration-200 cursor-pointer select-none group"
                            style="background: linear-gradient(180deg, #44352A 0%, #2A2019 100%); border-top: 1px solid rgba(230, 215, 195, 0.35); border-bottom: 2px solid #1A130F; box-shadow: 0 6px 0 #1A130F, 0 14px 28px rgba(0, 0, 0, 0.4);">
                            <span>Mulai Belanja</span>
                            <span class="text-lg group-hover:translate-x-2 transition-transform duration-200">→</span>
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20tanya%20seputar%20menu" target="_blank"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl font-bold text-xs sm:text-sm text-[#241812] bg-[#EFE9DF]/80 hover:bg-[#E5DDD0] border border-[#C8BAA9] shadow-[0_3px_0_#B8A795] active:translate-y-1 active:shadow-none transition-all">
                            <span>💬 Tanya WhatsApp</span>
                        </a>
                    </div>

                    <!-- 3 Ringkasan Profil Unggulan Vintage 3D -->
                    <div class="grid grid-cols-3 gap-2.5 sm:gap-3.5 pt-4 max-w-lg">
                        <div class="bg-[#EAE2D5]/80 p-3 rounded-2xl border border-[#D5C9B8] shadow-[0_3px_0_#C2B3A0] text-center">
                            <span class="text-base block">🌾</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#241812] mt-0.5">Bahan Murni</p>
                            <p class="text-[10px] text-[#695C51]">Tanpa pengawet</p>
                        </div>
                        <div class="bg-[#EAE2D5]/80 p-3 rounded-2xl border border-[#D5C9B8] shadow-[0_3px_0_#C2B3A0] text-center">
                            <span class="text-base block">🔥</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#241812] mt-0.5">Fresh Oven</p>
                            <p class="text-[10px] text-[#695C51]">Pagi tiap hari</p>
                        </div>
                        <div class="bg-[#EAE2D5]/80 p-3 rounded-2xl border border-[#D5C9B8] shadow-[0_3px_0_#C2B3A0] text-center">
                            <span class="text-base block">🛵</span>
                            <p class="text-[11px] sm:text-xs font-bold text-[#241812] mt-0.5">Antar Toko</p>
                            <p class="text-[10px] text-[#695C51]">Bisa COD</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: 3D Aesthetic Floating Showcase Card Vintage -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm sm:max-w-md animate-float-3d">
                        
                        <!-- Main 3D Showcase Image Card -->
                        <div class="relative bg-[#FAF7F1]/95 p-3.5 sm:p-4 rounded-3xl border border-[#D5C9B8] shadow-[0_10px_0_#A89A89,0_20px_40px_rgba(0,0,0,0.25)] overflow-hidden">
                            <div class="relative aspect-[4/3.5] rounded-2xl overflow-hidden bg-[#ECE4D8]">
                                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80" 
                                    alt="Artisan Pastry Mey Bakery" 
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#140F0C]/80 via-transparent to-transparent"></div>
                                
                                <div class="absolute bottom-3 left-3 right-3 text-white flex items-end justify-between">
                                    <div>
                                        <span class="text-[9px] uppercase font-bold text-[#DDD3C7] tracking-wider block">Karya Resep Autentik</span>
                                        <h4 class="font-serif text-sm sm:text-base font-bold leading-tight text-[#F4EFE6]">Mey Signature Cake & Pastry</h4>
                                    </div>
                                    <span class="bg-[#3B2C22] text-[#F5EFE6] text-[10px] font-bold px-2 py-0.5 rounded-lg border border-[#9E8B78]/40 shadow-xs">Fresh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating 3D Badge 1: Rating Pelanggan Vintage -->
                        <div class="absolute -top-4 -left-4 bg-[#FAF7F1]/95 px-3.5 py-2 rounded-2xl border border-[#D5C9B8] shadow-[0_4px_0_#B8A795,0_8px_16px_rgba(0,0,0,0.12)] flex items-center gap-2">
                            <span class="text-sm text-[#B89658]">★</span>
                            <div>
                                <p class="text-xs font-black text-[#241812] leading-none">4.9 / 5.0</p>
                                <p class="text-[9px] text-[#695C51] font-semibold mt-0.5">Rating Kepuasan</p>
                            </div>
                        </div>

                        <!-- Floating 3D Badge 2: Jaminan Kualitas Vintage -->
                        <div class="absolute -bottom-4 -right-3 bg-gradient-to-r from-[#2B211A] to-[#3D2F25] text-white px-4 py-2 rounded-2xl border border-white/10 shadow-[0_4px_0_#140F0B,0_10px_20px_rgba(0,0,0,0.3)] flex items-center gap-2">
                            <span class="text-sm">✨</span>
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
             2. SECTION: PENILAIAN PELANGGAN (VINTAGE TRANSPARAN 3D)
             ============================================================== -->
        <section class="space-y-6 pt-2">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 border-b border-white/10 pb-4">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-[#B5A18C] block">Ulasan Jujur</span>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#F4EFE6] tracking-tight mt-0.5">Penilaian Pelanggan</h2>
                </div>
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 px-4 py-2 rounded-full text-xs font-bold text-[#EFEAE2] backdrop-blur-md shadow-xs self-start sm:self-auto">
                    <span class="text-[#B89658]">★ 4.9 / 5.0</span>
                    <span class="text-[#B0A59A] font-normal">• 500+ Pelanggan Puas</span>
                </div>
            </div>

            <!-- 4 Kartu Penilaian Vintage Transparan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- Review 1 -->
                <div class="card-vintage rounded-3xl p-5 space-y-3 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#B89658] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Roti sangat empuk dan aromanya khas butter premium. Kuenya tidak kemanisan, keluarga sangat suka!"
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9]">
                        <p class="font-bold text-xs text-[#241812]">Sarah Angelina</p>
                        <span class="text-[10px] text-[#695C51] block">Lamongan • Verified Buyer</span>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card-vintage rounded-3xl p-5 space-y-3 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#B89658] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Pesan dadakan untuk ulang tahun, pengiriman kurir toko tepat waktu dan hiasan kuenya rapi banget."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9]">
                        <p class="font-bold text-xs text-[#241812]">Dimas Prasetyo</p>
                        <span class="text-[10px] text-[#695C51] block">Pelanggan Tetap</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="card-vintage rounded-3xl p-5 space-y-3 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#B89658] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Pastry dan croissant-nya renyah di luar, lembut di dalam. Selalu pesan rutin buat teman kopi pagi."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9]">
                        <p class="font-bold text-xs text-[#241812]">Linda Kurnia</p>
                        <span class="text-[10px] text-[#695C51] block">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="card-vintage rounded-3xl p-5 space-y-3 flex flex-col justify-between text-[#241812]">
                    <div class="space-y-2">
                        <div class="flex items-center gap-1 text-[#B89658] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D3025] leading-relaxed font-medium">
                            "Sistem pesanannya sangat mudah, invoice keluar otomatis dan respon via WhatsApp super ramah."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#DFD6C9]">
                        <p class="font-bold text-xs text-[#241812]">Reza Firmansyah</p>
                        <span class="text-[10px] text-[#695C51] block">Pembeli Online</span>
                    </div>
                </div>

            </div>
        </section>


        <!-- ==============================================================
             3. SECTION: ALAMAT TOKO & TITIK LOKASI GOOGLE MAPS (VINTAGE TRANSPARAN 3D)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b border-white/10 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#B5A18C] block">Lokasi Fisik Gerai</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#F4EFE6] tracking-tight mt-0.5">Alamat Toko</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-5 sm:gap-6 items-stretch">
                
                <!-- Left: Informasi Detail Alamat (Card Vintage) -->
                <div class="md:col-span-5 card-vintage rounded-3xl p-6 flex flex-col justify-between space-y-5 text-[#241812]">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-[#EAE2D5] text-[#544335] border border-[#CBBDAA] flex items-center justify-center font-bold text-lg shadow-xs">
                            📍
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
                        class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl font-bold text-xs text-[#241812] bg-[#EAE2D5] hover:bg-[#DFD5C6] border border-[#C2B3A0] shadow-[0_3px_0_#B8A795] active:translate-y-0.5 active:shadow-none transition-all">
                        <span>Buka Titik di Google Maps</span>
                        <span>↗</span>
                    </a>
                </div>

                <!-- Right: Google Maps Embed Card (Container Vintage 3D) -->
                <div class="md:col-span-7 h-72 sm:h-80 md:h-full min-h-[300px] rounded-3xl overflow-hidden border border-[#D5C9B8] shadow-[0_8px_0_#A39483,0_20px_40px_rgba(0,0,0,0.4)] bg-[#EBE3D6]">
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
             4. SECTION: SOSIAL MEDIA RESMI BRAND (VINTAGE TRANSPARAN 3D)
             ============================================================== -->
        <section class="space-y-5 pt-2">
            <div class="border-b border-white/10 pb-4">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#B5A18C] block">Komunikasi Langsung</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#F4EFE6] tracking-tight mt-0.5">Sosial Media</h2>
            </div>

            <!-- 3 Kartu Sosial Media Vintage Transparan 3D -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 text-[#241812]">
                
                <!-- Instagram -->
                <a href="https://instagram.com" target="_blank" 
                    class="card-vintage p-5 rounded-3xl flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#833AB4] to-[#C13584] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform">
                        📸
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#695C51] tracking-wider block">Instagram</span>
                        <p class="font-bold text-sm text-[#241812] group-hover:text-[#6E5A4B] transition-colors">@meybakery.official</p>
                        <p class="text-[10px] text-[#8C7E72] mt-0.5">Galeri foto roti & update harian</p>
                    </div>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com" target="_blank" 
                    class="card-vintage p-5 rounded-3xl flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#1C1815] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform border border-white/10">
                        🎵
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#695C51] tracking-wider block">TikTok</span>
                        <p class="font-bold text-sm text-[#241812] group-hover:text-[#6E5A4B] transition-colors">@meybakery</p>
                        <p class="text-[10px] text-[#8C7E72] mt-0.5">Video seru proses baking oven</p>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20memesan" target="_blank" 
                    class="card-vintage p-5 rounded-3xl flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#059669] to-[#10B981] text-white flex items-center justify-center text-xl shadow-xs shrink-0 group-hover:scale-105 transition-transform">
                        💬
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

    <!-- 5. FOOTER MINIMALIS VINTAGE GELAP ELEGAN -->
    <footer class="bg-[#0B0908]/95 border-t border-white/10 py-8 text-center text-xs text-[#9E9387] mt-12 relative z-10">
        <div class="max-w-6xl mx-auto px-4 space-y-2">
            <div class="flex items-center justify-center gap-2">
                <span class="w-6 h-6 rounded-lg bg-[#3D3025] text-[#F4EFE6] flex items-center justify-center font-serif font-black text-xs shadow-xs border border-[#8C7A68]/30">M</span>
                <span class="font-serif font-black text-sm text-[#F4EFE6]">Mey Bakery.</span>
            </div>
            
            <p class="font-medium text-[#B8ADA2]">
                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
            </p>

            <p class="text-[11px] text-[#695E54] pt-1">
                © {{ date('Y') }} Mey Bakery. Artisan Fresh Bakes & Pâtisserie.
            </p>
        </div>
    </footer>

</body>
</html>
