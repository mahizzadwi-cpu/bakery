<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Menu Pilihan</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans for crisp readability & Playfair Display for boutique vintage flair -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 18%, #78695E 0%, #5C4F45 42%, #443A32 100%);
            background-attachment: fixed;
            color: #FAF6F0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #443A32;
        }
        ::-webkit-scrollbar-thumb {
            background: #8C7A6B;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #B5A18C;
        }

        /* 5-Second Smooth Transition on Every Icon Triggered by Scroll Motion */
        .scroll-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform 5s cubic-bezier(0.16, 1, 0.3, 1), 
                        filter 5s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, filter;
        }

        @keyframes iconBreath5s {
            0%, 100% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }
            50% {
                transform: translateY(-4px) rotate(2deg) scale(1.06);
            }
        }
        .icon-ambient-5s {
            animation: iconBreath5s 5s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-[#FAF6F0] antialiased min-h-screen flex flex-col selection:bg-[#B5A18C]/40 selection:text-white">

    <!-- 1. STICKY MODERN CLASSIC HEADER (VINTAGE TRANSPARAN AGAK CERAH & NATURAL ELEGAN) -->
    <header class="sticky top-0 z-40 transition-all duration-200">
        <!-- Multi-Harmonic Top Accent Line: Vintage Sepia Bronze -->
        <div class="h-[2px] bg-gradient-to-r from-[#5A4B40] via-[#8C7A6B] via-[#CBBDAA] to-[#5A4B40] w-full"></div>

        <div class="bg-[#483D36]/80 backdrop-blur-xl border-b border-white/20 shadow-md relative">
            <div class="w-full max-w-[1440px] 2xl:max-w-[1680px] mx-auto px-4 sm:px-6 lg:px-10 h-14 sm:h-16 flex items-center justify-between gap-3">
                
                <!-- Brand Monogram & Title: Vintage Translucent Emblem -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2.5 group shrink-0">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#3D322B]/90 via-[#4F4035]/90 to-[#635345]/90 backdrop-blur-md text-[#FAF6F0] flex items-center justify-center font-serif font-black text-sm shadow-[0_4px_12px_rgba(0,0,0,0.3)] group-hover:scale-105 transition-transform duration-200 border border-[#C5B49F]/40">
                        <span class="scroll-icon icon-ambient-5s">M</span>
                    </div>
                    <div>
                        <span class="text-sm sm:text-base font-serif font-bold tracking-tight text-[#FAF6F0] block leading-tight">Mey Bakery.</span>
                        <span class="text-[9px] tracking-wider uppercase text-[#D5C7B8] font-extrabold block">Artisan Fresh Bakes</span>
                    </div>
                </a>

                <!-- Compact Search Bar (Dark Vintage Gray & Warm Border) -->
                <div class="hidden md:flex flex-1 max-w-sm mx-3">
                    <div class="relative w-full">
                        <input type="text" id="searchInput" oninput="searchProducts()" placeholder="Cari menu kue, roti, atau pastry..." 
                            class="w-full bg-[#1E1B18] border border-white/15 rounded-xl pl-8 pr-3 py-1.5 text-xs font-medium text-white placeholder-[#8C7D70] focus:bg-[#25221F] focus:border-[#9E8975] outline-none transition shadow-[inset_0_1px_2px_rgba(0,0,0,0.2)]">
                        <svg class="w-3.5 h-3.5 text-[#8C7D70] absolute left-2.5 top-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Header Right: Navigasi Estetik & Keranjang -->
                <div class="flex items-center gap-2 sm:gap-2.5">
                    <!-- Kembali ke Beranda (Vintage Dark Button) -->
                    <a href="{{ route('landing') }}" title="Kembali ke Beranda" 
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#1E1B18] hover:bg-[#2A2622] text-[#DDD5CB] text-xs font-bold transition border border-white/15 shadow-[0_2px_0_#0D0C0B] active:translate-y-0.5 active:shadow-none">
                        <svg class="w-3.5 h-3.5 text-[#9E9387]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="hidden sm:inline">Beranda</span>
                    </a>

                    <!-- Tombol Troli Belanja: Vintage Translucent Espresso Pill -->
                    <button onclick="toggleCartDrawer()" title="Buka Troli Belanja" 
                        class="relative inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-gradient-to-r from-[#44352A] via-[#5C493B] to-[#3B2C22] text-[#F5EFE6] font-extrabold text-xs shadow-[0_3px_0_#1A130F,0_4px_10px_rgba(0,0,0,0.3)] hover:-translate-y-0.5 active:translate-y-0.5 active:shadow-[0_1px_0_#1A130F] transition-all duration-150 border-t border-white/20 cursor-pointer">
                        <svg class="w-4 h-4 text-[#F5EFE6]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="hidden xs:inline">Keranjang</span>
                        <span id="cartCountBadge" class="bg-[#FAF7F1] text-[#3D251A] font-extrabold text-[10px] min-w-[18px] h-[18px] rounded-full flex items-center justify-center px-1 shadow-2xs">0</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. MAIN STORE VIEW (SIMPEL & ADAPTIF MENYESUAIKAN DESKTOP & MOBILE) -->
    <main class="w-full max-w-[1440px] 2xl:max-w-[1680px] mx-auto px-3 sm:px-6 lg:px-10 py-3 sm:py-6 flex-1 space-y-3.5 sm:space-y-4">

        <!-- Flash Alert Feedback -->
        @if(session('success'))
            <div class="p-3.5 bg-[#F1EDE6] border border-[#DDD5C8] text-[#2C1A11] text-xs font-semibold rounded-2xl flex items-center justify-between shadow-2xs">
                <span class="flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-[#DF9A28]"></span>
                    {{ session('success') }}
                </span>
                <button onclick="this.parentElement.remove()" class="text-[#8C7D70] hover:text-[#2C1A11] font-bold px-1.5">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="p-3.5 bg-rose-50 border border-rose-300 text-rose-950 text-xs font-semibold rounded-2xl flex items-center justify-between shadow-2xs">
                <span class="flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-rose-600"></span>
                    {{ session('error') }}
                </span>
                <button onclick="this.parentElement.remove()" class="text-rose-700 hover:text-rose-950 font-bold px-1.5">✕</button>
            </div>
        @endif

        @if($errors->any())
            <div class="p-3.5 bg-amber-50 border border-amber-300 text-amber-950 text-xs rounded-2xl space-y-1 shadow-2xs">
                <p class="font-bold text-amber-900">Periksa kembali data pesanan Anda:</p>
                <ul class="list-disc list-inside pl-2 space-y-0.5 text-amber-900 text-[11px]">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 3. PILIHAN KATEGORI MENU (ORGANIC FLUID PEBBLE DESIGN) -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 bg-[#F8F4ED]/90 backdrop-blur-md p-2.5 sm:p-3 rounded-[28px_12px_28px_12px] border border-[#D5C7B6] shadow-[0_12px_28px_-8px_rgba(35,25,18,0.25)] text-[#241812]">
            
            <!-- Category Filter Pills -->
            <div class="flex items-center gap-1.5 overflow-x-auto text-xs no-scrollbar">
                <button onclick="filterCategory('all', this)" class="cat-pill active-pill shrink-0 bg-[#3D3025] text-[#F5EFE6] font-bold px-3.5 py-1.5 rounded-full shadow-[0_2px_0_#1A130F] active:translate-y-0.5 transition-all">
                    Semua ({{ $products->count() }})
                </button>
                <button onclick="filterCategory('Tart & Cake', this)" class="cat-pill shrink-0 bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#544335] hover:text-[#241812] font-semibold px-3.5 py-1.5 rounded-full border border-[#CBBDAA] shadow-[0_1px_0_#B8A795] transition-all">
                    Tart & Cake
                </button>
                <button onclick="filterCategory('Pastry', this)" class="cat-pill shrink-0 bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#544335] hover:text-[#241812] font-semibold px-3.5 py-1.5 rounded-full border border-[#CBBDAA] shadow-[0_1px_0_#B8A795] transition-all">
                    Pastry
                </button>
                <button onclick="filterCategory('Beverage', this)" class="cat-pill shrink-0 bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#544335] hover:text-[#241812] font-semibold px-3.5 py-1.5 rounded-full border border-[#CBBDAA] shadow-[0_1px_0_#B8A795] transition-all">
                    Minuman
                </button>
            </div>

            <div class="hidden sm:flex items-center gap-1.5 text-[#544335] text-[11px] font-semibold pr-1">
                <span class="inline-flex items-center gap-1.5 bg-[#EAE2D5] border border-[#CBBDAA] text-[#544335] px-3 py-1 rounded-full font-bold shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-[#B89658] animate-ping"></span>
                    <span>Fresh Baked Oven</span>
                </span>
            </div>
        </div>

        <!-- Mobile Search Input (Vintage Parchment) -->
        <div class="md:hidden">
            <div class="relative w-full">
                <input type="text" oninput="document.getElementById('searchInput').value = this.value; searchProducts()" placeholder="Cari menu kue, roti..." 
                    class="w-full bg-[#FAF7F1] border border-[#D5C7B6] rounded-full pl-8 pr-3 py-2 text-xs font-medium text-[#241812] placeholder-[#8C7D70] outline-none focus:border-[#9E8975] shadow-xs">
                <svg class="w-3.5 h-3.5 text-[#8C7D70] absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>

        <!-- 4. PRODUCT GRID (KOLOM 5, ORGANIC PEBBLE SILHOUETTE, BUKAN KOTAK2 KAKU) -->
        <div id="productGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-3 sm:gap-4 lg:gap-5">
            @forelse($products as $product)
            @php
                $rating = 4.8 + (($product->id * 2) % 3) / 10;
                $reviews = 20 + ($product->id * 5);
            @endphp
            <div class="menu-grid-item product-item flex flex-col justify-between h-full bg-[#F8F4ED]/92 backdrop-blur-md rounded-[28px_12px_30px_14px] p-3 sm:p-3.5 border border-[#D5C7B6] hover:border-[#9E8975] shadow-[0_14px_30px_-8px_rgba(35,25,18,0.25)] hover:shadow-[0_20px_40px_-10px_rgba(35,25,18,0.35)] hover:-translate-y-1.5 transition-all duration-300 group text-[#241812]" 
                data-category="{{ $product->category }}" data-name="{{ strtolower($product->name) }}">
                
                <div>
                    <!-- Thumbnail Aspect 3:4 with Soft Organic Frame -->
                    <div class="relative aspect-[3/4] w-full rounded-[22px_10px_24px_10px] overflow-hidden bg-[#ECE4D8] mb-2.5 shrink-0 border border-[#D5C7B6]">
                        <img src="{{ $product->image_url ?? 'https://placehold.co/300x400/ECE4D8/241812?text=Mey+Bakery' }}" 
                            alt="{{ $product->name }}" 
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        
                        <!-- Vintage Parchment Category Badge -->
                        <span class="absolute top-1.5 left-1.5 bg-[#FAF7F1]/95 backdrop-blur-xs text-[#544335] font-black text-[9px] px-2.5 py-0.5 rounded-full border border-[#D5C7B6] shadow-xs">
                            {{ $product->category }}
                        </span>

                        <!-- Stock Badge -->
                        @if($product->stock <= 0)
                            <span class="absolute bottom-1.5 right-1.5 bg-[#3B342E] text-white text-[9px] px-2 py-0.5 rounded-md font-black shadow-xs">
                                Habis
                            </span>
                        @elseif($product->stock < 5)
                            <span class="absolute bottom-1.5 right-1.5 bg-[#5C4533] text-[#F5EFE6] text-[9px] px-2 py-0.5 rounded-md font-black shadow-xs">
                                Sisa {{ $product->stock }}
                            </span>
                        @else
                            <span class="absolute bottom-1.5 right-1.5 bg-[#1C1510]/85 text-white text-[9px] px-2 py-0.5 rounded-md font-bold">
                                Stok: {{ $product->stock }}
                            </span>
                        @endif
                    </div>

                    <!-- Title (Artisan Serif/Sans with Warm Hover) -->
                    <h3 class="font-bold text-xs sm:text-sm text-[#241812] leading-snug line-clamp-1 group-hover:text-[#6E5A4B] transition-colors">
                        {{ $product->name }}
                    </h3>

                    <!-- Penilaian Rating Produk: Vintage Muted Stars -->
                    <div class="flex items-center gap-1 mt-0.5 text-[10px]">
                        <span class="text-[#B89658] font-black">★ {{ number_format($rating, 1) }}</span>
                        <span class="text-[#695C51] font-semibold">({{ $reviews }})</span>
                    </div>

                    <!-- Deskripsi Ringkas -->
                    <p class="text-[11px] text-[#52443A] mt-1 line-clamp-1 leading-normal font-medium">
                        {{ $product->description ?: 'Dipanggang hangat setiap pagi dengan resep autentik.' }}
                    </p>
                </div>

                <!-- Bottom Section: Harga & Action Buttons -->
                <div class="mt-2.5 pt-2.5 border-t border-[#DFD6C9] flex items-center justify-between gap-1.5">
                    <div>
                        <span class="text-[9px] uppercase font-black text-[#695C51] block leading-tight">Harga</span>
                        <span class="text-xs sm:text-sm font-black text-[#3D2C21] leading-tight block">
                            Rp {{ number_format($product->price_idr, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <!-- Trolley Cart Add Button (Vintage Translucent 3D) -->
                        <button type="button" onclick="addToCart({{ json_encode($product) }})" title="Tambah ke Troli"
                            class="w-8 h-8 rounded-xl bg-[#FAF7F1] hover:bg-[#EAE2D5] text-[#241812] border border-[#CBBDAA] transition-all flex items-center justify-center shrink-0 cursor-pointer shadow-[0_2px_0_#B8A795] active:translate-y-0.5 active:shadow-none">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </button>

                        <!-- Instant Order / Checkout Button (Vintage Espresso 3D) -->
                        <button type="button" onclick="openCheckoutModal({{ json_encode($product) }})" 
                            class="bg-gradient-to-r from-[#44352A] to-[#2A2019] hover:brightness-110 text-[#F5EFE6] text-xs font-black py-1.5 px-3.5 rounded-xl transition-all flex items-center justify-center cursor-pointer border-t border-white/20 shadow-[0_3px_0_#1A130F] active:translate-y-0.5 active:shadow-none">
                            <span>Beli</span>
                        </button>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-full py-12 text-center bg-[#FAF7F1] rounded-2xl border border-[#D5C7B6] text-xs text-[#7A6C60] space-y-1">
                <span class="text-2xl block">🥐</span>
                <p class="font-bold text-[#2C1A11]">Belum ada menu tersedia saat ini.</p>
                <p>Silakan hubungi admin kami untuk memesan menu khusus.</p>
            </div>
            @endforelse
        </div>

    </main>

    <!-- 5. SLIDE-OVER CART DRAWER (VINTAGE TRANSPARAN ELEGAN) -->
    <div id="cartDrawer" class="fixed inset-0 bg-[#1D120B]/60 backdrop-blur-xs z-50 hidden transition-all duration-300">
        <div class="absolute right-0 top-0 bottom-0 w-full max-w-sm sm:max-w-md bg-[#FAF7F1] shadow-2xl flex flex-col justify-between p-4 sm:p-6 border-l border-[#D5C7B6] overflow-hidden text-[#241812]">
            
            <!-- Drawer Header -->
            <div class="flex items-center justify-between border-b border-[#D5C7B6] pb-3.5 shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-[#3D3025] text-[#F5EFE6] flex items-center justify-center shadow-[0_2px_0_#1A130F] border border-white/20">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-serif font-black text-sm sm:text-base text-[#241812]">Troli Belanja</h3>
                            <span id="cartDrawerBadgeHeader" class="bg-[#EAE2D5] text-[#544335] text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-[#CBBDAA]">0 Menu</span>
                        </div>
                        <p class="text-[10px] text-[#7A6C60] mt-0.5">Atur paket bundle langsung dari troli</p>
                    </div>
                </div>
                <button onclick="toggleCartDrawer(false)" class="w-8 h-8 rounded-xl bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#241812] flex items-center justify-center font-bold text-xs border border-[#CBBDAA] shadow-[0_2px_0_#B8A795] active:translate-y-0.5 active:shadow-none transition-all cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Items List Container (Vintage Soft Card per Item) -->
            <div id="cartItemsList" class="my-3 flex-1 overflow-y-auto pr-1 space-y-2"></div>

            <!-- Drawer Bottom / Bundle Calculation & CTA -->
            <div class="border-t border-[#D5C7B6] pt-3.5 space-y-3 shrink-0">
                <div class="bg-[#EAE2D5] p-3 rounded-2xl border border-[#CBBDAA] shadow-[0_2px_0_#B8A795] space-y-1.5 text-xs">
                    <div class="flex justify-between items-center text-[#695C51]">
                        <span>Paket Terpilih:</span>
                        <span id="cartDrawerBundleCount" class="font-semibold text-[#241812]">0 menu (0 item)</span>
                    </div>
                    <div class="flex justify-between items-center text-[#695C51]">
                        <span>Pengiriman:</span>
                        <span class="text-[#241812] font-bold">Gratis Ambil / Kurir Toko</span>
                    </div>
                    <div class="flex justify-between items-center pt-1.5 border-t border-[#D5C7B6]">
                        <span class="font-bold text-[#241812]">Total Pembayaran:</span>
                        <span id="cartDrawerTotal" class="font-black text-base sm:text-lg text-[#3D2C21]">Rp 0</span>
                    </div>
                </div>

                <button onclick="proceedFromCart()" id="btnCheckoutCart" disabled
                    class="w-full bg-gradient-to-r from-[#44352A] via-[#5C493B] to-[#3B2C22] hover:brightness-110 disabled:from-[#DDD5C8] disabled:via-[#DDD5C8] disabled:to-[#DDD5C8] disabled:text-[#8C7D70] disabled:shadow-none disabled:cursor-not-allowed text-[#F5EFE6] text-xs font-extrabold py-3.5 px-4 rounded-xl border-t border-white/20 shadow-[0_4px_0_#1A130F,0_10px_20px_rgba(0,0,0,0.3)] hover:-translate-y-0.5 active:translate-y-1 active:shadow-[0_1px_0_#1A130F] transition-all flex items-center justify-center gap-2 cursor-pointer group">
                    <span id="btnCheckoutCartText">Lanjut Pesan Bundle</span>
                    <span class="group-hover:translate-x-0.5 transition-transform">→</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 6. ERGONOMIC & AESTHETIC CHECKOUT MODAL (VINTAGE TRANSPARAN HD) -->
    <div id="checkoutModal" class="fixed inset-0 bg-[#1D120B]/75 backdrop-blur-sm z-50 hidden flex items-center justify-center p-2.5 sm:p-4 overflow-y-auto">
        <div class="relative bg-[#FAF7F1] rounded-2xl sm:rounded-3xl max-w-lg w-full p-4 sm:p-7 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.6),0_8px_0_#A39483] border border-[#D5C7B6] my-auto max-h-[94vh] overflow-y-auto transition-all text-[#241812]">
            
            <!-- Top Slim Aesthetic Ribbon Line: Vintage Sepia Bronze -->
            <div class="h-2 w-full bg-gradient-to-r from-[#3D342D] via-[#635345] via-[#A89682] to-[#3D342D] rounded-t-2xl sm:rounded-t-3xl -mt-4 sm:-mt-7 -mx-4 sm:-mx-7 mb-4 sm:mb-5"></div>

            <!-- Modal Header (Bersih, Tajam HD, 3D Close Button) -->
            <div class="flex items-center justify-between pb-4 border-b border-[#D5C7B6]">
                <div>
                    <div class="flex items-center gap-2">
                        <span id="modalTypeBadge" class="text-[10px] font-black uppercase tracking-wider text-[#F5EFE6] bg-[#3D3025] px-3 py-0.5 rounded-full shadow-xs border border-white/20">Pemesanan Langsung</span>
                        <span class="text-[10px] font-bold text-[#695C51]">• Konfirmasi Cepat</span>
                    </div>
                    <h3 id="modalProductName" class="font-serif font-black text-lg sm:text-xl text-[#241812] leading-tight mt-1.5">Nama Menu</h3>
                </div>
                <button type="button" onclick="closeCheckoutModal()" 
                    class="w-9 h-9 rounded-full bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#241812] border border-[#CBBDAA] shadow-[0_2px_0_#B8A795] active:translate-y-0.5 active:shadow-none flex items-center justify-center transition-all cursor-pointer font-black text-sm" title="Tutup">
                    ✕
                </button>
            </div>

            <!-- Form Body -->
            <form action="{{ route('order.process') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <input type="hidden" name="product_id" id="formProductId">
                <input type="hidden" name="bundle_items" id="formBundleItems" value="">

                <!-- 1A. Mode Pesanan Satuan (Single Item Summary dengan Vintage Card & 3D Stepper) -->
                <div id="singleProductView" class="bg-[#EAE2D5]/70 p-4 rounded-2xl border border-[#D5C7B6] shadow-[0_2px_0_#C5B9A8] flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-[#695C51] uppercase font-black tracking-wider block">Harga Satuan</span>
                        <span id="modalProductPrice" class="text-base sm:text-lg font-black text-[#3D2C21]">Rp 0</span>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <span class="text-xs font-black text-[#241812]">Jumlah:</span>
                        <div class="flex items-center gap-1.5 bg-[#FAF7F1] p-1 rounded-xl border border-[#D5C7B6] shadow-[inset_0_1px_2px_rgba(0,0,0,0.03)]">
                            <button type="button" onclick="adjustQty(-1)" 
                                class="w-7 h-7 rounded-lg bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#241812] font-black text-sm flex items-center justify-center border border-[#CBBDAA] shadow-[0_2px_0_#B8A795] active:translate-y-0.5 active:shadow-none transition cursor-pointer">−</button>
                            <input type="number" name="quantity" id="formQuantity" value="1" min="1" required readonly
                                class="w-8 text-center font-black text-sm text-[#241812] outline-none bg-transparent">
                            <button type="button" onclick="adjustQty(1)" 
                                class="w-7 h-7 rounded-lg bg-[#EAE2D5] hover:bg-[#DFD5C6] text-[#241812] font-black text-sm flex items-center justify-center border border-[#CBBDAA] shadow-[0_2px_0_#B8A795] active:translate-y-0.5 active:shadow-none transition cursor-pointer">+</button>
                        </div>
                    </div>
                </div>

                <!-- 1B. Mode Pesanan Paket Bundle (Multi-Item Card List) -->
                <div id="bundleProductsView" class="hidden bg-[#EAE2D5]/70 p-4 rounded-2xl border border-[#D5C7B6] shadow-[0_2px_0_#C5B9A8] space-y-2.5">
                    <div class="flex items-center justify-between text-xs font-bold text-[#241812] pb-2 border-b border-[#D5C7B6]">
                        <span class="flex items-center gap-1.5 font-black uppercase tracking-wider">
                            <span>Rincian Paket Bundle Terpilih</span>
                        </span>
                        <span id="bundleModalItemCount" class="text-[10px] text-[#F5EFE6] bg-[#3D3025] px-3 py-0.5 rounded-full font-black shadow-xs">0 Menu</span>
                    </div>
                    <div id="bundleModalItemsList" class="space-y-2 max-h-40 overflow-y-auto pr-1"></div>
                </div>

                <!-- GRUP 1: DATA KONTAK PEMESAN (VINTAGE CARD DENGAN BORDER ALUS) -->
                <div class="bg-[#FAF7F1] rounded-2xl border border-[#D5C7B6] p-4 space-y-3 shadow-[0_2px_0_#C5B9A8]">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-[#3D3025] text-[#F5EFE6] text-xs font-black flex items-center justify-center shadow-[0_2px_0_#1A130F] border border-white/20">1</span>
                        <h4 class="text-xs font-black text-[#241812] uppercase tracking-wider">Data Pemesan</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">
                                Nama Lengkap <span class="text-[#8C5D38]">*</span>
                            </label>
                            <input type="text" name="customer_name" required placeholder="Contoh: Sarah Angelina"
                                class="w-full bg-[#FAF7F1] border border-[#C5B49F] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#241812] placeholder-[#8C7D70] focus:border-[#9E8975] focus:ring-4 focus:ring-[#9E8975]/20 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">
                                WhatsApp Aktif <span class="text-[#8C5D38]">*</span>
                            </label>
                            <input type="text" name="customer_phone" required placeholder="08xxxxxxxxxx"
                                class="w-full bg-[#FAF7F1] border border-[#C5B49F] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#241812] placeholder-[#8C7D70] focus:border-[#9E8975] focus:ring-4 focus:ring-[#9E8975]/20 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                        </div>
                    </div>
                </div>

                <!-- GRUP 2: JADWAL & PENGIRIMAN (VINTAGE CARD) -->
                <div class="bg-[#FAF7F1] rounded-2xl border border-[#D5C7B6] p-4 space-y-3 shadow-[0_2px_0_#C5B9A8]">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-[#3D3025] text-[#F5EFE6] text-xs font-black flex items-center justify-center shadow-[0_2px_0_#1A130F] border border-white/20">2</span>
                        <h4 class="text-xs font-black text-[#241812] uppercase tracking-wider">Jadwal & Pengantaran</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-end">
                        <div class="sm:col-span-5">
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">
                                Tanggal Acara / Kirim <span class="text-[#8C5D38]">*</span>
                            </label>
                            <input type="date" name="delivery_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required
                                class="w-full bg-[#FAF7F1] border border-[#C5B49F] rounded-xl px-3 py-2 text-xs sm:text-sm font-bold text-[#241812] focus:border-[#9E8975] focus:ring-4 focus:ring-[#9E8975]/20 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                        </div>
                        <div class="sm:col-span-7">
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">Metode Pengambilan</label>
                            <div class="grid grid-cols-3 gap-1.5 p-1.5 bg-[#EAE2D5] rounded-xl border border-[#D5C7B6] shadow-[inset_0_1px_2px_rgba(0,0,0,0.03)]">
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="order_type" value="delivery" checked class="hidden peer" onchange="toggleAddressField(true)">
                                    <span class="block py-2 text-[11px] font-black text-[#695C51] rounded-lg hover:bg-white/80 peer-checked:bg-[#3D3025] peer-checked:text-[#F5EFE6] peer-checked:shadow-[0_2px_0_#1A130F] transition-all select-none">
                                        Kurir Antar
                                    </span>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="order_type" value="pickup" class="hidden peer" onchange="toggleAddressField(false)">
                                    <span class="block py-2 text-[11px] font-black text-[#695C51] rounded-lg hover:bg-white/80 peer-checked:bg-[#3D3025] peer-checked:text-[#F5EFE6] peer-checked:shadow-[0_2px_0_#1A130F] transition-all select-none">
                                        Ambil Toko
                                    </span>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="order_type" value="cod" class="hidden peer" onchange="toggleAddressField(true)">
                                    <span class="block py-2 text-[11px] font-black text-[#695C51] rounded-lg hover:bg-white/80 peer-checked:bg-[#3D3025] peer-checked:text-[#F5EFE6] peer-checked:shadow-[0_2px_0_#1A130F] transition-all select-none">
                                        Bayar COD
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Pengiriman Kondisional -->
                    <div id="addressContainer">
                        <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">Alamat Lengkap Pengiriman</label>
                        <input type="text" name="address" placeholder="Jalan, nomor rumah, kelurahan, patokan lokasi..."
                            class="w-full bg-[#FAF7F1] border border-[#C5B49F] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#241812] placeholder-[#8C7D70] focus:border-[#9E8975] focus:ring-4 focus:ring-[#9E8975]/20 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                    </div>
                </div>

                <!-- GRUP 3: METODE PEMBAYARAN (VINTAGE TILES) -->
                <div class="bg-[#FAF7F1] rounded-2xl border border-[#D5C7B6] p-4 space-y-3.5 shadow-[0_2px_0_#C5B9A8]">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-[#3D3025] text-[#F5EFE6] text-xs font-black flex items-center justify-center shadow-[0_2px_0_#1A130F] border border-white/20">3</span>
                            <h4 class="text-xs font-black text-[#241812] uppercase tracking-wider">Metode Pembayaran</h4>
                        </div>
                        <span class="text-[10px] font-bold text-[#544335] bg-[#EAE2D5] px-3 py-1 rounded-full border border-[#CBBDAA]">Bebas Biaya Admin</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2.5">
                        <!-- Opsi 1: QRIS (Vintage Espresso 3D Tile) -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="qris" checked class="hidden peer" onchange="onPaymentMethodChange('qris')">
                            <div class="p-3 rounded-xl border border-[#D5C7B6] bg-[#FAF7F1] text-center shadow-[0_2px_0_#C5B9A8] hover:border-[#9E8975] peer-checked:bg-gradient-to-br peer-checked:from-[#3D3025] peer-checked:via-[#524133] peer-checked:to-[#2D221A] peer-checked:text-white peer-checked:border-[#1A130F] peer-checked:shadow-[0_4px_0_#1A130F,0_8px_16px_rgba(0,0,0,0.3)] transition-all select-none">
                                <span class="text-xs sm:text-sm block font-black leading-none">QRIS</span>
                                <span class="text-[9px] opacity-90 block mt-1 font-bold">Barcode Instant</span>
                            </div>
                        </label>

                        <!-- Opsi 2: Transfer Bank (Vintage Brown Tile) -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="transfer" class="hidden peer" onchange="onPaymentMethodChange('transfer')">
                            <div class="p-3 rounded-xl border border-[#D5C7B6] bg-[#FAF7F1] text-center shadow-[0_2px_0_#C5B9A8] hover:border-[#9E8975] peer-checked:bg-gradient-to-br peer-checked:from-[#3D3025] peer-checked:via-[#524133] peer-checked:to-[#2D221A] peer-checked:text-white peer-checked:border-[#1A130F] peer-checked:shadow-[0_4px_0_#1A130F,0_8px_16px_rgba(0,0,0,0.3)] transition-all select-none">
                                <span class="text-xs sm:text-sm block font-black leading-none">Transfer</span>
                                <span class="text-[9px] opacity-90 block mt-1 font-bold">Multi-Bank</span>
                            </div>
                        </label>

                        <!-- Opsi 3: Tunai / COD (Vintage Slate Tile) -->
                        <label class="cursor-pointer">
                            <input type="radio" name="payment_method" value="cod" class="hidden peer" onchange="onPaymentMethodChange('cod')">
                            <div class="p-3 rounded-xl border border-[#D5C7B6] bg-[#FAF7F1] text-center shadow-[0_2px_0_#C5B9A8] hover:border-[#9E8975] peer-checked:bg-gradient-to-br peer-checked:from-[#334155] peer-checked:via-[#475569] peer-checked:to-[#1E293B] peer-checked:text-white peer-checked:border-[#0F172A] peer-checked:shadow-[0_4px_0_#0F172A,0_8px_16px_rgba(71,85,105,0.35)] transition-all select-none">
                                <span class="text-xs sm:text-sm block font-black leading-none">Tunai</span>
                                <span class="text-[9px] opacity-90 block mt-1 font-bold">Di Lokasi / COD</span>
                            </div>
                        </label>
                    </div>

                    <!-- Panel Info QRIS Barcode (Vintage Info Box) -->
                    <div id="qrisInfoBox" class="p-4 bg-[#EAE2D5]/80 border border-[#CBBDAA] rounded-2xl text-xs space-y-1.5 shadow-[0_2px_0_#B8A795]">
                        <div class="flex items-center gap-2 text-[#544335] font-black text-xs">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#B89658] animate-pulse"></span>
                            <span>Barcode QRIS Otomatis Terbit pada Nota</span>
                        </div>
                        <p class="text-[11px] text-[#52443A] leading-relaxed font-semibold">
                            Setelah konfirmasi, nota digital otomatis menampilkan barcode QRIS yang siap dipindai melalui BCA Mobile, Livin, GoPay, OVO, ShopeePay, DANA, dan semua m-Banking.
                        </p>
                    </div>

                    <!-- Panel Pilihan Rekening Bank Dinamis (Inputan Admin) -->
                    <div id="bankOptionsContainer" class="hidden p-4 bg-[#EAE2D5]/80 border border-[#CBBDAA] rounded-2xl space-y-2.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-black text-[#241812] uppercase tracking-wider block">Pilih Rekening Tujuan:</span>
                            <span class="text-[10px] font-bold text-[#544335] bg-[#FAF7F1] px-2.5 py-0.5 rounded-full border border-[#D5C7B6]">Kelolaan Admin</span>
                        </div>

                        <div class="space-y-2 max-h-40 overflow-y-auto pr-1">
                            @forelse($bankAccounts as $index => $bank)
                            <label class="block cursor-pointer">
                                <input type="radio" name="bank_account_id" value="{{ $bank->id }}" {{ $index === 0 ? 'checked' : '' }} class="hidden peer">
                                <div class="p-3 rounded-xl border border-[#D5C7B6] bg-[#FAF7F1] hover:border-[#241812] shadow-[0_2px_0_#C5B9A8] peer-checked:bg-[#3D3025] peer-checked:text-white peer-checked:border-[#1A130F] peer-checked:shadow-[0_3px_0_#1A130F] transition-all flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-11 h-8 rounded-lg bg-[#241812] peer-checked:bg-[#FAF7F1] text-white peer-checked:text-[#241812] font-black text-xs flex items-center justify-center uppercase tracking-wider shrink-0 transition-colors shadow-2xs">
                                            {{ substr($bank->bank_name, 0, 4) }}
                                        </div>
                                        <div>
                                            <p class="text-xs font-black leading-tight">{{ $bank->bank_name }}</p>
                                            <p class="text-[10px] opacity-90 font-mono font-bold">{{ $bank->account_number }} (a.n {{ $bank->account_name }})</p>
                                        </div>
                                    </div>
                                    <span class="text-sm font-black opacity-0 peer-checked:opacity-100 transition-opacity">✓</span>
                                </div>
                            </label>
                            @empty
                            <div class="p-3 rounded-xl bg-[#FAF7F1] border border-[#D5C7B6] text-center text-xs font-semibold text-[#695C51]">
                                Rekening bank resmi akan dikonfirmasikan via admin WhatsApp.
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Panel Info Bayar Tunai / COD -->
                    <div id="codInfoBox" class="hidden p-4 bg-[#EAE2D5]/80 border border-[#CBBDAA] rounded-2xl text-xs space-y-1.5 shadow-[0_2px_0_#B8A795]">
                        <div class="flex items-center gap-2 text-[#241812] font-black text-xs">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#B89658]"></span>
                            <span>Pembayaran Tunai di Lokasi</span>
                        </div>
                        <p class="text-[11px] text-[#52443A] leading-relaxed font-semibold">
                            Siapkan uang pas sesuai total tagihan saat kurir toko menyerahkan pesanan atau saat Anda mengambil langsung di gerai Mey Bakery.
                        </p>
                    </div>
                </div>

                <!-- GRUP 4: SALURAN KONFIRMASI & CATATAN (VINTAGE CARD) -->
                <div class="bg-[#FAF7F1] rounded-2xl border border-[#D5C7B6] p-4 space-y-3 shadow-[0_2px_0_#C5B9A8]">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-lg bg-[#3D3025] text-[#F5EFE6] text-xs font-black flex items-center justify-center shadow-[0_2px_0_#1A130F] border border-white/20">4</span>
                        <h4 class="text-xs font-black text-[#241812] uppercase tracking-wider">Jalur Konfirmasi & Catatan</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">Jalur Konfirmasi</label>
                            <div class="grid grid-cols-2 gap-1.5 p-1.5 bg-[#EAE2D5] rounded-xl border border-[#D5C7B6] shadow-[inset_0_1px_2px_rgba(0,0,0,0.03)]">
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="checkout_via" value="web" checked class="hidden peer">
                                    <span class="block py-2 text-[11px] font-black text-[#695C51] rounded-lg hover:bg-white/80 peer-checked:bg-[#3D3025] peer-checked:text-[#F5EFE6] peer-checked:shadow-[0_2px_0_#1A130F] transition-all select-none">
                                        Web & QRIS
                                    </span>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="checkout_via" value="whatsapp" class="hidden peer">
                                    <span class="block py-2 text-[11px] font-black text-[#695C51] rounded-lg hover:bg-white/80 peer-checked:bg-[#3D3025] peer-checked:text-[#F5EFE6] peer-checked:shadow-[0_2px_0_#1A130F] transition-all select-none">
                                        WhatsApp
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-wider text-[#241812] mb-1.5">Catatan Tambahan (Opsional)</label>
                            <input type="text" name="notes" placeholder="Tulisan kue, instruksi kurir..."
                                class="w-full bg-[#FAF7F1] border border-[#C5B49F] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#241812] placeholder-[#8C7D70] focus:border-[#9E8975] focus:ring-4 focus:ring-[#9E8975]/20 outline-none transition shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)]">
                        </div>
                    </div>
                </div>

                <!-- Footer Modal: Total Tagihan & Vintage Espresso Submit Button -->
                <div class="pt-4 border-t border-[#D5C7B6] flex items-center justify-between gap-4">
                    <div>
                        <span class="text-[10px] text-[#695C51] uppercase font-black tracking-wider block">Total Tagihan:</span>
                        <p id="modalTotalAmount" class="text-xl sm:text-2xl font-black text-[#3D2C21]">Rp 0</p>
                    </div>
                    <button type="submit" 
                        class="relative inline-flex items-center justify-center gap-2 px-8 py-3.5 sm:py-4 rounded-2xl font-black text-xs sm:text-sm text-[#F5EFE6] tracking-wide bg-gradient-to-r from-[#44352A] via-[#5A4537] to-[#3B2C22] border-t border-white/25 shadow-[0_5px_0_#1A130F,0_14px_28px_rgba(0,0,0,0.35)] hover:brightness-110 active:translate-y-1 active:shadow-[0_1px_0_#1A130F] transition-all cursor-pointer select-none">
                        <span>Konfirmasi Pesanan</span>
                        <span>→</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- 7. CLEAN & MODERN CLASSIC FOOTER (VINTAGE ELEGAN) -->
    <footer class="bg-[#382E28]/95 text-[#D5C7B8] py-6 sm:py-8 border-t border-white/15 text-xs mt-10">
        <div class="w-full max-w-[1440px] 2xl:max-w-[1680px] mx-auto px-3 sm:px-6 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div>
                <span class="font-serif font-black text-[#F4EFE6] text-base">Mey Bakery.</span>
                <p class="text-[10px] text-[#8C7E72] mt-0.5">Artisan Pâtisserie & Specialty Bakes • Desa Sidomukti, Brondong, Lamongan</p>
            </div>
            <div class="flex items-center gap-4 text-xs text-[#B8ADA2] flex-wrap justify-center">
                <a href="{{ route('landing') }}" class="hover:text-[#F4EFE6] transition">Beranda</a>
                <a href="https://maps.app.goo.gl/t3jdgJkREApyAzREA" target="_blank" class="hover:text-[#F4EFE6] transition">Lokasi Maps ↗</a>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-[#F4EFE6] transition">WhatsApp Admin</a>
                <a href="{{ route('login') }}" class="hover:text-[#F4EFE6] transition text-[#8C7E72]">Admin</a>
                <span class="text-[#4D3F33] hidden sm:inline">•</span>
                <span class="text-[#8C7E72] text-[11px]">&copy; {{ date('Y') }} Mey Bakery</span>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT LOGIC (DUKUNGAN PEMESANAN BUNDLE & PENGATUR JUMLAH) -->
    <script>
        let selectedProductPrice = 0;
        let isBundleMode = false;
        let cartItems = [];

        // 1. Filter Kategori (Vintage Styling)
        function filterCategory(cat, buttonEl) {
            document.querySelectorAll('.cat-pill').forEach(btn => {
                btn.classList.remove('bg-[#3D3025]', 'text-[#F5EFE6]', 'shadow-[0_2px_0_#1A130F]');
                btn.classList.add('bg-[#EAE2D5]', 'hover:bg-[#DFD5C6]', 'text-[#544335]', 'border', 'border-[#CBBDAA]', 'shadow-[0_1px_0_#B8A795]');
            });
            buttonEl.classList.add('bg-[#3D3025]', 'text-[#F5EFE6]', 'shadow-[0_2px_0_#1A130F]');
            buttonEl.classList.remove('bg-[#EAE2D5]', 'hover:bg-[#DFD5C6]', 'text-[#544335]', 'border', 'border-[#CBBDAA]', 'shadow-[0_1px_0_#B8A795]');

            const items = document.querySelectorAll('.menu-grid-item');
            items.forEach((item) => {
                const itemCat = item.getAttribute('data-category');
                const matches = (cat === 'all' || itemCat.toLowerCase().includes(cat.toLowerCase()));
                if (matches) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // 2. Pencarian Real-Time
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const items = document.querySelectorAll('.menu-grid-item');
            items.forEach(item => {
                const name = item.getAttribute('data-name');
                if (name.includes(query)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // 3. Checkout Modal Controllers (Single & Bundle)
        function openCheckoutModal(product) {
            isBundleMode = false;
            document.getElementById('formBundleItems').value = '';
            document.getElementById('modalTypeBadge').innerText = 'Pemesanan Langsung';
            document.getElementById('singleProductView').classList.remove('hidden');
            document.getElementById('bundleProductsView').classList.add('hidden');

            selectedProductPrice = parseInt(product.price_idr);
            document.getElementById('formProductId').value = product.id;
            document.getElementById('modalProductName').innerText = product.name;
            document.getElementById('modalProductPrice').innerText = 'Rp ' + selectedProductPrice.toLocaleString('id-ID');
            document.getElementById('formQuantity').value = 1;
            recalcOrderTotal();
            onPaymentMethodChange('qris');
            document.querySelectorAll('input[name="payment_method"][value="qris"]').forEach(r => r.checked = true);
            document.getElementById('checkoutModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openBundleCheckoutModal() {
            if (cartItems.length === 0) return;
            isBundleMode = true;

            document.getElementById('modalTypeBadge').innerText = 'Paket Bundle Pilihan';
            document.getElementById('modalProductName').innerText = 'Paket Bundle (' + cartItems.length + ' Menu)';
            document.getElementById('singleProductView').classList.add('hidden');
            document.getElementById('bundleProductsView').classList.remove('hidden');

            // Encode bundle items JSON
            const bundlePayload = cartItems.map(item => ({
                id: item.id,
                qty: item.qty,
                name: item.name,
                price: item.price
            }));
            document.getElementById('formBundleItems').value = JSON.stringify(bundlePayload);
            document.getElementById('formProductId').value = cartItems[0].id;

            let totalQty = 0;
            let grandTotal = 0;
            const listEl = document.getElementById('bundleModalItemsList');
            listEl.innerHTML = '';

            cartItems.forEach(item => {
                const lineTotal = item.price * item.qty;
                totalQty += item.qty;
                grandTotal += lineTotal;

                listEl.innerHTML += `
                    <div class="p-2.5 rounded-xl bg-[#FAF7F1] border border-[#D5C7B6] flex items-center justify-between text-xs shadow-[0_1px_0_#C5B9A8]">
                        <div class="flex items-center gap-2 min-w-0">
                            <img src="${item.image_url}" class="w-9 h-10 rounded-lg object-cover border border-[#D5C7B6] shrink-0">
                            <div class="min-w-0">
                                <p class="font-bold text-[#241812] truncate leading-tight">${item.name}</p>
                                <p class="text-[10px] text-[#695C51]">Rp ${item.price.toLocaleString('id-ID')} × ${item.qty}</p>
                            </div>
                        </div>
                        <span class="font-black text-[#3D2C21] text-xs shrink-0 ml-2">Rp ${lineTotal.toLocaleString('id-ID')}</span>
                    </div>
                `;
            });

            document.getElementById('formQuantity').value = totalQty;
            document.getElementById('bundleModalItemCount').innerText = `${cartItems.length} Menu (${totalQty} item)`;
            document.getElementById('modalTotalAmount').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');
            onPaymentMethodChange('qris');
            document.querySelectorAll('input[name="payment_method"][value="qris"]').forEach(r => r.checked = true);

            document.getElementById('checkoutModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeCheckoutModal() {
            document.getElementById('checkoutModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function recalcOrderTotal() {
            if (isBundleMode) return;
            const qty = parseInt(document.getElementById('formQuantity').value) || 1;
            const total = selectedProductPrice * qty;
            document.getElementById('modalTotalAmount').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function adjustQty(change) {
            if (isBundleMode) return;
            const qtyInput = document.getElementById('formQuantity');
            let current = parseInt(qtyInput.value) || 1;
            current += change;
            if (current < 1) current = 1;
            qtyInput.value = current;
            recalcOrderTotal();
        }

        function toggleAddressField(show) {
            const addr = document.getElementById('addressContainer');
            if (show) {
                addr.classList.remove('hidden');
            } else {
                addr.classList.add('hidden');
            }
        }

        // 3B. Payment Method Dynamic Sub-Panel Toggle
        function onPaymentMethodChange(method) {
            const qrisBox = document.getElementById('qrisInfoBox');
            const bankBox = document.getElementById('bankOptionsContainer');
            const codBox = document.getElementById('codInfoBox');

            if (qrisBox) qrisBox.classList.add('hidden');
            if (bankBox) bankBox.classList.add('hidden');
            if (codBox) codBox.classList.add('hidden');

            if (method === 'qris' && qrisBox) {
                qrisBox.classList.remove('hidden');
            } else if (method === 'transfer' && bankBox) {
                bankBox.classList.remove('hidden');
            } else if (method === 'cod' && codBox) {
                codBox.classList.remove('hidden');
            }
        }

        // 4. Shopping Cart Trolley Controllers
        function addToCart(product) {
            const existing = cartItems.find(item => item.id === product.id);
            if (existing) {
                existing.qty += 1;
            } else {
                cartItems.push({
                    id: product.id,
                    name: product.name,
                    price: parseInt(product.price_idr),
                    image_url: product.image_url || 'https://placehold.co/100x100/F5EFE4/2C1A11?text=Mey',
                    category: product.category,
                    stock: parseInt(product.stock),
                    productObj: product,
                    qty: 1
                });
            }
            updateCartUI();
            toggleCartDrawer(true);
        }

        function changeCartItemQty(index, change) {
            if (!cartItems[index]) return;
            const newQty = cartItems[index].qty + change;
            if (newQty <= 0) {
                removeFromCart(index);
            } else {
                if (cartItems[index].stock && newQty > cartItems[index].stock) {
                    alert('Maaf, stok ' + cartItems[index].name + ' tersisa ' + cartItems[index].stock + ' unit.');
                    return;
                }
                cartItems[index].qty = newQty;
                updateCartUI();
            }
        }

        function toggleCartDrawer(forceOpen = null) {
            const drawer = document.getElementById('cartDrawer');
            if (forceOpen === true) {
                drawer.classList.remove('hidden');
            } else if (forceOpen === false) {
                drawer.classList.add('hidden');
            } else {
                drawer.classList.toggle('hidden');
            }
        }

        function updateCartUI() {
            const listEl = document.getElementById('cartItemsList');
            const countBadge = document.getElementById('cartCountBadge');
            const totalEl = document.getElementById('cartDrawerTotal');
            const checkoutBtn = document.getElementById('btnCheckoutCart');
            const checkoutBtnText = document.getElementById('btnCheckoutCartText');
            const bundleCountEl = document.getElementById('cartDrawerBundleCount');
            const headerBadge = document.getElementById('cartDrawerBadgeHeader');

            listEl.innerHTML = '';
            let total = 0;
            let totalQty = 0;

            if (cartItems.length === 0) {
                listEl.innerHTML = `
                    <div class="py-14 text-center text-xs text-[#7A7570] space-y-2 border-2 border-dashed border-[#DDD5C8] rounded-2xl mx-1 bg-[#FAF7F0]">
                        <div class="w-10 h-10 rounded-full bg-[#F1EDE6] flex items-center justify-center mx-auto text-[#8C7D70]">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <p class="font-bold text-xs text-[#2C1A11]">Troli bundle masih kosong</p>
                        <p class="text-[10px] text-[#7A7570] max-w-[200px] mx-auto">Pilih menu dari etalase untuk membuat paket bundle.</p>
                    </div>
                `;
                checkoutBtn.disabled = true;
                if (bundleCountEl) bundleCountEl.innerText = '0 menu (0 item)';
                if (headerBadge) headerBadge.innerText = '0 Menu';
                if (checkoutBtnText) checkoutBtnText.innerText = 'Lanjut Pesan Bundle';
            } else {
                checkoutBtn.disabled = false;
                if (headerBadge) headerBadge.innerText = `${cartItems.length} Menu`;
                if (checkoutBtnText) checkoutBtnText.innerText = `Lanjut Pesan Bundle (${cartItems.length} Menu)`;

                cartItems.forEach((item, index) => {
                    const subtotal = item.price * item.qty;
                    total += subtotal;
                    totalQty += item.qty;

                    listEl.innerHTML += `
                        <div class="p-2.5 rounded-xl bg-[#FAF7F1] border border-[#D5C7B6] flex items-center gap-2.5 shadow-[0_1px_0_#C5B9A8] hover:border-[#9E8975] transition-colors">
                            <div class="relative w-12 h-14 rounded-lg overflow-hidden bg-[#ECE4D8] shrink-0 border border-[#D5C7B6]">
                                <img src="${item.image_url}" class="w-full h-full object-cover">
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <span class="text-[8px] font-bold text-[#695C51] uppercase tracking-widest block">${item.category || 'Menu'}</span>
                                <h4 class="font-bold text-[#241812] text-xs truncate leading-tight mt-0.5">${item.name}</h4>
                                <p class="text-[11px] font-black text-[#3D2C21] mt-1">Rp ${item.price.toLocaleString('id-ID')}</p>
                            </div>

                            <div class="flex flex-col items-end justify-between self-stretch gap-1 shrink-0">
                                <button type="button" onclick="removeFromCart(${index})" title="Hapus menu ini" class="text-[#8C7D70] hover:text-[#241812] transition p-0.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                                
                                <div class="flex items-center bg-[#EAE2D5] rounded-lg border border-[#CBBDAA] p-0.5 shadow-2xs">
                                    <button type="button" onclick="changeCartItemQty(${index}, -1)" class="w-5 h-5 rounded-md bg-[#FAF7F1] hover:bg-[#DFD5C6] text-[#241812] font-bold text-xs flex items-center justify-center transition">−</button>
                                    <span class="w-5 text-center font-bold text-[11px] text-[#241812]">${item.qty}</span>
                                    <button type="button" onclick="changeCartItemQty(${index}, 1)" class="w-5 h-5 rounded-md bg-[#FAF7F1] hover:bg-[#DFD5C6] text-[#241812] font-bold text-xs flex items-center justify-center transition">+</button>
                                </div>
                            </div>
                        </div>
                    `;
                });

                if (bundleCountEl) bundleCountEl.innerText = `${cartItems.length} menu (${totalQty} item)`;
            }

            countBadge.innerText = totalQty;
            totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function removeFromCart(index) {
            cartItems.splice(index, 1);
            updateCartUI();
        }

        function proceedFromCart() {
            if (cartItems.length > 0) {
                toggleCartDrawer(false);
                openBundleCheckoutModal();
            }
        }

        // Dynamic 5-Second Scroll Motion for Every Icon on Page Scroll
        let isShopScrollingTimer;
        let lastShopScrollPos = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentPos = window.scrollY;
            const scrollDiff = currentPos - lastShopScrollPos;
            const dir = scrollDiff >= 0 ? 1 : -1;
            lastShopScrollPos = currentPos;

            const icons = document.querySelectorAll('.scroll-icon');
            icons.forEach((icon, idx) => {
                icon.style.transition = 'transform 5s cubic-bezier(0.16, 1, 0.3, 1), filter 5s ease';
                const swayAngle = (idx % 2 === 0 ? 1 : -1) * 8;
                const floatLift = dir * -10;
                icon.style.transform = `translateY(${floatLift}px) rotate(${swayAngle}deg) scale(1.18)`;
                icon.style.filter = 'drop-shadow(0 10px 18px rgba(220, 190, 155, 0.55))';
            });

            clearTimeout(isShopScrollingTimer);
            isShopScrollingTimer = setTimeout(() => {
                icons.forEach(icon => {
                    icon.style.transform = 'translateY(0px) rotate(0deg) scale(1)';
                    icon.style.filter = 'none';
                });
            }, 700);
        }, { passive: true });
    </script>
</body>
</html>
