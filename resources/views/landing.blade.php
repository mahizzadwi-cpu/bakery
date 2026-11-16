<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Artisan Fresh Bakes & Pâtisserie</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Modern Classic Serif & Crisp Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FAF7F0] text-[#2C1A11] antialiased min-h-screen flex flex-col selection:bg-[#F3E5C8] selection:text-[#3D251A]">

    <!-- 1. STICKY MODERN CLASSIC NAVBAR (PERPADUAN ABU, COKLAT, OREN GOLD & VANILA) -->
    <header class="sticky top-0 z-40 transition-all duration-300">
        <!-- Slim Multi-Harmonic Accent Ribbon: Abu Slate -> Coklat Pekat -> Oren Gold -> Vanila -->
        <div class="h-[3px] bg-gradient-to-r from-[#64748B] via-[#3D251A] via-[#D49B35] to-[#F5EFE4] w-full"></div>

        <div class="bg-[#FFFDF9]/95 backdrop-blur-md border-b border-[#E2DDD5] shadow-xs relative">
            <div class="w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12 h-16 sm:h-20 flex items-center justify-between gap-4">
                
                <!-- Brand Monogram & Title: Coklat Klasik & Oren Gold -->
                <a href="{{ route('landing') }}" class="flex items-center gap-3 shrink-0 group">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#D49B35] text-white flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_3px_0_#1D120B] border border-white/30 group-hover:scale-105 transition-transform duration-200">
                        M
                    </div>
                    <div>
                        <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#2C1A11] block leading-tight">Mey Bakery.</span>
                        <span class="text-[10px] tracking-widest uppercase text-[#7A7570] font-extrabold block mt-0.5">Artisan Bakes & Cakes</span>
                    </div>
                </a>

                <!-- Tampilan Kanan: Status Operasional Abu-Vanila & Layanan -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Status Dapur: Abu Modern & Aksen Emas Vanila -->
                    <div class="inline-flex items-center gap-2 bg-[#F1EDE6] border border-[#E2DDD5] px-3.5 py-1.5 sm:py-2 rounded-full text-xs font-bold text-[#374151] shadow-2xs">
                        <span class="relative flex h-2 w-2 shrink-0">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#DF9A28] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#C98224]"></span>
                        </span>
                        <span>Dapur Buka <span class="text-[#6B6661] font-semibold">• 07.30 – 21.00 WIB</span></span>
                    </div>

                    <!-- Badge Layanan: Vanila & Garis Abu -->
                    <div class="hidden sm:inline-flex items-center gap-1.5 bg-[#FFFDF9] border border-[#E2DDD5] text-[#5A544F] px-3 py-1.5 sm:py-2 rounded-full text-xs font-semibold shadow-2xs">
                        <svg class="w-3.5 h-3.5 text-[#C98224]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span>Antar Toko & COD</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- 2. HERO SECTION (MODERN KLASIK ESTETIK: ABU, COKLAT, OREN GOLD & VANILA) -->
    <section class="w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12 py-8 lg:py-14 xl:py-16">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-10 xl:gap-14 items-center">
            
            <!-- Left Narrative -->
            <div class="lg:col-span-7 xl:col-span-7 space-y-6">
                
                <div class="inline-flex items-center gap-2 bg-[#FFFDF9] border border-[#E2DDD5] text-[#6B6661] px-3.5 py-1.5 rounded-full text-xs font-semibold shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-[#DF9A28]"></span>
                    <span>Panggang Hangat Setiap Pagi • Bahan Alami Tanpa Pengawet</span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-serif font-bold text-[#2C1A11] leading-[1.18] tracking-tight">
                    Roti & Kue Hangat Setiap Pagi, <span class="bg-gradient-to-r from-[#C98224] via-[#DF9A28] to-[#8C4610] bg-clip-text text-transparent italic">Lezat dan Ramah di Kantong.</span>
                </h1>

                <p class="text-sm sm:text-base lg:text-lg text-[#6B6661] leading-relaxed max-w-2xl font-normal">
                    Dipanggang baru setiap hari dengan resep rumahan autentik. Tekstur lembut mengembang alami, rasa manis yang pas, dan aroma mentega murni hangat untuk keluarga tercinta.
                </p>

                <!-- Value Highlights (Vanila Cream & Abu 3D Cards) -->
                <div class="grid grid-cols-3 gap-3 pt-1 max-w-xl">
                    <div class="bg-white p-3.5 rounded-2xl border-2 border-[#D8C7B5] shadow-[0_3px_0_#CFC1AF] text-center">
                        <p class="text-xs sm:text-sm font-serif font-black text-[#1D120B]">Selalu Segar</p>
                        <p class="text-[11px] text-[#6B5E52] mt-0.5 leading-tight font-medium">Keluar oven tiap pagi</p>
                    </div>

                    <div class="bg-white p-3.5 rounded-2xl border-2 border-[#D8C7B5] shadow-[0_3px_0_#CFC1AF] text-center">
                        <p class="text-xs sm:text-sm font-serif font-black text-[#1D120B]">Harga Hemat</p>
                        <p class="text-[11px] text-[#6B5E52] mt-0.5 leading-tight font-medium">Rasa istimewa bersahabat</p>
                    </div>

                    <div class="bg-white p-3.5 rounded-2xl border-2 border-[#D8C7B5] shadow-[0_3px_0_#CFC1AF] text-center">
                        <p class="text-xs sm:text-sm font-serif font-black text-[#1D120B]">Layanan Praktis</p>
                        <p class="text-[11px] text-[#6B5E52] mt-0.5 leading-tight font-medium">Antar Toko & COD</p>
                    </div>
                </div>

                <!-- Call to Actions: 3D Tactile HD Buttons (Vibrant Oren Coral & Emerald Teal) -->
                <div class="pt-3 flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4">
                    <!-- Tombol 1: Lihat Etalase Belanja (Vibrant Orange Coral 3D Pill) -->
                    <a href="{{ route('shop') }}" 
                        class="w-full sm:w-auto relative inline-flex items-center justify-center gap-2.5 px-7 sm:px-8 py-3.5 sm:py-4 rounded-full font-black text-xs sm:text-sm text-white tracking-wide bg-gradient-to-r from-[#FF7A00] via-[#FF5722] to-[#FF3B56] border-t-2 border-white/60 shadow-[0_6px_0_#A82424,0_16px_30px_rgba(255,59,86,0.38)] hover:-translate-y-0.5 hover:shadow-[0_7px_0_#A82424,0_20px_36px_rgba(255,59,86,0.45)] active:translate-y-1.5 active:shadow-[0_1px_0_#A82424] transition-all duration-150 select-none cursor-pointer group">
                        <svg class="w-4 h-4 text-white shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span>Lihat Etalase Belanja</span>
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>

                    <!-- Tombol 2: Hubungi Admin (Vivid Emerald Teal 3D Pill) -->
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Mey%20Bakery,%20saya%20ingin%20tanya%20seputar%20menu%20dan%20pemesanan." target="_blank"
                        class="w-full sm:w-auto relative inline-flex items-center justify-center gap-2.5 px-7 sm:px-8 py-3.5 sm:py-4 rounded-full font-black text-xs sm:text-sm text-white tracking-wide bg-gradient-to-r from-[#059669] via-[#0D9488] to-[#0891B2] border-t-2 border-white/60 shadow-[0_6px_0_#064E3B,0_16px_30px_rgba(5,150,105,0.38)] hover:-translate-y-0.5 hover:shadow-[0_7px_0_#064E3B,0_20px_36px_rgba(5,150,105,0.45)] active:translate-y-1.5 active:shadow-[0_1px_0_#064E3B] transition-all duration-150 select-none cursor-pointer group">
                        <svg class="w-4 h-4 text-white shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.303-.058.116-.087.188-.173.289l-.26.303c-.087.087-.179.182-.077.357.101.174.453.748.973 1.211.669.595 1.233.78 1.407.867.173.087.275.072.376-.044.101-.116.433-.506.549-.679.116-.174.231-.145.39-.087s1.011.477 1.184.564c.173.087.289.13.332.202.044.072.044.419-.1.824z"/>
                        </svg>
                        <span>Hubungi Admin</span>
                    </a>
                </div>
            </div>

            <!-- Right Showcase Visual (Frame Vanila & Lis Abu) -->
            <div class="lg:col-span-5 xl:col-span-5">
                <div class="relative w-full rounded-3xl bg-[#FFFDF9] p-3 border border-[#E2DDD5] shadow-[0_10px_30px_rgba(44,26,17,0.08),0_4px_0_#E0D9CE] overflow-hidden">
                    <div class="relative aspect-[4/3] sm:aspect-[16/11] lg:aspect-[4/3.3] rounded-2xl overflow-hidden bg-[#F5EFE4]">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=1000&q=80" 
                            alt="Menu Mey Bakery" 
                            class="w-full h-full object-cover hover:scale-103 transition duration-500">
                        
                        <!-- Ambient Coklat & Oren Gold Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1D120B]/85 via-[#1D120B]/20 to-transparent"></div>
                        
                        <div class="absolute bottom-4 left-4 right-4 text-white flex items-end justify-between">
                            <div>
                                <span class="text-[10px] uppercase font-bold text-[#FDE68A] tracking-wider">Favorit Pelanggan</span>
                                <h3 class="font-serif text-base sm:text-lg font-bold leading-tight mt-0.5">Classic Chocolate Fudge Cake</h3>
                                <p class="text-xs text-[#E5DFD7] mt-0.5">Lembut, kaya rasa, resep autentik rumahan.</p>
                            </div>
                            <div class="text-right shrink-0 ml-2">
                                <span class="text-[10px] text-[#D4C8B8] block">Mulai</span>
                                <span class="text-sm font-bold text-white bg-[#1D120B]/70 backdrop-blur-md px-2.5 py-1 rounded-lg border border-white/20">Rp 25.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 3. SECTION: TENTANG KAMI & KEUNGGULAN (VANILA, ABU & COKLAT) -->
    <section id="tentang" class="py-12 md:py-16 border-t border-[#E2DDD5] bg-[#FFFDF9]">
        <div class="w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12">
            <div class="grid md:grid-cols-12 gap-8 md:gap-12 items-center">
                
                <div class="md:col-span-6 space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#C98224] block">Kualitas Tanpa Kompromi</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#2C1A11] leading-tight">
                        Rasa Istimewa yang Tetap Ramah di Kantong.
                    </h2>
                    <p class="text-xs sm:text-sm text-[#6B6661] leading-relaxed">
                        Di Mey Bakery, kami percaya bahwa roti dan kue yang enak tidak harus mahal. Kami memadukan bahan alami pilihan dengan resep rumahan yang autentik, dipanggang setiap hari agar Anda sekeluarga selalu menikmati sajian yang segar, harum, dan higienis.
                    </p>

                    <div class="space-y-3 pt-2 text-xs text-[#5A544F]">
                        <div class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#F1EDE6] text-[#2C1A11] flex items-center justify-center font-bold text-[10px] shrink-0 mt-0.5 border border-[#E2DDD5]">✓</div>
                            <span><strong>Bahan Segar Alami:</strong> Tanpa pengawet kimia dan tanpa pemanis buatan berlebih, aman untuk anak-anak dan keluarga.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#F1EDE6] text-[#2C1A11] flex items-center justify-center font-bold text-[10px] shrink-0 mt-0.5 border border-[#E2DDD5]">✓</div>
                            <span><strong>Harga Jujur & Transparan:</strong> Pemesanan langsung dari gerai tanpa potongan komisi pihak ketiga, harga lebih bersahabat.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#F1EDE6] text-[#2C1A11] flex items-center justify-center font-bold text-[10px] shrink-0 mt-0.5 border border-[#E2DDD5]">✓</div>
                            <span><strong>Praktis untuk Segala Acara:</strong> Siap melayani pesanan sarapan, camilan santai, hingga paket box snack untuk acara.</span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#C98224] hover:text-[#8C4610] transition">
                            <span>Jelajahi Pilihan Menu Lengkap</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-[0_3px_0_#E0D9CE] border border-[#E2DDD5] bg-[#F5EFE4]">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=700&q=80" 
                                    alt="Roti Pastry Segar" class="w-full h-full object-cover hover:scale-103 transition duration-500">
                            </div>
                            <div class="bg-[#FAF7F0] p-3 rounded-2xl border border-[#E2DDD5] text-center shadow-2xs">
                                <p class="text-sm font-serif font-bold text-[#2C1A11]">Tekstur Lembut</p>
                                <p class="text-[10px] text-[#7A7570]">Adonan mengembang alami</p>
                            </div>
                        </div>

                        <div class="space-y-4 pt-4">
                            <div class="bg-[#FAF7F0] p-3 rounded-2xl border border-[#E2DDD5] text-center shadow-2xs">
                                <p class="text-sm font-serif font-bold text-[#2C1A11]">Tanpa Pengawet</p>
                                <p class="text-[10px] text-[#7A7570]">Aman dikonsumsi harian</p>
                            </div>
                            <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-[0_3px_0_#E0D9CE] border border-[#E2DDD5] bg-[#F5EFE4]">
                                <img src="https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=700&q=80" 
                                    alt="Cheesecake Mey Bakery" class="w-full h-full object-cover hover:scale-103 transition duration-500">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. SECTION: MENU UNGGULAN (KARTU VANILA & AKSEN OREN GOLD) -->
    <section id="menu" class="py-12 md:py-16 w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12">
        
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#C98224] block">Paling Disukai</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-[#2C1A11] mt-0.5">Menu Favorit Pelanggan</h2>
                <p class="text-xs sm:text-sm text-[#7A7570] mt-1 max-w-md">Koleksi roti dan kue lezat yang paling sering dipesan setiap harinya.</p>
            </div>

            <a href="{{ route('shop') }}" 
                class="inline-flex items-center gap-1.5 text-xs font-bold text-[#2C1A11] hover:text-[#C98224] transition group shrink-0">
                <span>Lihat Seluruh Etalase</span>
                <span class="group-hover:translate-x-0.5 transition">→</span>
            </a>
        </div>

        <!-- Product Cards Grid: Vanila Ivory Cards with Abu Borders -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            @forelse($bestSellers as $item)
            <div class="bg-[#FFFDF9] rounded-2xl border border-[#E2DDD5] p-3 sm:p-3.5 flex flex-col justify-between shadow-[0_3px_0_#E0D9CE] hover:border-[#D49B35] hover:shadow-[0_8px_20px_rgba(201,130,36,0.15),0_3px_0_#C98224] transition-all duration-200 group">
                <div>
                    <!-- Visual Image -->
                    <div class="relative aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-[#F5EFE4]">
                        <img src="{{ $item->image_url ?? 'https://placehold.co/500x500/F5EFE4/2C1A11?text=Mey+Bakery' }}" 
                            alt="{{ $item->name }}" 
                            class="w-full h-full object-cover group-hover:scale-103 transition duration-300">
                        
                        <!-- Vanila & Oren Gold Category Badge -->
                        <span class="absolute top-2 left-2 bg-[#FFF8E7] text-[#9A6216] font-bold text-[9px] px-2.5 py-0.5 rounded-md border border-[#F3DEB2] shadow-2xs">
                            {{ $item->category }}
                        </span>

                        @if($item->stock > 0)
                            <span class="absolute bottom-2 right-2 bg-[#2C1A11]/85 backdrop-blur-sm text-white font-medium text-[9px] px-2 py-0.5 rounded">
                                Stok: {{ $item->stock }}
                            </span>
                        @endif
                    </div>

                    <!-- Title & Description -->
                    <h3 class="font-serif font-bold text-sm text-[#2C1A11] leading-snug line-clamp-1 group-hover:text-[#C98224] transition">
                        {{ $item->name }}
                    </h3>
                    <p class="text-[11px] text-[#6B6661] mt-1 line-clamp-2 leading-relaxed">
                        {{ $item->description }}
                    </p>
                </div>

                <div class="mt-3.5 pt-2.5 border-t border-[#EAE4DC] flex items-center justify-between">
                    <div>
                        <span class="text-[9px] text-[#7A7570] uppercase font-semibold block">Harga</span>
                        <span class="text-xs sm:text-sm font-black text-[#A85816]">Rp {{ number_format($item->price_idr, 0, ',', '.') }}</span>
                    </div>

                    <a href="{{ route('shop') }}" 
                        class="bg-[#2C1A11] hover:bg-[#C98224] text-[#FFFDF9] text-xs font-bold px-3 py-1.5 rounded-xl shadow-[0_2px_0_#140B06] active:translate-y-0.5 active:shadow-none transition duration-200">
                        Pesan
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12 bg-[#FFFDF9] rounded-2xl border border-[#E2DDD5] text-xs text-[#7A7570]">
                Belum ada produk aktif yang terdaftar di database.
            </div>
            @endforelse
        </div>

    </section>

    <!-- 5. SECTION: ULASAN PELANGGAN (WARM VANILA CANVAS) -->
    <section id="ulasan" class="py-12 md:py-16 bg-[#F5EFE4] border-y border-[#E2DDD5]">
        <div class="w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12">
            <div class="text-center max-w-lg mx-auto mb-8 space-y-1">
                <span class="text-xs font-bold uppercase tracking-wider text-[#C98224] block">Pengalaman Pembeli</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-[#2C1A11]">Apa Kata Pelanggan Kami?</h2>
                <p class="text-xs text-[#7A7570]">Ulasan asli dari pelanggan setia yang menikmati kelezatan Mey Bakery.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6">
                
                <!-- Review 1: Aksen Oren Gold -->
                <div class="bg-[#FFFDF9] p-5 rounded-2xl border border-[#E2DDD5] shadow-[0_2px_0_#E0D9CE] flex flex-col justify-between space-y-3">
                    <div>
                        <div class="text-[#DF9A28] text-xs mb-2">★★★★★</div>
                        <p class="text-xs text-[#5A544F] leading-relaxed">
                            "Roti lembutnya tahan empuk sampai sore tanpa rasa seret. Harganya sangat masuk akal dibanding toko bakery mall lainnya. Cocok buat langganan sarapan keluarga."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#EAE4DC] flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-[#DF9A28]/15 text-[#9A6216] font-black flex items-center justify-center text-xs">R</div>
                        <div>
                            <p class="text-xs font-serif font-bold text-[#2C1A11]">Rini Wulandari</p>
                            <p class="text-[10px] text-[#7A7570]">Ibu Rumah Tangga</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2: Aksen Abu Modern -->
                <div class="bg-[#FFFDF9] p-5 rounded-2xl border border-[#E2DDD5] shadow-[0_2px_0_#E0D9CE] flex flex-col justify-between space-y-3">
                    <div>
                        <div class="text-[#DF9A28] text-xs mb-2">★★★★★</div>
                        <p class="text-xs text-[#5A544F] leading-relaxed">
                            "Pesan paket box kue untuk acara arisan dan kantor. Semuanya rapi, rasanya enak tidak bikin eneg, dan pengiriman kurirnya tepat waktu. Sangat recommended!"
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#EAE4DC] flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-[#64748B]/15 text-[#374151] font-black flex items-center justify-center text-xs">B</div>
                        <div>
                            <p class="text-xs font-serif font-bold text-[#2C1A11]">Bagus Setiawan</p>
                            <p class="text-[10px] text-[#7A7570]">Pesanan Box Acara</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3: Aksen Coklat Klasik -->
                <div class="bg-[#FFFDF9] p-5 rounded-2xl border border-[#E2DDD5] shadow-[0_2px_0_#E0D9CE] flex flex-col justify-between space-y-3">
                    <div>
                        <div class="text-[#DF9A28] text-xs mb-2">★★★★★</div>
                        <p class="text-xs text-[#5A544F] leading-relaxed">
                            "Suka banget sama sistem pemesanan di webnya, langsung ada barcode QRIS dan pilihan rekening transfer yang jelas. Sangat simpel dan bebas ribet."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#EAE4DC] flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-[#3D251A]/15 text-[#2C1A11] font-black flex items-center justify-center text-xs">D</div>
                        <div>
                            <p class="text-xs font-serif font-bold text-[#2C1A11]">Dina Maharani</p>
                            <p class="text-[10px] text-[#7A7570]">Pelanggan Online</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. SECTION: LOKASI & KONTAK RESMI -->
    <section id="lokasi" class="py-12 md:py-16 w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12">
        <div class="grid md:grid-cols-12 gap-8 items-center">
            
            <div class="md:col-span-6 space-y-4">
                <span class="text-xs font-bold uppercase tracking-wider text-[#C98224] block">Kunjungi Gerai Kami</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-[#2C1A11]">Pemesanan & Lokasi Gerai</h2>
                <p class="text-xs sm:text-sm text-[#6B6661] leading-relaxed">
                    Kami melayani pemesanan langsung di gerai, pesanan katering snack box acara, kue ulang tahun, serta layanan kurir antar langsung ke alamat Anda.
                </p>

                <div class="space-y-2.5 pt-1 text-xs text-[#5A544F] bg-[#FFFDF9] p-4 rounded-2xl border border-[#E2DDD5] shadow-[0_2px_0_#E0D9CE]">
                    <div>
                        <span class="text-[#7A7570] font-semibold block text-[10px] uppercase">Alamat Gerai:</span>
                        <p class="font-bold text-[#2C1A11]">Jl. Cempaka No. 24, Sentra Kuliner Kota</p>
                    </div>
                    <div>
                        <span class="text-[#7A7570] font-semibold block text-[10px] uppercase">Jam Buka:</span>
                        <p class="font-bold text-[#2C1A11]">Buka Setiap Hari: 07.30 – 21.00 WIB</p>
                    </div>
                    <div>
                        <span class="text-[#7A7570] font-semibold block text-[10px] uppercase">Pilihan Layanan & Kontak:</span>
                        <p class="font-bold text-[#2C1A11]">Kurir Pengantaran Toko, Ambil Sendiri (Pick-up), & Bayar di Tempat (COD)</p>
                        <p class="text-[#A85816] font-bold text-xs mt-1">WhatsApp CS: 0812-3456-7890</p>
                    </div>
                </div>
            </div>

            <!-- Map Frame: Lis Abu & Latar Vanila -->
            <div class="md:col-span-6 h-72 sm:h-80 rounded-2xl overflow-hidden border border-[#E2DDD5] shadow-[0_3px_0_#E0D9CE] bg-[#F5EFE4]">
                <iframe 
                    class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2f768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

        </div>
    </section>

    <!-- 7. MINIMALIST FOOTER (COKLAT PEKAT, TEKS ABU, AKSEN EMAS) -->
    <footer class="bg-[#1D120B] text-[#9E948C] py-10 border-t border-[#312015] text-xs mt-auto">
        <div class="w-full max-w-[1400px] 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-10 xl:px-12 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div>
                <span class="text-sm font-serif font-bold text-white block">Mey Bakery.</span>
                <p class="text-[#7A7570] text-[11px] mt-0.5">Roti & Kue Segar Berkualitas • Dibuat dengan Rasa Sepenuh Hati</p>
            </div>

            <div class="flex items-center gap-5 text-xs text-[#D5C4B5]">
                <a href="{{ route('shop') }}" class="hover:text-[#DF9A28] transition">Menu Belanja</a>
                <a href="#tentang" class="hover:text-[#DF9A28] transition">Tentang Kami</a>
                <a href="#lokasi" class="hover:text-[#DF9A28] transition">Lokasi & Kontak</a>
                <a href="{{ route('login') }}" class="hover:text-[#DF9A28] transition text-[#7A7570]">Admin</a>
            </div>

            <p class="text-[#7A7570] text-[11px]">© {{ date('Y') }} Mey Bakery. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
