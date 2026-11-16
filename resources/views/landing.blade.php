<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Selamat Datang</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Modern Classic Serif & Crisp Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #FAF7F0; }
        ::-webkit-scrollbar-thumb { background: #D5CBC0; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #B8A99A; }

        .active-cat {
            background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%) !important;
            color: #ffffff !important;
            border-color: #7A3E05 !important;
            box-shadow: 0 3px 0 #7A3E05 !important;
        }
        .inactive-cat {
            background: #FFFFFF;
            color: #2C1A11;
            border-color: #E2DDD5;
        }
        .inactive-cat:hover {
            background: #FAF7F2;
            border-color: #C8B8A6;
        }

        [data-reveal] {
            transition: opacity 650ms ease, transform 650ms cubic-bezier(.2, .7, .2, 1);
        }
        .has-scroll-reveal [data-reveal]:not(.is-visible) {
            opacity: 0;
            transform: translateY(24px);
        }
        [data-reveal].is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .scroll-icon.is-visible {
            animation: icon-arrive 650ms cubic-bezier(.2, .7, .2, 1) both;
        }
        .hero-photo {
            animation: hero-drift 18s ease-in-out infinite alternate;
        }
        @keyframes icon-arrive {
            0% { opacity: .35; transform: translateY(8px) rotate(-12deg) scale(.8); }
            70% { transform: translateY(-2px) rotate(5deg) scale(1.12); }
            100% { opacity: 1; transform: translateY(0) rotate(0) scale(1); }
        }
        @keyframes hero-drift {
            from { transform: scale(1); }
            to { transform: scale(1.06); }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body class="bg-[#FAF7F0] text-[#2C1A11] antialiased min-h-screen flex flex-col selection:bg-[#F3E5C8] selection:text-[#3D251A]">

    <!-- 1. HEADER & NAVBAR MINIMALIS MODERN (ABU, COKLAT, OREN GOLD & VANILA) -->
    <header class="sticky top-0 z-40 bg-[#FFFDF9]/95 backdrop-blur-md border-b border-[#E2DDD5] shadow-xs">
        <!-- Accent Ribbon -->
        <div class="h-[3px] bg-gradient-to-r from-[#64748B] via-[#3D251A] via-[#DF851A] to-[#F5EFE4] w-full"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-4">
            <!-- Brand Monogram -->
            <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF851A] text-white flex items-center justify-center font-serif font-black text-lg sm:text-xl shadow-[0_3px_0_#1D120B] border border-white/30 group-hover:scale-105 transition-transform duration-200">
                    M
                </div>
                <div>
                    <span class="text-lg sm:text-xl font-serif font-black tracking-tight text-[#2C1A11] block leading-tight">Mey Bakery.</span>
                    <span class="text-[10px] tracking-widest uppercase text-[#7A6E65] font-bold block">Artisan Bakes & Cakes</span>
                </div>
            </a>

            <!-- Dapur Status Pill & Troli Belanja -->
            <div class="flex items-center gap-2.5 sm:gap-3">
                <div class="hidden sm:inline-flex items-center gap-2 bg-[#FAF7F2] border border-[#E2DDD5] px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#5A524A]">
                    <span class="w-2 h-2 rounded-full bg-[#DF851A] animate-pulse"></span>
                    <span>Dapur Buka • 07.30 – 21.00 WIB</span>
                </div>

                <!-- Tombol Troli Belanja -->
                <button type="button" onclick="toggleCartDrawer(true)" 
                    class="relative inline-flex items-center gap-2 bg-white hover:bg-[#FAF7F2] text-[#2C1A11] px-3.5 sm:px-4 py-2 rounded-xl border border-[#D5CBC0] shadow-sm active:translate-y-0.5 transition cursor-pointer text-xs font-bold">
                    <svg class="w-4 h-4 text-[#A85816]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="hidden sm:inline">Troli</span>
                    <span id="cartCountBadge" class="bg-[#DF851A] text-white font-black text-[10px] min-w-[18px] h-[18px] rounded-full flex items-center justify-center px-1">0</span>
                </button>

                <!-- Admin Link -->
                <a href="{{ route('admin.dashboard') }}" class="p-2 sm:px-3 sm:py-2 rounded-xl text-[#7A6E65] hover:text-[#2C1A11] hover:bg-[#FAF7F2] text-xs font-semibold transition" title="Pusat Kendali Admin">
                    <span class="hidden sm:inline">Admin ↗</span>
                    <span class="sm:hidden">⚙</span>
                </a>
            </div>
        </div>
    </header>

    <!-- FLOATING TOAST NOTIFICATION CONTAINER -->
    <div id="toast-container" class="fixed top-5 right-5 z-50 flex flex-col gap-2 max-w-sm w-full px-4 pointer-events-none">
        @if(session('success'))
            <div class="toast-item pointer-events-auto bg-[#FFFDF9] border-l-4 border-[#DF851A] shadow-[0_10px_25px_rgba(44,26,17,0.12)] rounded-2xl p-4 flex items-start gap-3 border border-[#E2DDD5]">
                <div class="w-7 h-7 rounded-xl bg-[#FFF8E7] text-[#9A6216] flex items-center justify-center font-bold text-xs shrink-0">✓</div>
                <div class="flex-1 pr-1">
                    <h5 class="text-xs font-bold text-[#2C1A11] uppercase tracking-wider">Berhasil</h5>
                    <p class="text-xs text-[#5A524A] mt-0.5 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button onclick="this.closest('.toast-item').remove()" class="text-[#8C7D70] hover:text-[#2C1A11] font-bold text-xs cursor-pointer">✕</button>
            </div>
        @endif
        @if(session('error'))
            <div class="toast-item pointer-events-auto bg-[#FFFDF9] border-l-4 border-rose-500 shadow-[0_10px_25px_rgba(44,26,17,0.12)] rounded-2xl p-4 flex items-start gap-3 border border-rose-200">
                <div class="w-7 h-7 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center font-bold text-xs shrink-0">✕</div>
                <div class="flex-1 pr-1">
                    <h5 class="text-xs font-bold text-rose-950 uppercase tracking-wider">Pemberitahuan</h5>
                    <p class="text-xs text-rose-800 mt-0.5 leading-relaxed">{{ session('error') }}</p>
                </div>
                <button onclick="this.closest('.toast-item').remove()" class="text-gray-400 hover:text-gray-700 font-bold text-xs cursor-pointer">✕</button>
            </div>
        @endif
    </div>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-12 sm:space-y-16">

        <!-- ==========================================
             1. SECTION: SELAMAT DATANG (HERO MINIMALIS)
             ========================================== -->
        <section class="relative isolate min-h-[480px] sm:min-h-[560px] rounded-[2rem] overflow-hidden bg-[#2C1A11] shadow-[0_20px_60px_rgba(44,26,17,0.18)]">
            <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=2000&q=85"
                alt="Roti artisan hangat yang baru dipanggang"
                fetchpriority="high"
                class="hero-photo absolute inset-0 w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1D120B]/95 via-[#2C1A11]/75 to-[#2C1A11]/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#1D120B]/55 via-transparent to-transparent"></div>

            <div class="relative z-10 flex min-h-[480px] sm:min-h-[560px] items-center px-6 py-12 sm:px-12 lg:px-16">
                <div class="max-w-2xl space-y-6 text-white" data-reveal>
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-4 py-2 text-[10px] font-bold uppercase tracking-[.2em] text-[#F8D9A5] backdrop-blur-sm">
                        <svg data-scroll-icon class="scroll-icon h-4 w-4 text-[#F3B44E]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c-1.2 2-4 3.8-4 7a4 4 0 0 0 8 0c0-1.4-.7-2.7-1.8-3.7.2 2-1 3.1-2.2 3.7.3-2.7-.5-5-2-7Z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16a4 4 0 0 0 8 0"></path>
                        </svg>
                        Mey Bakery · Artisan & Fresh Daily
                    </div>

                    <h1 class="font-serif text-4xl font-semibold leading-[1.12] tracking-tight sm:text-6xl lg:text-7xl">
                        Hangat dari oven,<br>
                        <span class="italic text-[#F3B44E]">manis di setiap momen.</span>
                    </h1>
                    <p class="max-w-xl text-sm leading-7 text-white/80 sm:text-lg">
                        Roti artisan dan kue istimewa dibuat segar setiap hari, dengan bahan pilihan untuk menemani cerita Anda.
                    </p>

                    <div class="flex flex-wrap items-center gap-3 pt-1">
                        <a href="{{ route('shop') }}"
                            class="group inline-flex items-center gap-3 rounded-xl bg-[#DF851A] px-6 py-3.5 text-sm font-extrabold text-white shadow-[0_5px_0_#7A3E05] transition hover:-translate-y-0.5 hover:bg-[#EC9828] hover:shadow-[0_7px_0_#7A3E05] active:translate-y-1 active:shadow-none">
                            Mulai Pesan
                            <svg data-scroll-icon class="scroll-icon h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"></path>
                            </svg>
                        </a>
                        <a href="#best-seller" class="rounded-xl border border-white/35 bg-white/10 px-5 py-3.5 text-sm font-bold text-white backdrop-blur-sm transition hover:bg-white/20">
                            Lihat Best Seller
                        </a>
                    </div>

                    <div class="flex flex-wrap items-center gap-x-6 gap-y-3 pt-4 text-xs font-medium text-white/80">
                        <span class="inline-flex items-center gap-2">
                            <svg data-scroll-icon class="scroll-icon h-4 w-4 text-[#F3B44E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1-5.4-2.9-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z"></path>
                            </svg>
                            Rating pelanggan 4.9/5
                        </span>
                        <span class="inline-flex items-center gap-2">
                            <svg data-scroll-icon class="scroll-icon h-4 w-4 text-[#F3B44E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"></path>
                                <circle cx="12" cy="10" r="2.2"></circle>
                            </svg>
                            Sidomukti, Lamongan
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- BEST SELLER -->
        <section id="best-seller" class="space-y-6 pt-2">
            <div class="flex flex-col gap-3 border-b border-[#ECE5DD] pb-4 sm:flex-row sm:items-end sm:justify-between" data-reveal>
                <div>
                    <p class="mb-2 text-[10px] font-extrabold uppercase tracking-[.22em] text-[#A85816]">Favorit pelanggan</p>
                    <h2 class="font-serif text-2xl font-black tracking-tight text-[#2C1A11] sm:text-3xl">Best Seller</h2>
                    <p class="mt-1 text-xs text-[#7A6E65] sm:text-sm">Pilihan paling disukai, dibuat fresh dari dapur kami.</p>
                </div>
                <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#A85816] transition hover:gap-3">
                    Lihat semua menu
                    <svg data-scroll-icon class="scroll-icon h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @forelse($bestSellers as $product)
                    @php
                        $rating = 4.8 + (($product->id * 2) % 3) / 10;
                    @endphp
                    <a href="{{ route('shop') }}" data-reveal
                        class="group overflow-hidden rounded-3xl border border-[#E8DFD5] bg-white shadow-[0_4px_16px_rgba(44,26,17,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_12px_28px_rgba(44,26,17,0.12)]">
                        <div class="relative aspect-[4/3] overflow-hidden bg-[#F5EFE4]">
                            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=700&q=80' }}"
                                alt="{{ $product->name }}" loading="lazy"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-3 top-3 rounded-full border border-white/60 bg-white/90 px-3 py-1 text-[10px] font-bold text-[#7A624E] backdrop-blur">
                                {{ $product->category }}
                            </span>
                            <span class="absolute right-3 top-3 inline-flex items-center gap-1 rounded-full bg-[#2C1A11]/85 px-2.5 py-1 text-[10px] font-bold text-white">
                                <svg data-scroll-icon class="scroll-icon h-3 w-3 text-[#F3B44E]" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="m10 1.5 2.6 5.3 5.9.9-4.25 4.15 1 5.85L10 14.95l-5.25 2.75 1-5.85L1.5 7.7l5.9-.9L10 1.5Z"></path>
                                </svg>
                                {{ number_format($rating, 1) }}
                            </span>
                        </div>
                        <div class="space-y-3 p-4">
                            <div>
                                <h3 class="font-serif text-base font-bold text-[#2C1A11] transition group-hover:text-[#A85816]">{{ $product->name }}</h3>
                                <p class="mt-1 line-clamp-1 text-xs text-[#7A6E65]">{{ $product->description ?: 'Dipanggang hangat setiap pagi dengan resep khas Mey Bakery.' }}</p>
                            </div>
                            <div class="flex items-center justify-between border-t border-[#F2ECE2] pt-3">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#7A6E65]">Mulai dari</span>
                                <span class="font-extrabold text-[#A85816]">Rp {{ number_format($product->price_idr, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full rounded-3xl border border-[#E8DFD5] bg-white p-8 text-center text-sm text-[#7A6E65]" data-reveal>
                        Menu favorit kami sedang disiapkan. Kunjungi lagi sebentar lagi, ya.
                    </div>
                @endforelse
            </div>
        </section>


        <!-- ==========================================
             2. SECTION: MENU UTAMA (FILTER KATEGORI)
             ========================================== -->
        <section id="menu-utama" class="space-y-4 pt-2" data-reveal>
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 border-b border-[#ECE5DD] pb-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight">Menu Utama</h2>
                    <p class="text-xs sm:text-sm text-[#7A6E65] mt-0.5">Pilih kategori untuk memfilter pilihan kue dan roti.</p>
                </div>
                <span class="text-xs font-bold text-[#A85816] bg-[#FFF8E7] px-3 py-1 rounded-full border border-[#FCD34D] self-start sm:self-auto">
                    {{ $products->count() }} Pilihan Tersedia
                </span>
            </div>

            <!-- Category Pills Buttons -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
                <button type="button" onclick="filterCategory('all', this)" 
                    class="category-btn active-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Semua Menu
                </button>
                <button type="button" onclick="filterCategory('Tart & Cake', this)" 
                    class="category-btn inactive-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Tart & Cake
                </button>
                <button type="button" onclick="filterCategory('Pastry', this)" 
                    class="category-btn inactive-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Pastry
                </button>
                <button type="button" onclick="filterCategory('Roti & Donat', this)" 
                    class="category-btn inactive-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Roti & Donat
                </button>
                <button type="button" onclick="filterCategory('Kue Basah', this)" 
                    class="category-btn inactive-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Kue Basah
                </button>
                <button type="button" onclick="filterCategory('Beverage', this)" 
                    class="category-btn inactive-cat shrink-0 px-4 py-2.5 rounded-xl text-xs font-bold border transition cursor-pointer select-none">
                    Minuman (Beverage)
                </button>
            </div>
        </section>


        <!-- ==========================================
             3. SECTION: MARKETPLACE LANGSUNG (PRODUK ETALASE)
             ========================================== -->
        <section id="marketplace" class="space-y-6" data-reveal>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight">Marketplace</h2>
                    <p class="text-xs sm:text-sm text-[#7A6E65] mt-0.5">Pesan satuan atau masukkan troli untuk paket bundle.</p>
                </div>
            </div>

            <!-- Product Grid -->
            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                @forelse($products as $product)
                <div class="product-card bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] shadow-[0_4px_16px_rgba(44,26,17,0.05)] hover:shadow-[0_8px_24px_rgba(201,130,36,0.18)] hover:-translate-y-1 transition-all duration-200 p-3.5 sm:p-4 flex flex-col justify-between group"
                    data-category="{{ $product->category }}">
                    
                    <div class="space-y-3">
                        <!-- Product Image -->
                        <div class="relative aspect-[4/3] rounded-xl sm:rounded-2xl overflow-hidden bg-[#FAF7F2] border border-[#ECE5DD]">
                            <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80' }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            
                            <!-- Category Badge -->
                            <span class="absolute top-2.5 left-2.5 bg-white/90 backdrop-blur-xs text-[#7A624E] border border-[#E2DDD5] text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-xs">
                                {{ $product->category }}
                            </span>

                            <!-- Stock Badge -->
                            <span class="absolute top-2.5 right-2.5 bg-[#FFF8E7]/95 text-[#9A6216] border border-[#FCD34D] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-xs">
                                Sisa {{ $product->stock }}
                            </span>
                        </div>

                        <!-- Product Title & Info -->
                        <div>
                            <h3 class="font-serif font-black text-base text-[#2C1A11] leading-snug line-clamp-1 group-hover:text-[#A85816] transition-colors">
                                {{ $product->name }}
                            </h3>
                            @if($product->description)
                                <p class="text-xs text-[#7A6E65] line-clamp-1 mt-0.5 font-normal">
                                    {{ $product->description }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Price & Actions -->
                    <div class="pt-4 border-t border-[#F2ECE2] mt-3 space-y-3">
                        <div class="flex items-baseline justify-between">
                            <span class="text-[10px] uppercase font-bold text-[#7A6E65]">Harga</span>
                            <span class="text-base sm:text-lg font-black text-[#A85816]">
                                Rp {{ number_format($product->price_idr, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- 2 Action Buttons: + Troli & Pesan Langsung 3D -->
                        <div class="grid grid-cols-2 gap-2">
                            <button type="button" onclick="addToCart({{ json_encode($product) }})"
                                class="w-full py-2.5 px-2 bg-[#FAF7F2] hover:bg-[#F2ECE2] text-[#2C1A11] rounded-xl text-xs font-bold border border-[#D5CBC0] shadow-sm active:translate-y-0.5 transition cursor-pointer flex items-center justify-center gap-1.5"
                                title="Tambah ke Troli">
                                <span>+ Troli</span>
                            </button>

                            <button type="button" onclick="openCheckoutModal({{ json_encode($product) }})"
                                class="w-full py-2.5 px-2 rounded-xl text-xs font-bold text-white tracking-wide shadow-[0_3px_0_#7A3E05] hover:brightness-105 active:translate-y-1 active:shadow-none transition-all cursor-pointer flex items-center justify-center"
                                style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%); border-top: 1px solid rgba(254, 215, 170, 0.55);"
                                title="Pesan Menu Ini Sekarang">
                                <span>Pesan</span>
                            </button>
                        </div>
                    </div>

                </div>
                @empty
                <div class="col-span-full py-12 text-center bg-white rounded-3xl border border-[#E8DFD5] text-xs text-[#7A6E65] space-y-1">
                    <p class="font-bold text-sm text-[#2C1A11]">Belum ada menu tersedia saat ini.</p>
                    <p>Silakan hubungi kami via WhatsApp untuk memesan menu khusus.</p>
                </div>
                @endforelse
            </div>

            <!-- Empty Notice saat filter tidak ada hasil -->
            <div id="emptyCategoryNotice" class="hidden py-12 text-center bg-white rounded-3xl border border-[#E8DFD5] text-xs text-[#7A6E65] space-y-1">
                <p class="font-bold text-sm text-[#2C1A11]">Tidak ada menu dalam kategori ini.</p>
                <button type="button" onclick="filterCategory('all', document.querySelector('.category-btn'))" class="text-xs font-bold text-[#A85816] hover:underline mt-1 cursor-pointer">
                    Kembali ke Semua Menu ↺
                </button>
            </div>
        </section>


        <!-- ==========================================
             4. SECTION: PENILAIAN (CUSTOMER REVIEWS)
             ========================================== -->
        <section id="penilaian" class="space-y-6 pt-2">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 border-b border-[#ECE5DD] pb-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-serif font-black text-[#2C1A11] tracking-tight">Penilaian</h2>
                    <p class="text-xs sm:text-sm text-[#7A6E65] mt-0.5">Ulasan jujur dari pelanggan setia Mey Bakery.</p>
                </div>
                <div class="inline-flex items-center gap-1.5 bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D] px-3.5 py-1.5 rounded-full text-xs font-black self-start sm:self-auto">
                    <span>⭐ 4.9 / 5.0</span>
                    <span class="text-[#7A6E65] font-normal">• 500+ Pesanan Puas</span>
                </div>
            </div>

            <!-- 4 Modern Minimalist Review Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                
                <!-- Review 1 -->
                <div data-reveal class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] p-5 shadow-[0_4px_16px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div data-scroll-icon class="scroll-icon flex items-center gap-1 text-[#DF851A] text-sm">
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
                <div data-reveal class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] p-5 shadow-[0_4px_16px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div data-scroll-icon class="scroll-icon flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Pesan dadakan untuk acara ulang tahun, pengiriman kurir toko tepat waktu dan dekorasi kuenya rapi banget."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Dimas Prasetyo</p>
                        <span class="text-[10px] text-[#7A6E65] block">Pelanggan Tetap</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div data-reveal class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] p-5 shadow-[0_4px_16px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div data-scroll-icon class="scroll-icon flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Pastry renyah di luar tapi lembut di dalam. Selalu pesan rutin untuk camilan teman kopi di pagi hari."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Linda Kurnia</p>
                        <span class="text-[10px] text-[#7A6E65] block">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review 4 -->
                <div data-reveal class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] p-5 shadow-[0_4px_16px_rgba(44,26,17,0.04)] space-y-3 flex flex-col justify-between">
                    <div class="space-y-2">
                        <div data-scroll-icon class="scroll-icon flex items-center gap-1 text-[#DF851A] text-sm">
                            ★★★★★
                        </div>
                        <p class="text-xs text-[#3D251A] leading-relaxed font-medium">
                            "Sistem pesannya sangat simpel, invoice digital otomatis keluar dan adminnya ramah sekali di WhatsApp."
                        </p>
                    </div>
                    <div class="pt-3 border-t border-[#F2ECE2]">
                        <p class="font-bold text-xs text-[#2C1A11]">Reza Firmansyah</p>
                        <span class="text-[10px] text-[#7A6E65] block">Pembeli Online</span>
                    </div>
                </div>

            </div>
        </section>

        <section id="lokasi" class="relative overflow-hidden rounded-3xl bg-[#2C1A11] p-6 text-white shadow-[0_12px_32px_rgba(44,26,17,0.15)] sm:p-9" data-reveal>
            <div class="absolute -right-12 -top-16 h-56 w-56 rounded-full bg-[#DF851A]/15 blur-3xl"></div>
            <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/10 text-[#F3B44E]">
                        <svg data-scroll-icon class="scroll-icon h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"></path>
                            <circle cx="12" cy="10" r="2.2"></circle>
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <p class="text-[10px] font-bold uppercase tracking-[.22em] text-[#F3B44E]">Mampir ke dapur kami</p>
                        <h2 class="font-serif text-xl font-bold sm:text-2xl">Temukan Mey Bakery</h2>
                        <p class="max-w-2xl text-sm leading-6 text-white/75">Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263</p>
                        <p class="text-xs font-medium text-white/60">Buka setiap hari · 07.30–21.00 WIB</p>
                    </div>
                </div>
                <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank" rel="noopener noreferrer"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-white/25 px-5 py-3 text-xs font-bold text-white transition hover:border-[#F3B44E] hover:bg-white/10">
                    <svg data-scroll-icon class="scroll-icon h-4 w-4 text-[#F3B44E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"></path>
                        <circle cx="12" cy="10" r="2.2"></circle>
                    </svg>
                    Buka Google Maps
                </a>
            </div>
        </section>

    </main>

    <!-- SLIDE-OVER CART DRAWER -->
    <div id="cartDrawer" class="fixed inset-0 bg-[#1D120B]/60 backdrop-blur-xs z-50 hidden transition-all duration-300">
        <div class="absolute right-0 top-0 bottom-0 w-full max-w-sm sm:max-w-md bg-white shadow-2xl flex flex-col justify-between p-4 sm:p-6 border-l border-[#E2DDD5] overflow-hidden">
            
            <!-- Drawer Header -->
            <div class="flex items-center justify-between border-b border-[#ECE5DD] pb-3.5 shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#3D251A] to-[#DF851A] text-white flex items-center justify-center font-bold text-xs shadow-sm">
                        🛒
                    </div>
                    <div>
                        <h3 class="font-serif font-black text-sm sm:text-base text-[#2C1A11]">Troli Belanja</h3>
                        <span id="cartDrawerBadgeHeader" class="text-[10px] text-[#7A6E65]">0 Menu Terpilih</span>
                    </div>
                </div>
                <button type="button" onclick="toggleCartDrawer(false)" class="w-8 h-8 rounded-xl bg-[#FAF7F2] hover:bg-[#EFE8DC] text-[#2C1A11] flex items-center justify-center font-bold text-xs border border-[#D5CBC0] shadow-sm transition cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Items List Container -->
            <div id="cartItemsList" class="my-3 flex-1 overflow-y-auto pr-1 space-y-2"></div>

            <!-- Drawer Bottom & CTA -->
            <div class="border-t border-[#ECE5DD] pt-3.5 space-y-3 shrink-0">
                <div class="bg-[#FAF7F2] p-3 rounded-2xl border border-[#E2DDD5] space-y-1.5 text-xs">
                    <div class="flex justify-between items-center text-[#6B5E52]">
                        <span>Jumlah Menu:</span>
                        <span id="cartDrawerBundleCount" class="font-bold text-[#2C1A11]">0 menu</span>
                    </div>
                    <div class="flex justify-between items-center pt-1.5 border-t border-[#ECE5DD]">
                        <span class="font-bold text-[#2C1A11]">Total:</span>
                        <span id="cartDrawerTotal" class="font-black text-base sm:text-lg text-[#A85816]">Rp 0</span>
                    </div>
                </div>

                <button type="button" onclick="proceedFromCart()" id="btnCheckoutCart" disabled
                    class="w-full h-11 flex items-center justify-center gap-2 rounded-xl text-xs font-bold text-white tracking-wide shadow-[0_3px_0_#7A3E05] disabled:opacity-50 disabled:cursor-not-allowed transition cursor-pointer"
                    style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%);">
                    <span>Lanjut Pesan Bundle →</span>
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL CHECKOUT CEPAT -->
    <div id="checkoutModal" class="fixed inset-0 bg-[#1D120B]/75 backdrop-blur-sm z-50 hidden flex items-center justify-center p-3 sm:p-4 overflow-y-auto">
        <div class="relative bg-white rounded-2xl sm:rounded-3xl max-w-lg w-full p-5 sm:p-7 shadow-2xl border border-[#E8DFD5] my-auto max-h-[94vh] overflow-y-auto transition-all">
            
            <div class="flex items-center justify-between pb-3.5 border-b border-[#ECE5DD]">
                <div>
                    <span id="modalTypeBadge" class="text-[10px] font-bold text-[#A85816] bg-[#FFF8E7] px-2.5 py-0.5 rounded-full border border-[#FCD34D]">
                        Pemesanan Langsung
                    </span>
                    <h3 id="modalProductName" class="font-serif font-black text-lg sm:text-xl text-[#2C1A11] mt-1">
                        Nama Menu
                    </h3>
                </div>
                <button type="button" onclick="closeCheckoutModal()" 
                    class="w-8 h-8 rounded-full bg-[#FAF7F2] hover:bg-[#F2ECE2] text-[#2C1A11] border border-[#D5CBC0] flex items-center justify-center transition cursor-pointer font-bold text-xs">
                    ✕
                </button>
            </div>

            <!-- Form Pemesanan -->
            <form action="{{ route('order.process') }}" method="POST" class="mt-4 space-y-3.5">
                @csrf
                <input type="hidden" name="product_id" id="formProductId">
                <input type="hidden" name="bundle_items" id="formBundleItems" value="">

                <!-- Single Item Summary & Quantity -->
                <div id="singleProductView" class="bg-[#FAF7F2] p-3.5 rounded-xl border border-[#E2DDD5] flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-[#7A6E65] uppercase font-bold block">Harga Satuan</span>
                        <span id="modalProductPrice" class="text-sm sm:text-base font-black text-[#A85816]">Rp 0</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="changeModalQty(-1)" class="w-8 h-8 rounded-lg bg-white border border-[#D5CBC0] font-bold text-sm shadow-xs active:translate-y-0.5">-</button>
                        <input type="number" name="quantity" id="formQuantity" value="1" min="1" readonly class="w-12 text-center bg-transparent font-black text-sm">
                        <button type="button" onclick="changeModalQty(1)" class="w-8 h-8 rounded-lg bg-white border border-[#D5CBC0] font-bold text-sm shadow-xs active:translate-y-0.5">+</button>
                    </div>
                </div>

                <!-- Bundle List (jika checkout dari keranjang) -->
                <div id="bundleProductView" class="hidden bg-[#FAF7F2] p-3.5 rounded-xl border border-[#E2DDD5] space-y-2">
                    <span class="text-[10px] text-[#7A6E65] uppercase font-bold block">Daftar Menu Bundle</span>
                    <div id="modalBundleList" class="space-y-1.5 max-h-36 overflow-y-auto text-xs"></div>
                </div>

                <!-- Input Nama & No WhatsApp -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Nama Lengkap *</label>
                        <input type="text" name="customer_name" required placeholder="Nama Anda"
                            class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">No. WhatsApp *</label>
                        <input type="text" name="customer_phone" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                    </div>
                </div>

                <!-- Target Tanggal & Metode Kirim -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Target Tanggal *</label>
                        <input type="date" name="delivery_date" value="{{ date('Y-m-d') }}" required
                            class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Metode Pengiriman</label>
                        <select name="order_type" id="orderTypeSelect" onchange="toggleAddressField()"
                            class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                            <option value="delivery">Kurir Toko (Delivery)</option>
                            <option value="pickup">Ambil Sendiri (Pick-up)</option>
                            <option value="cod">COD (Bayar di Tempat)</option>
                        </select>
                    </div>
                </div>

                <!-- Alamat Antar -->
                <div id="addressFieldContainer">
                    <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Alamat Pengantaran</label>
                    <input type="text" name="address" placeholder="Jalan, nomor rumah, patokan..."
                        class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                </div>

                <!-- Metode Pembayaran -->
                <div>
                    <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Metode Pembayaran</label>
                    <select name="payment_method" id="paymentMethodSelect" onchange="toggleBankSelect()"
                        class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                        <option value="qris">QRIS Instant (All E-Wallet / M-Banking)</option>
                        <option value="transfer">Transfer Bank Resmi</option>
                        <option value="cod">Tunai / COD saat terima</option>
                    </select>
                </div>

                <!-- Pilihan Rekening Bank (Muncul jika pilih Transfer Bank) -->
                <div id="bankAccountContainer" class="hidden">
                    <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Pilih Rekening Tujuan</label>
                    <select name="bank_account_id" class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                        @forelse($bankAccounts as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->bank_name }} — {{ $bank->account_number }} (a.n {{ $bank->account_name }})</option>
                        @empty
                            <option value="">Rekening Utama Toko</option>
                        @endforelse
                    </select>
                </div>

                <!-- Catatan Tambahan -->
                <div>
                    <label class="block text-[11px] font-bold text-[#2C1A11] uppercase mb-1">Catatan Pesanan (Opsional)</label>
                    <input type="text" name="notes" placeholder="Misal: Tulisan ucapan / lilin / request hiasan"
                        class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white rounded-xl px-3 py-2 text-xs font-medium text-[#2C1A11] outline-none">
                </div>

                <!-- Subtotal Info -->
                <div class="bg-[#FAF7F2] p-3 rounded-xl border border-[#E2DDD5] flex items-center justify-between">
                    <span class="text-xs font-bold text-[#2C1A11]">Total Pembayaran:</span>
                    <span id="modalCalculatedTotal" class="text-base sm:text-lg font-black text-[#A85816]">Rp 0</span>
                </div>

                <!-- 2 Opsi Checkout: Simpan ke Web Invoice atau Kirim via WhatsApp Langsung -->
                <div class="grid grid-cols-2 gap-2.5 pt-2">
                    <button type="submit" name="checkout_via" value="web"
                        class="w-full py-3 rounded-xl text-xs font-bold text-white shadow-[0_3px_0_#7A3E05] active:translate-y-0.5 cursor-pointer flex items-center justify-center gap-1.5"
                        style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%);">
                        <span>Buat Invoice Web</span>
                    </button>

                    <button type="submit" name="checkout_via" value="whatsapp"
                        class="w-full py-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-[#059669] to-[#047857] shadow-[0_3px_0_#064E3B] active:translate-y-0.5 cursor-pointer flex items-center justify-center gap-1.5">
                        <span>Pesan via WA</span>
                    </button>
                </div>
            </form>

        </div>
    </div>


    <!-- 5. FOOTER MINIMALIS ELEGAN (VERIFIED ADDRESS & LINKS) -->
    <footer class="bg-white border-t border-[#E8DFD5] py-8 text-center text-xs text-[#7A6E65]">
        <div class="max-w-7xl mx-auto px-4 space-y-3">
            <div class="flex items-center justify-center gap-2">
                <span class="w-6 h-6 rounded-lg bg-[#3D251A] text-white flex items-center justify-center font-serif font-black text-xs">M</span>
                <span class="font-serif font-black text-base text-[#2C1A11]">Mey Bakery.</span>
            </div>
            
            <p class="font-medium text-[#2C1A11]">
                Desa Sidomukti, Kecamatan Brondong, Kabupaten Lamongan, Jawa Timur 62263
            </p>

            <div class="flex items-center justify-center gap-4 text-xs font-semibold text-[#A85816] pt-1">
                <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank" class="hover:underline">Buka Titik Maps ↗</a>
                <span>•</span>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:underline">WhatsApp Dapur ↗</a>
                <span>•</span>
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin Studio ↗</a>
            </div>

            <p class="text-[11px] text-[#A89F95] pt-2">
                © {{ date('Y') }} Mey Bakery. Artisan Fresh Bakes & Pâtisserie.
            </p>
        </div>
    </footer>


    <!-- JAVASCRIPT LOGIC (FILTERING, CART, MODAL CHECKOUT) -->
    <script>
        // 1. FILTER KATEGORI MENU UTAMA
        function filterCategory(category, buttonEl) {
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('active-cat');
                btn.classList.add('inactive-cat');
            });
            if (buttonEl) {
                buttonEl.classList.remove('inactive-cat');
                buttonEl.classList.add('active-cat');
            }

            const cards = document.querySelectorAll('.product-card');
            let visibleCount = 0;
            cards.forEach(card => {
                const itemCategory = card.getAttribute('data-category');
                if (category === 'all' || itemCategory === category) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const emptyNotice = document.getElementById('emptyCategoryNotice');
            if (emptyNotice) {
                emptyNotice.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        // 2. TROLI BELANJA (CART)
        let cart = JSON.parse(localStorage.getItem('mey_bakery_cart') || '[]');

        function saveCart() {
            localStorage.setItem('mey_bakery_cart', JSON.stringify(cart));
            updateCartUI();
        }

        function addToCart(product) {
            const existing = cart.find(item => item.id === product.id);
            if (existing) {
                if (existing.qty < product.stock) {
                    existing.qty++;
                } else {
                    alert('Jumlah melebihi stok yang tersedia (' + product.stock + ' unit).');
                    return;
                }
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: parseInt(product.price_idr),
                    stock: product.stock,
                    image_url: product.image_url,
                    qty: 1
                });
            }
            saveCart();
            toggleCartDrawer(true);
        }

        function changeCartQty(id, delta) {
            const item = cart.find(i => i.id === id);
            if (!item) return;
            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(i => i.id !== id);
            } else if (item.qty > item.stock) {
                item.qty = item.stock;
                alert('Maksimal stok tercapai.');
            }
            saveCart();
        }

        function toggleCartDrawer(show) {
            const drawer = document.getElementById('cartDrawer');
            if (!drawer) return;
            if (show === undefined) {
                drawer.classList.toggle('hidden');
            } else if (show) {
                drawer.classList.remove('hidden');
            } else {
                drawer.classList.add('hidden');
            }
        }

        function updateCartUI() {
            const badge = document.getElementById('cartCountBadge');
            const drawerBadge = document.getElementById('cartDrawerBadgeHeader');
            const countLabel = document.getElementById('cartDrawerBundleCount');
            const totalLabel = document.getElementById('cartDrawerTotal');
            const listContainer = document.getElementById('cartItemsList');
            const btnCheckout = document.getElementById('btnCheckoutCart');

            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

            if (badge) badge.innerText = totalQty;
            if (drawerBadge) drawerBadge.innerText = cart.length + ' Menu Terpilih';
            if (countLabel) countLabel.innerText = cart.length + ' menu (' + totalQty + ' item)';
            if (totalLabel) totalLabel.innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');

            if (btnCheckout) {
                btnCheckout.disabled = cart.length === 0;
            }

            if (listContainer) {
                if (cart.length === 0) {
                    listContainer.innerHTML = `
                        <div class="py-12 text-center text-xs text-[#7A6E65] space-y-1">
                            <span class="text-2xl block">🧺</span>
                            <p class="font-bold text-[#2C1A11]">Troli Anda masih kosong.</p>
                            <p>Pilih menu favorit Anda di atas.</p>
                        </div>
                    `;
                } else {
                    listContainer.innerHTML = cart.map(item => `
                        <div class="bg-[#FAF7F2] p-2.5 rounded-xl border border-[#E2DDD5] flex items-center justify-between gap-2 text-xs">
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-[#2C1A11] truncate">${item.name}</p>
                                <p class="text-[11px] text-[#A85816] font-semibold">Rp ${(item.price * item.qty).toLocaleString('id-ID')}</p>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <button type="button" onclick="changeCartQty(${item.id}, -1)" class="w-6 h-6 rounded bg-white border border-[#D5CBC0] font-bold text-xs">-</button>
                                <span class="w-5 text-center font-bold text-xs">${item.qty}</span>
                                <button type="button" onclick="changeCartQty(${item.id}, 1)" class="w-6 h-6 rounded bg-white border border-[#D5CBC0] font-bold text-xs">+</button>
                            </div>
                        </div>
                    `).join('');
                }
            }
        }

        // 3. CHECKOUT MODAL LOGIC
        let activeProduct = null;
        let isBundleMode = false;

        function openCheckoutModal(product) {
            isBundleMode = false;
            activeProduct = product;

            document.getElementById('modalTypeBadge').innerText = 'Pemesanan Langsung';
            document.getElementById('modalProductName').innerText = product.name;
            document.getElementById('formProductId').value = product.id;
            document.getElementById('formBundleItems').value = '';

            document.getElementById('singleProductView').classList.remove('hidden');
            document.getElementById('bundleProductView').classList.add('hidden');

            document.getElementById('formQuantity').value = 1;
            document.getElementById('modalProductPrice').innerText = 'Rp ' + parseInt(product.price_idr).toLocaleString('id-ID');
            document.getElementById('modalCalculatedTotal').innerText = 'Rp ' + parseInt(product.price_idr).toLocaleString('id-ID');

            document.getElementById('checkoutModal').classList.remove('hidden');
        }

        function proceedFromCart() {
            if (cart.length === 0) return;
            isBundleMode = true;
            toggleCartDrawer(false);

            document.getElementById('modalTypeBadge').innerText = 'Pemesanan Bundle (' + cart.length + ' Menu)';
            document.getElementById('modalProductName').innerText = 'Paket Bundle Pilihan Anda';
            document.getElementById('formProductId').value = cart[0].id;
            document.getElementById('formBundleItems').value = JSON.stringify(cart);

            document.getElementById('singleProductView').classList.add('hidden');
            document.getElementById('bundleProductView').classList.remove('hidden');

            const bundleListEl = document.getElementById('modalBundleList');
            bundleListEl.innerHTML = cart.map(item => `
                <div class="flex justify-between items-center text-xs py-1 border-b border-[#E2DDD5]/60">
                    <span class="font-medium text-[#2C1A11] truncate">${item.qty}x ${item.name}</span>
                    <span class="font-bold text-[#A85816]">Rp ${(item.price * item.qty).toLocaleString('id-ID')}</span>
                </div>
            `).join('');

            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            document.getElementById('modalCalculatedTotal').innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');

            document.getElementById('checkoutModal').classList.remove('hidden');
        }

        function closeCheckoutModal() {
            document.getElementById('checkoutModal').classList.add('hidden');
        }

        function changeModalQty(delta) {
            if (isBundleMode || !activeProduct) return;
            const input = document.getElementById('formQuantity');
            let current = parseInt(input.value) || 1;
            current += delta;
            if (current < 1) current = 1;
            if (current > activeProduct.stock) {
                current = activeProduct.stock;
                alert('Maksimal stok tersisa: ' + activeProduct.stock + ' unit.');
            }
            input.value = current;

            const total = current * parseInt(activeProduct.price_idr);
            document.getElementById('modalCalculatedTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function toggleAddressField() {
            const select = document.getElementById('orderTypeSelect');
            const container = document.getElementById('addressFieldContainer');
            if (select.value === 'pickup') {
                container.classList.add('hidden');
            } else {
                container.classList.remove('hidden');
            }
        }

        function toggleBankSelect() {
            const select = document.getElementById('paymentMethodSelect');
            const container = document.getElementById('bankAccountContainer');
            if (select.value === 'transfer') {
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        }

        // Initialize Cart on Load
        document.addEventListener('DOMContentLoaded', () => {
            updateCartUI();

            const revealItems = document.querySelectorAll('[data-reveal], [data-scroll-icon], svg');
            if (!('IntersectionObserver' in window)) {
                revealItems.forEach(item => {
                    item.classList.add('is-visible');
                    if (item.tagName.toLowerCase() === 'svg') {
                        item.classList.add('scroll-icon');
                    }
                });
                return;
            }

            document.documentElement.classList.add('has-scroll-reveal');
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -24px 0px' });

            revealItems.forEach(item => {
                if (item.tagName.toLowerCase() === 'svg') {
                    item.classList.add('scroll-icon');
                }
                revealObserver.observe(item);
            });
        });
    </script>

</body>
</html>
