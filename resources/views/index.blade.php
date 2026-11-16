<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison Artisane — Official Food & Bakery Store</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#F8FAF8] text-[#1E2621] antialiased min-h-screen flex flex-col selection:bg-[#D5E3D8] selection:text-[#162D1F]">

    <!-- 1. Top Ribbon Marketplace -->
    <div class="bg-[#18261E] text-[#DCE7DF] text-[11px] py-2 px-4 text-center font-medium tracking-wide flex justify-center items-center gap-3">
        <span>✨ Official Bakery D2C Marketplace</span>
        <span class="opacity-40">•</span>
        <span class="text-[#D8B084] font-semibold">Bebas Pajak & Admin Marketplace</span>
        <span class="opacity-40">•</span>
        <span>Melayani COD, Kurir Antar & Ambil di Toko</span>
    </div>

    <!-- 2. Sticky Header Toko Brand (Portal Admin Resmi Dihilangkan dari Navigasi) -->
    <header class="bg-white/95 backdrop-blur-md border-b border-[#E3EAE4] sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Identity Toko -->
            <div class="flex items-center gap-3.5 shrink-0">
                <div class="w-10 h-10 rounded-2xl bg-[#18261E] text-[#FAF6F0] flex items-center justify-center font-serif font-bold text-lg shadow-sm border border-[#2D3E33]">
                    M
                </div>
                <div>
                    <span class="text-base font-serif font-bold tracking-tight text-[#16241B] block leading-tight">Maison Artisane</span>
                    <span class="text-[10px] tracking-[0.2em] uppercase text-[#6C7E72] font-semibold">Haute Patisserie Store</span>
                </div>
            </div>

            <!-- Search Bar Marketplace Cepat -->
            <div class="hidden md:flex flex-1 max-w-md mx-4">
                <div class="relative w-full">
                    <input type="text" id="searchInput" oninput="searchProducts()" placeholder="Cari kue tart, croissant, minuman cold brew..." 
                        class="w-full bg-[#F4F6F4] border border-[#CCD8CF] rounded-full pl-10 pr-4 py-2 text-xs text-[#1E2621] placeholder-[#8C9C90] focus:ring-2 focus:ring-[#18261E]/20 focus:border-[#18261E] outline-none">
                    <svg class="w-4 h-4 text-[#8C9C90] absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Navigasi Menu & Floating Cart Button -->
            <div class="flex items-center gap-3">
                <a href="#katalog" class="hidden sm:inline-block text-xs font-semibold text-[#48594D] hover:text-[#18261E] px-3 py-2 transition">
                    Semua Menu
                </a>
                <a href="#lokasi" class="hidden sm:inline-block text-xs font-semibold text-[#48594D] hover:text-[#18261E] px-3 py-2 transition">
                    Info Toko
                </a>

                <!-- Tombol Keranjang Belanja -->
                <button onclick="toggleCartDrawer()" class="bg-[#18261E] hover:bg-[#25392D] text-white text-xs font-semibold px-4 py-2.5 rounded-full transition shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span>Keranjang</span>
                    <span id="cartCountBadge" class="bg-[#D8B084] text-[#18261E] font-bold text-[10px] w-5 h-5 rounded-full flex items-center justify-center">0</span>
                </button>
            </div>
        </div>
    </header>

    <!-- 3. Marketplace Hero Banner (Full Toko Kue & Roti) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-4">
        <div class="bg-gradient-to-r from-[#18261E] via-[#213329] to-[#2D4537] rounded-3xl p-8 md:p-12 text-[#FAF6F0] relative overflow-hidden shadow-lg">
            <div class="relative z-10 max-w-xl space-y-4">
                <span class="inline-block bg-[#FAF6F0]/15 text-[#E6EFE9] text-[10px] uppercase font-bold tracking-[0.2em] px-3 py-1 rounded-full backdrop-blur-sm border border-white/10">
                    Artisanal Fresh Kitchen
                </span>
                <h1 class="text-3xl md:text-5xl font-serif font-bold leading-tight text-white">
                    Pesan Kue Tart & Roti Langsung dari Dapur Resmi.
                </h1>
                <p class="text-xs md:text-sm text-[#CFDCD3] leading-relaxed">
                    Nikmati kelezatan 100% pure Normandy butter tanpa biaya admin aplikasi luar. Pilih kurir antar toko, bayar di tempat (COD), atau ambil mandiri di outlet kami.
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="#katalog" class="bg-[#FAF6F0] hover:bg-white text-[#18261E] font-bold text-xs uppercase tracking-wider px-6 py-3 rounded-xl transition shadow-md">
                        Mulai Belanja Menu ↓
                    </a>
                    <a href="#lokasi" class="bg-white/10 hover:bg-white/20 text-[#FAF6F0] border border-white/20 font-semibold text-xs uppercase tracking-wider px-5 py-3 rounded-xl transition">
                        Lokasi & Jam Buka
                    </a>
                </div>
            </div>

            <!-- Ornamen Estetik Latar -->
            <div class="absolute right-0 top-0 bottom-0 w-1/3 opacity-20 pointer-events-none hidden md:block bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#D8B084] via-transparent to-transparent"></div>
        </div>
    </section>

    <!-- 4. Filter Kategori Tab Marketplace -->
    <section id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#E3EAE4] pb-4">
            <div>
                <h2 class="text-lg font-serif font-bold text-[#16241B]">Katalog Menu Fresh Bake</h2>
                <p class="text-xs text-[#6C7E72]">Pilih kategori favorit Anda untuk memfilter produk</p>
            </div>

            <div class="flex flex-wrap gap-2">
                <button onclick="filterCategory('all', this)" class="cat-pill active-pill bg-[#18261E] text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow-sm">
                    Semua Menu
                </button>
                <button onclick="filterCategory('Tart & Cake', this)" class="cat-pill bg-white text-[#48594D] border border-[#CCD8CF] hover:bg-[#F2F6F3] text-xs font-semibold px-4 py-2 rounded-xl transition">
                    🎂 Tart & Cake
                </button>
                <button onclick="filterCategory('Pastry', this)" class="cat-pill bg-white text-[#48594D] border border-[#CCD8CF] hover:bg-[#F2F6F3] text-xs font-semibold px-4 py-2 rounded-xl transition">
                    🥐 Artisan Pastry
                </button>
                <button onclick="filterCategory('Beverage', this)" class="cat-pill bg-white text-[#48594D] border border-[#CCD8CF] hover:bg-[#F2F6F3] text-xs font-semibold px-4 py-2 rounded-xl transition">
                    ☕ Minuman Botol
                </button>
            </div>
        </div>

        @if(session('error'))
            <div class="mt-4 p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-2xl">{{ session('error') }}</div>
        @endif

        <!-- Grid Produk Marketplace -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @forelse($products as $product)
            <div class="product-item bg-white rounded-3xl border border-[#E3EAE4] p-4 flex flex-col justify-between shadow-xs hover:shadow-md transition" 
                data-category="{{ $product->category }}" data-name="{{ strtolower($product->name) }}">
                <div>
                    <!-- Visual Card -->
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-[#EEF2EE] mb-3.5">
                        <img src="{{ $product->image_url ?? 'https://placehold.co/400x400/eef2ee/18261e?text=Menu' }}" 
                            alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        <span class="absolute top-2.5 left-2.5 bg-white/90 backdrop-blur-md text-[#18261E] font-semibold text-[10px] px-2.5 py-0.5 rounded-full border border-[#D5DDD6]">
                            {{ $product->category }}
                        </span>
                        <span class="absolute bottom-2.5 right-2.5 bg-[#18261E]/80 backdrop-blur-md text-white text-[10px] px-2.5 py-0.5 rounded-full font-medium">
                            Stok: {{ $product->stock }}
                        </span>
                    </div>

                    <!-- Judul & Deskripsi -->
                    <h3 class="font-serif font-bold text-sm text-[#16241B] leading-snug line-clamp-1">{{ $product->name }}</h3>
                    <p class="text-[11px] text-[#6C7E72] mt-1 line-clamp-2">{{ $product->description ?? 'Dibuat segar dengan bahan baku pilihan terbaik.' }}</p>

                    <!-- Harga -->
                    <div class="mt-3 pt-2.5 border-t border-[#F0F4F0] flex items-baseline justify-between">
                        <div>
                            <span class="text-[10px] text-[#8C9C90] uppercase font-semibold block">Harga Menu</span>
                            <span class="text-sm font-bold text-[#16241B]">Rp {{ number_format($product->price_idr, 0, ',', '.') }}</span>
                        </div>
                        <span class="text-[10px] text-[#B07844] font-semibold">Ready Fresh</span>
                    </div>
                </div>

                <!-- Aksi Belanja Marketplace -->
                <div class="mt-4 pt-3 border-t border-[#F0F4F0] space-y-2">
                    <button onclick="openCheckoutSingle({{ json_encode($product) }})" 
                        class="w-full bg-[#18261E] hover:bg-[#25392D] text-white text-xs font-semibold py-2.5 rounded-xl transition shadow-xs flex items-center justify-center gap-1.5">
                        <span>Beli Sekarang</span>
                    </button>
                    
                    <div class="grid grid-cols-2 gap-1.5">
                        <button onclick="addToCart({{ json_encode($product) }})" 
                            class="bg-[#F4F6F4] hover:bg-[#E8EDE9] text-[#2D3E33] text-[11px] font-semibold py-1.5 rounded-xl transition border border-[#D5DDD6] flex items-center justify-center gap-1">
                            <span>+ Keranjang</span>
                        </button>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Maison%20Artisane,%20apakah%20menu%20*{{ urlencode($product->name) }}*%20masih%20ready?" target="_blank"
                            class="bg-[#EBF5EE] hover:bg-[#DBEADC] text-[#1E5C32] text-[11px] font-semibold py-1.5 rounded-xl transition text-center border border-[#BED9C5]">
                            💬 Tanya WA
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 py-16 text-center text-xs text-[#718576]">
                Belum ada produk aktif yang tersedia di katalog saat ini.
            </div>
            @endforelse
        </div>
    </section>

    <!-- 5. Bagian Informasi Lokasi, Jam Buka & Sosmed Resmi -->
    <section id="lokasi" class="bg-white border-t border-[#E3EAE4] py-16 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-12 gap-10 items-center">
                
                <div class="md:col-span-6 space-y-5">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#B07844] block">Boutique & Workshop</span>
                    <h2 class="text-3xl font-serif font-bold text-[#16241B]">Kunjungi Outlet & Dapur Kami</h2>
                    <p class="text-xs md:text-sm text-[#56685B] leading-relaxed">
                        Nikmati sensasi aroma roti hangat langsung dari oven. Kami melayani pemesanan langsung, pengambilan mandiri (*Self Pick-up*), kurir khusus kue, dan pembayaran di tempat (COD).
                    </p>

                    <div class="space-y-3 pt-2 text-xs text-[#3D4F42]">
                        <p class="flex items-start gap-2.5">
                            <span class="font-bold text-[#16241B] min-w-[70px]">Alamat:</span>
                            <span>Jl. Cempaka Patisserie No. 24, Area Heritage</span>
                        </p>
                        <p class="flex items-start gap-2.5">
                            <span class="font-bold text-[#16241B] min-w-[70px]">Jam Buka:</span>
                            <span>Setiap Hari: 08.00 – 21.00 WIB (Bake pagi jam 08.30)</span>
                        </p>
                        <p class="flex items-start gap-2.5">
                            <span class="font-bold text-[#16241B] min-w-[70px]">Pengiriman:</span>
                            <span>Antar ke Rumah (Kurir Toko), Ambil Sendiri, & COD</span>
                        </p>
                    </div>

                    <!-- Tautan Sosial Media -->
                    <div class="pt-4 border-t border-[#F0F4F0]">
                        <p class="text-[11px] font-semibold text-[#8C9C90] uppercase tracking-wider mb-3">Sosial Media Resmi Brand</p>
                        <div class="flex flex-wrap gap-2.5">
                            <a href="https://instagram.com" target="_blank" class="bg-[#F8FAF8] hover:bg-[#EEF2EE] text-[#18261E] text-xs font-semibold px-4 py-2 rounded-xl border border-[#D5DDD6] transition">
                                📸 Instagram: @maison.artisane
                            </a>
                            <a href="https://tiktok.com" target="_blank" class="bg-[#F8FAF8] hover:bg-[#EEF2EE] text-[#18261E] text-xs font-semibold px-4 py-2 rounded-xl border border-[#D5DDD6] transition">
                                🎵 TikTok: @maisonartisane
                            </a>
                            <a href="https://wa.me/6281234567890" target="_blank" class="bg-[#EBF5EE] hover:bg-[#DBEADC] text-[#1E5C32] text-xs font-semibold px-4 py-2 rounded-xl border border-[#BED9C5] transition">
                                💬 WhatsApp: 0812-3456-7890
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="md:col-span-6 h-80 rounded-3xl overflow-hidden border-2 border-[#E3EAE4] shadow-sm">
                    <iframe 
                        class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2f768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#18261E] text-[#9EB2A4] py-8 text-center text-xs">
        <p class="text-[#FAF6F0] font-serif text-sm mb-1">Maison Artisane Pastry</p>
        <p>© 2026 Maison Artisane. Direct-to-Consumer Food Marketplace.</p>
    </footer>

    <!-- DRAWER KERANJANG BELANJA (CART DRAWER) -->
    <div id="cartDrawer" class="fixed inset-0 bg-[#0E1511]/50 backdrop-blur-xs z-50 hidden">
        <div class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-white shadow-2xl flex flex-col justify-between p-6">
            <div>
                <div class="flex items-center justify-between border-b border-[#F0F4F0] pb-4">
                    <h3 class="font-serif font-bold text-base text-[#16241B]">Keranjang Belanja Anda</h3>
                    <button onclick="toggleCartDrawer()" class="text-[#8C9C90] hover:text-[#16241B] font-bold text-lg">✕</button>
                </div>
                <div id="cartItemsList" class="divide-y divide-[#F0F4F0] my-4 max-h-[60vh] overflow-y-auto">
                    <!-- Item keranjang dimasukkan dinamis lewat JS -->
                </div>
            </div>

            <div class="border-t border-[#F0F4F0] pt-4 space-y-3">
                <div class="flex justify-between items-center text-xs">
                    <span class="text-[#6C7E72] font-semibold">Total Sementara:</span>
                    <span id="cartDrawerTotal" class="font-bold text-sm text-[#16241B]">Rp 0</span>
                </div>
                <button onclick="proceedFromCart()" id="btnCheckoutCart" disabled
                    class="w-full bg-[#18261E] hover:bg-[#25392D] disabled:bg-gray-300 text-white text-xs font-semibold py-3 rounded-xl transition shadow-sm">
                    Lanjut ke Pengisian Pesanan →
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL FORMULIR CHECKOUT TERPADU MARKETPLACE -->
    <div id="checkoutModal" class="fixed inset-0 bg-[#0E1511]/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 shadow-2xl border border-[#CCD8CF] max-h-[92vh] overflow-y-auto">
            
            <div class="flex justify-between items-center mb-4 pb-3 border-b border-[#F0F4F0]">
                <div>
                    <span class="text-[10px] font-bold text-[#B07844] uppercase tracking-wider">Form Pemesanan Marketplace</span>
                    <h3 id="modalProductName" class="font-serif font-bold text-lg text-[#16241B]">Nama Menu</h3>
                </div>
                <button onclick="closeCheckoutModal()" class="text-[#8C9C90] hover:text-[#16241B] text-xl font-bold">✕</button>
            </div>

            <form action="{{ route('order.process') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" id="formProductId">

                <!-- Preview Barang & Kuantitas -->
                <div class="bg-[#F8FAF8] p-3.5 rounded-2xl border border-[#E3EAE4] flex justify-between items-center">
                    <div>
                        <span class="text-[11px] text-[#6C7E72] block">Harga Per Unit</span>
                        <span id="modalProductPrice" class="text-sm font-bold text-[#16241B]">Rp 0</span>
                    </div>
                    <div class="w-24">
                        <label class="block text-[10px] font-semibold text-[#56685B] uppercase mb-1">Jumlah (Qty)</label>
                        <input type="number" name="quantity" id="formQuantity" value="1" min="1" required oninput="recalcOrderTotal()"
                            class="w-full bg-white border border-[#CCD8CF] rounded-xl px-3 py-1.5 text-xs text-center font-bold text-[#16241B] outline-none">
                    </div>
                </div>

                <!-- Identitas Pembeli -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Nama Pemesan</label>
                        <input type="text" name="customer_name" required placeholder="Nama Anda"
                            class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Nomor WhatsApp</label>
                        <input type="text" name="customer_phone" required placeholder="08xxxxxxxxxx"
                            class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none">
                    </div>
                </div>

                <!-- Tanggal & Jasa Pengiriman Lengkap -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Target Tanggal Kirim</label>
                        <input type="date" name="delivery_date" required
                            class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Pilihan Jasa Pengiriman</label>
                        <select name="order_type" class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none">
                            <option value="delivery">Antar ke Alamat (Kurir Toko)</option>
                            <option value="pickup">Ambil Sendiri di Toko (Self Pick-up)</option>
                            <option value="cod">COD (Bayar di Tempat saat Antar)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Alamat Pengiriman (Wajib jika diantar / COD)</label>
                    <textarea name="address" rows="2" placeholder="Nama jalan, nomor rumah, kecamatan, detail patokan..."
                        class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none"></textarea>
                </div>

                <!-- METODE PEMBAYARAN: QRIS, TRANSFER BANK, ATAU COD -->
                <div class="pt-2 border-t border-[#F0F4F0]">
                    <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-2">Metode Pembayaran:</label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="border border-[#CCD8CF] p-2.5 rounded-xl cursor-pointer hover:bg-[#F8FAF8] transition block text-center">
                            <input type="radio" name="payment_method" value="qris" checked class="accent-[#18261E]">
                            <span class="block text-xs font-bold text-[#16241B] mt-1">QRIS Instant</span>
                            <span class="block text-[9px] text-[#6C7E72]">Semua E-Wallet</span>
                        </label>
                        <label class="border border-[#CCD8CF] p-2.5 rounded-xl cursor-pointer hover:bg-[#F8FAF8] transition block text-center">
                            <input type="radio" name="payment_method" value="transfer" class="accent-[#18261E]">
                            <span class="block text-xs font-bold text-[#16241B] mt-1">Transfer Bank</span>
                            <span class="block text-[9px] text-[#6C7E72]">BCA / Mandiri / BRI</span>
                        </label>
                        <label class="border border-[#CCD8CF] p-2.5 rounded-xl cursor-pointer hover:bg-[#F8FAF8] transition block text-center">
                            <input type="radio" name="payment_method" value="cod" class="accent-[#18261E]">
                            <span class="block text-xs font-bold text-[#1E5C32] mt-1">Tunai / COD</span>
                            <span class="block text-[9px] text-[#6C7E72]">Saat serah terima</span>
                        </label>
                    </div>
                </div>

                <!-- OPSI PENERUSAN (STRUK RESMI WEB vs LANGSUNG WA) -->
                <div class="pt-2 border-t border-[#F0F4F0]">
                    <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-2">Saluran Pemesanan:</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="border border-[#CCD8CF] p-2.5 rounded-xl cursor-pointer hover:bg-[#F8FAF8] transition block">
                            <input type="radio" name="checkout_via" value="web" checked class="accent-[#18261E]">
                            <span class="block text-xs font-bold text-[#16241B] mt-1">Struk Web Resmi</span>
                            <span class="block text-[10px] text-[#6C7E72]">Dapat nomor invoice & cetak PDF</span>
                        </label>
                        <label class="border border-[#CCD8CF] p-2.5 rounded-xl cursor-pointer hover:bg-[#F8FAF8] transition block">
                            <input type="radio" name="checkout_via" value="whatsapp" class="accent-[#18261E]">
                            <span class="block text-xs font-bold text-[#1E5C32] mt-1">Chat WhatsApp Toko</span>
                            <span class="block text-[10px] text-[#6C7E72]">Format teks nomor pesanan terisi</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold text-[#48594D] uppercase mb-1">Catatan Tambahan (Opsional)</label>
                    <input type="text" name="notes" placeholder="Contoh: Tulisan di kue: 'Happy Birthday' / Less sugar"
                        class="w-full bg-[#FAFBF9] border border-[#CCD8CF] rounded-xl px-3.5 py-2 text-xs text-[#16241B] outline-none">
                </div>

                <!-- Footer Total & Submit -->
                <div class="pt-3 border-t border-[#F0F4F0] flex justify-between items-center">
                    <div>
                        <span class="text-[10px] text-[#6C7E72] uppercase font-semibold">Total Tagihan:</span>
                        <p id="modalTotalAmount" class="text-base font-bold text-[#16241B]">Rp 0</p>
                    </div>
                    <button type="submit" class="bg-[#18261E] hover:bg-[#25392D] text-white text-xs font-semibold px-6 py-3 rounded-xl transition shadow-md">
                        Konfirmasi Pesanan →
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT: LOGIKA MARKETPLACE & KERANJANG BELANJA -->
    <script>
        let selectedProductPrice = 0;
        let cartItems = [];

        // 1. Filter Kategori Tab
        function filterCategory(cat, buttonEl) {
            document.querySelectorAll('.cat-pill').forEach(btn => {
                btn.classList.remove('bg-[#18261E]', 'text-white');
                btn.classList.add('bg-white', 'text-[#48594D]');
            });
            buttonEl.classList.add('bg-[#18261E]', 'text-white');
            buttonEl.classList.remove('bg-white', 'text-[#48594D]');

            document.querySelectorAll('.product-item').forEach(item => {
                const itemCat = item.getAttribute('data-category');
                if (cat === 'all' || itemCat.toLowerCase().includes(cat.toLowerCase())) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // 2. Pencarian Realtime
        function searchProducts() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            document.querySelectorAll('.product-item').forEach(item => {
                const name = item.getAttribute('data-name');
                if (name.includes(query)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // 3. Modal Single Checkout
        function openCheckoutSingle(product) {
            selectedProductPrice = parseInt(product.price_idr);
            document.getElementById('formProductId').value = product.id;
            document.getElementById('modalProductName').innerText = product.name;
            document.getElementById('modalProductPrice').innerText = 'Rp ' + selectedProductPrice.toLocaleString('id-ID');
            document.getElementById('formQuantity').value = 1;
            recalcOrderTotal();
            document.getElementById('checkoutModal').classList.remove('hidden');
        }

        function closeCheckoutModal() {
            document.getElementById('checkoutModal').classList.add('hidden');
        }

        function recalcOrderTotal() {
            const qty = parseInt(document.getElementById('formQuantity').value) || 1;
            const total = selectedProductPrice * qty;
            document.getElementById('modalTotalAmount').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        // 4. Cart Drawer Logic
        function addToCart(product) {
            const existing = cartItems.find(item => item.id === product.id);
            if (existing) {
                existing.qty += 1;
            } else {
                cartItems.push({
                    id: product.id,
                    name: product.name,
                    price: parseInt(product.price_idr),
                    productObj: product,
                    qty: 1
                });
            }
            updateCartUI();
            toggleCartDrawer();
        }

        function toggleCartDrawer() {
            const drawer = document.getElementById('cartDrawer');
            drawer.classList.toggle('hidden');
        }

        function updateCartUI() {
            const listEl = document.getElementById('cartItemsList');
            const countBadge = document.getElementById('cartCountBadge');
            const totalEl = document.getElementById('cartDrawerTotal');
            const checkoutBtn = document.getElementById('btnCheckoutCart');

            listEl.innerHTML = '';
            let total = 0;
            let totalQty = 0;

            if (cartItems.length === 0) {
                listEl.innerHTML = '<p class="text-xs text-center py-8 text-[#8C9C90]">Keranjang belanja masih kosong.</p>';
                checkoutBtn.disabled = true;
            } else {
                checkoutBtn.disabled = false;
                cartItems.forEach((item, index) => {
                    const subtotal = item.price * item.qty;
                    total += subtotal;
                    totalQty += item.qty;

                    listEl.innerHTML += `
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div>
                                <p class="font-bold text-[#16241B]">${item.name}</p>
                                <p class="text-[11px] text-[#6C7E72]">Rp ${item.price.toLocaleString('id-ID')} × ${item.qty}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-[#16241B]">Rp ${subtotal.toLocaleString('id-ID')}</span>
                                <button onclick="removeFromCart(${index})" class="text-rose-500 hover:text-rose-700 ml-1 font-bold">✕</button>
                            </div>
                        </div>
                    `;
                });
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
                toggleCartDrawer();
                // Arahkan item pertama di keranjang ke checkout modal
                openCheckoutSingle(cartItems[0].productObj);
                document.getElementById('formQuantity').value = cartItems[0].qty;
                recalcOrderTotal();
            }
        }
    </script>
</body>
</html>