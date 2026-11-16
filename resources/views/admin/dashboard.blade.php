<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mey Bakery — Admin Studio Control</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans for crisp modern readability & Playfair Display for classic boutique titles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        @keyframes slideInRight {
            from { transform: translateX(110%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .toast-animate {
            animation: slideInRight 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #F5EFE4;
        }
        ::-webkit-scrollbar-thumb {
            background: #D8CCB8;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #B5A48F;
        }
    </style>
</head>
<body class="bg-[#FAF7F0] text-[#2C1A11] antialiased min-h-screen flex flex-col md:flex-row selection:bg-[#F3E5C8] selection:text-[#3D251A] relative">

    <!-- FLOATING TOAST NOTIFICATION CONTAINER -->
    <div id="toast-container" class="fixed top-3 right-3 sm:top-5 sm:right-5 z-50 flex flex-col gap-2 max-w-xs sm:max-w-md w-full px-2 sm:px-4 pointer-events-none">
        @if(session('success'))
            <div class="toast-item toast-animate pointer-events-auto bg-[#FFFDF9] border-l-4 border-[#DF9A28] shadow-[0_10px_25px_rgba(44,26,17,0.12),0_2px_0_#E0D9CE] rounded-2xl p-3.5 sm:p-4 flex items-start gap-3 border border-[#E2DDD5] transition-all duration-300">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-[#FFF8E7] text-[#9A6216] border border-[#F3DEB2] flex items-center justify-center font-bold text-xs sm:text-sm shrink-0">✓</div>
                <div class="flex-1 pr-1 sm:pr-2">
                    <h5 class="text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider">Aksi Berhasil Disimpan ke Database</h5>
                    <p class="text-[11px] sm:text-xs text-[#5A524A] mt-0.5 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button onclick="this.closest('.toast-item').remove()" class="text-[#8C7D70] hover:text-[#2C1A11] font-bold text-xs sm:text-sm cursor-pointer">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="toast-item toast-animate pointer-events-auto bg-[#FFFDF9] border-l-4 border-rose-500 shadow-[0_10px_25px_rgba(44,26,17,0.12)] rounded-2xl p-3.5 sm:p-4 flex items-start gap-3 border border-rose-200 transition-all duration-300">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-rose-50 text-rose-700 border border-rose-200 flex items-center justify-center font-bold text-xs sm:text-sm shrink-0">✕</div>
                <div class="flex-1 pr-1 sm:pr-2">
                    <h5 class="text-[11px] sm:text-xs font-bold text-rose-950 uppercase tracking-wider">Terjadi Kesalahan</h5>
                    <p class="text-[11px] sm:text-xs text-rose-800 mt-0.5 leading-relaxed">{{ session('error') }}</p>
                </div>
                <button onclick="this.closest('.toast-item').remove()" class="text-gray-400 hover:text-gray-700 font-bold text-xs sm:text-sm cursor-pointer">✕</button>
            </div>
        @endif

        @if($errors->any())
            <div class="toast-item toast-animate pointer-events-auto bg-[#FFFDF9] border-l-4 border-amber-500 shadow-[0_10px_25px_rgba(44,26,17,0.12)] rounded-2xl p-3.5 sm:p-4 flex items-start gap-3 border border-amber-200 transition-all duration-300">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-amber-50 text-amber-700 border border-amber-200 flex items-center justify-center font-bold text-xs sm:text-sm shrink-0">!</div>
                <div class="flex-1 pr-1 sm:pr-2">
                    <h5 class="text-[11px] sm:text-xs font-bold text-amber-950 uppercase tracking-wider">Validasi Data Gagal</h5>
                    <p class="text-[11px] sm:text-xs text-amber-800 mt-0.5 leading-relaxed">{{ $errors->first() }}</p>
                </div>
                <button onclick="this.closest('.toast-item').remove()" class="text-gray-400 hover:text-gray-700 font-bold text-xs sm:text-sm cursor-pointer">✕</button>
            </div>
        @endif
    </div>

    <!-- STICKY MOBILE TOPBAR & HORIZONTAL QUICK TAB BAR (MINIMALIS & FLEKSIBEL UNTUK HP) -->
    <header class="md:hidden sticky top-0 z-30 bg-[#1D120B] text-[#F5EFE4] border-b border-[#312015] shadow-lg shrink-0">
        <div class="px-3.5 py-2.5 flex items-center justify-between gap-2">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF9A28] text-white flex items-center justify-center font-serif font-black text-sm shadow-[0_2px_0_#120A06] border border-white/20 shrink-0">
                    M
                </div>
                <div class="truncate">
                    <h2 class="text-xs font-bold text-white font-serif tracking-tight truncate leading-tight">Mey Bakery Admin</h2>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#DF9A28] animate-pulse"></span>
                        <span id="mobileActiveTabLabel" class="text-[10px] text-[#D5C4B5] font-semibold truncate uppercase tracking-wider">Ringkasan Bisnis</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-1.5 shrink-0">
                <a href="{{ route('landing') }}" target="_blank" title="Buka Toko"
                    class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-gradient-to-r from-[#DF9A28] to-[#A85816] text-white text-[11px] font-bold border-t border-white/30 shadow-[0_2px_0_#5C2E0D]">
                    <span>Toko</span>
                    <span>↗</span>
                </a>
                <button type="button" onclick="toggleMobileDrawer(true)" 
                    class="w-8 h-8 rounded-lg bg-[#2C1A11] border border-[#4A3225] text-white flex items-center justify-center text-sm shadow-[0_2px_0_#120A06] active:translate-y-0.5 transition cursor-pointer" title="Buka Menu Lengkap">
                    ☰
                </button>
            </div>
        </div>

        <!-- Quick Tab Bar Mobile: Scroll Horizontal Bebas Halangan -->
        <div class="flex items-center gap-1.5 px-3 py-2 bg-[#170E08] border-t border-[#2C1A11] overflow-x-auto no-scrollbar text-xs">
            <button onclick="switchTab('overview')" id="mobile-tab-overview"
                class="mobile-tab-btn shrink-0 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[11px] font-bold bg-[#2C1A11] text-white border border-[#4A3225] transition cursor-pointer">
                <span>📊 Ringkasan</span>
            </button>
            <button onclick="switchTab('products')" id="mobile-tab-products"
                class="mobile-tab-btn shrink-0 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[11px] font-medium text-[#B5A89E] hover:text-white transition cursor-pointer">
                <span>🎂 Menu ({{ $totalProducts }})</span>
            </button>
            <button onclick="switchTab('orders')" id="mobile-tab-orders"
                class="mobile-tab-btn shrink-0 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[11px] font-medium text-[#B5A89E] hover:text-white transition cursor-pointer">
                <span>📦 Pesanan ({{ $orders->count() }})</span>
                @if($pendingOrders > 0)
                    <span class="w-2 h-2 rounded-full bg-[#DF9A28]"></span>
                @endif
            </button>
            <button onclick="switchTab('banks')" id="mobile-tab-banks"
                class="mobile-tab-btn shrink-0 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[11px] font-medium text-[#B5A89E] hover:text-white transition cursor-pointer">
                <span>💳 Rekening ({{ $bankAccounts->count() }})</span>
            </button>
        </div>
    </header>

    <!-- MOBILE SLIDE-OVER DRAWER -->
    <div id="mobileDrawer" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs hidden transition-all duration-300 md:hidden" onclick="if(event.target === this) toggleMobileDrawer(false)">
        <div class="w-72 max-w-[85vw] h-full bg-[#1D120B] text-[#F5EFE4] flex flex-col justify-between p-4 shadow-2xl border-r border-[#312015] transform -translate-x-full transition-transform duration-300" id="mobileDrawerPanel">
            <div>
                <div class="flex items-center justify-between pb-3.5 border-b border-[#2C1A11]">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF9A28] text-white flex items-center justify-center font-serif font-black text-sm shadow-[0_2px_0_#120A06] border border-white/20">
                            M
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-white font-serif">Mey Bakery</h3>
                            <span class="text-[9px] uppercase tracking-wider text-[#8C7D70] font-bold">Admin Panel</span>
                        </div>
                    </div>
                    <button type="button" onclick="toggleMobileDrawer(false)" class="w-7 h-7 rounded-lg bg-[#2C1A11] text-[#8C7D70] hover:text-white flex items-center justify-center font-bold text-xs border border-[#3D251A] cursor-pointer">
                        ✕
                    </button>
                </div>

                <div class="py-4 space-y-1.5">
                    <p class="px-2 text-[10px] uppercase font-black tracking-widest text-[#8C7D70] mb-2">Navigasi Studio</p>

                    <button onclick="switchTab('overview'); toggleMobileDrawer(false);"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold text-white bg-[#2C1A11] border border-[#4A3225] transition cursor-pointer">
                        <span>📊</span>
                        <span>Ringkasan Bisnis</span>
                    </button>

                    <button onclick="switchTab('products'); toggleMobileDrawer(false);"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span>🎂</span>
                            <span>Katalog & Harga</span>
                        </div>
                        <span class="bg-[#2C1A11] text-[#DF9A28] font-black text-[10px] px-2 py-0.5 rounded-full border border-[#4A3225]">{{ $totalProducts }}</span>
                    </button>

                    <button onclick="switchTab('orders'); toggleMobileDrawer(false);"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span>📦</span>
                            <span>Pesanan Masuk</span>
                        </div>
                        <span class="bg-gradient-to-r from-[#DF9A28] to-[#A85816] text-white font-bold text-[10px] px-2 py-0.5 rounded-full">{{ $orders->count() }}</span>
                    </button>

                    <button onclick="switchTab('banks'); toggleMobileDrawer(false);"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span>💳</span>
                            <span>Rekening & QRIS</span>
                        </div>
                        <span class="bg-[#2C1A11] text-[#DF9A28] font-black text-[10px] px-2 py-0.5 rounded-full border border-[#4A3225]">{{ $bankAccounts->count() }}</span>
                    </button>
                </div>
            </div>

            <div class="pt-3 border-t border-[#2C1A11] space-y-2.5">
                <a href="{{ route('landing') }}" target="_blank"
                    class="w-full flex items-center justify-center gap-2 text-xs text-white font-black py-2.5 px-3 rounded-xl bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] border-t border-white/30 shadow-[0_3px_0_#5C2E0D]">
                    <span>Buka Web Toko</span>
                    <span>↗</span>
                </a>
                <div class="flex items-center justify-between pt-1">
                    <div class="overflow-hidden">
                        <p class="text-xs font-bold text-white truncate">{{ session('admin_name', 'Mey Bakery Admin') }}</p>
                        <p class="text-[10px] text-[#8C7D70] truncate">{{ session('admin_email', 'admin@toko.com') }}</p>
                    </div>
                    <form action="{{ route('logout', [], false) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs bg-[#2C1A11] hover:bg-rose-950 text-rose-300 px-2.5 py-1.5 rounded-lg font-bold border border-[#3D251A] cursor-pointer">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SIDEBAR KIRI DESKTOP (COKLAT PEKAT KLASIK, AKSEN OREN GOLD & ABU) -->
    <aside class="hidden md:flex md:w-64 bg-[#1D120B] text-[#F5EFE4] flex-col justify-between shrink-0 min-h-screen sticky top-0 h-screen border-r border-[#312015] shadow-2xl z-20">
        <div>
            <!-- Header Brand Mey Bakery -->
            <div class="h-20 px-6 flex items-center gap-3.5 border-b border-[#2C1A11]">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-[#3D251A] via-[#A85816] to-[#DF9A28] text-white flex items-center justify-center font-serif font-black text-lg shadow-[0_2px_0_#120A06] border border-white/20">
                    M
                </div>
                <div>
                    <h2 class="text-sm font-bold tracking-tight text-white font-serif">Mey Bakery.</h2>
                    <span class="text-[10px] tracking-[0.2em] uppercase text-[#A8988B] font-semibold block">Admin Studio</span>
                </div>
            </div>

            <!-- Navigasi Menu Sisi Kiri (3D Tactile Pills) -->
            <div class="p-4 space-y-1.5">
                <p class="px-3 text-[10px] uppercase font-extrabold tracking-[0.2em] text-[#8C7D70] mb-3">Workspace</p>
                
                <button onclick="switchTab('overview')" id="nav-overview"
                    class="nav-item w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-bold text-white bg-[#2C1A11] border border-[#4A3225] shadow-[0_2px_0_#120A06] transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#DF9A28]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Ringkasan Bisnis</span>
                </button>

                <button onclick="switchTab('products')" id="nav-products"
                    class="nav-item w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#8C7D70]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>Katalog & Harga</span>
                    </div>
                    <span class="bg-[#2C1A11] text-[#DF9A28] font-black text-[10px] px-2 py-0.5 rounded-full border border-[#4A3225]">{{ $totalProducts }}</span>
                </button>

                <button onclick="switchTab('orders')" id="nav-orders"
                    class="nav-item w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#8C7D70]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <span>Pesanan Masuk</span>
                    </div>
                    @if($pendingOrders > 0)
                        <span class="bg-gradient-to-r from-[#DF9A28] to-[#A85816] text-white font-extrabold text-[10px] px-2.5 py-0.5 rounded-full shadow-2xs">{{ $pendingOrders }}</span>
                    @else
                        <span class="bg-[#2C1A11] text-[#A8988B] text-[10px] px-2 py-0.5 rounded-full">{{ $orders->count() }}</span>
                    @endif
                </button>

                <button onclick="switchTab('banks')" id="nav-banks"
                    class="nav-item w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-medium text-[#B5A89E] hover:text-white hover:bg-[#2C1A11]/60 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-[#8C7D70]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span>Rekening & QRIS</span>
                    </div>
                    <span class="bg-[#2C1A11] text-[#DF9A28] font-black text-[10px] px-2 py-0.5 rounded-full border border-[#4A3225]">{{ $bankAccounts->count() }}</span>
                </button>
            </div>
        </div>

        <!-- Bagian Bawah: Tombol Buka Web Toko (3D Oren Gold) & Profil Pengelola -->
        <div class="p-4 border-t border-[#2C1A11] bg-[#170E08] space-y-3">
            <a href="{{ route('landing') }}" target="_blank" 
                class="w-full flex items-center justify-center gap-2 text-xs text-white font-black py-2.5 px-3 rounded-xl bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] border-t border-white/30 shadow-[0_3px_0_#5C2E0D,0_6px_12px_rgba(201,130,36,0.25)] hover:-translate-y-0.5 active:translate-y-0.5 active:shadow-[0_1px_0_#5C2E0D] transition-all cursor-pointer">
                <span>Buka Web Toko</span>
                <span class="text-[11px]">↗</span>
            </a>

            <div class="flex items-center justify-between pt-1">
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-white truncate">{{ session('admin_name', 'Mey Bakery Admin') }}</p>
                    <p class="text-[10px] text-[#8C7D70] truncate font-mono">{{ session('admin_email', 'admin@toko.com') }}</p>
                </div>
                <form action="{{ route('logout', [], false) }}" method="POST">
                    @csrf
                    <button type="submit" title="Kembali ke Toko" class="text-xs bg-[#2C1A11] hover:bg-rose-950 text-rose-300 px-2.5 py-1.5 rounded-lg font-bold transition border border-[#3D251A] shadow-[0_2px_0_#120A06] active:translate-y-0.5 active:shadow-none cursor-pointer">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- AREA KONTEN UTAMA (MODERN, SIMPEL, EKONOMIS, INFORMATIF & 3D FLEKSIBEL MOBILE/DESKTOP) -->
    <main class="flex-1 w-full min-w-0 p-3.5 sm:p-5 md:p-8 max-w-6xl mx-auto space-y-4 sm:space-y-6 overflow-y-auto">

        <!-- Top Header Status (Vanila Cream & Abu Border dengan Multi-Harmonic Accent) -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 sm:pb-4 border-b border-[#E2DDD5]">
            <div>
                <h1 class="text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#2C1A11] tracking-tight">Pusat Kendali Mey Bakery</h1>
                <p class="text-xs text-[#7A7570] mt-0.5">Kelola penyesuaian harga menu, ketersediaan stok kue, dan transaksi pesanan pelanggan</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-2 text-[11px] font-bold text-[#2C1A11] bg-[#F1EDE6] px-3.5 py-1.5 rounded-full border border-[#DDD5C8] shadow-2xs">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#DF9A28] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#C98224]"></span>
                    </span>
                    Database MySQL Terhubung
                </span>
            </div>
        </div>

        <!-- TAB 1: RINGKASAN BISNIS -->
        <div id="section-overview" class="tab-pane space-y-4 sm:space-y-5">
            <!-- 3D Stat Cards (High Definition & Bold 2px Borders Responsive) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 lg:gap-5">
                <div class="bg-white p-4 sm:p-5 lg:p-6 rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_4px_0_#D4C4B3,0_8px_16px_rgba(29,18,11,0.05)] hover:border-[#DF9A28] hover:shadow-[0_6px_0_#A85816,0_12px_24px_rgba(201,130,36,0.18)] hover:-translate-y-0.5 transition-all">
                    <span class="text-[11px] sm:text-xs font-black uppercase tracking-wider text-[#6B5E52] block">Total Omzet Lunas</span>
                    <p class="text-2xl sm:text-3xl font-serif font-black text-[#A85816] mt-1.5 sm:mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <p class="text-[11px] sm:text-xs text-[#5A524A] font-semibold mt-1 sm:mt-1.5">100% diterima utuh tanpa potongan komisi</p>
                </div>

                <div class="bg-white p-4 sm:p-5 lg:p-6 rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_4px_0_#D4C4B3,0_8px_16px_rgba(29,18,11,0.05)] hover:border-[#DF9A28] hover:shadow-[0_6px_0_#A85816,0_12px_24px_rgba(201,130,36,0.18)] hover:-translate-y-0.5 transition-all cursor-pointer" onclick="switchTab('orders')">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] sm:text-xs font-black uppercase tracking-wider text-[#6B5E52] block">Antrean Pesanan Masuk</span>
                        <span class="text-[11px] sm:text-xs font-black text-[#A85816] hover:underline">Lihat Semua →</span>
                    </div>
                    <p class="text-2xl sm:text-3xl font-serif font-black text-[#C98224] mt-1.5 sm:mt-2">{{ $pendingOrders }} Pesanan</p>
                    <p class="text-[11px] sm:text-xs text-[#6B5E52] font-semibold mt-1 sm:mt-1.5">Perlu dijadwalkan baking / pengiriman</p>
                </div>

                <div class="bg-white p-4 sm:p-5 lg:p-6 rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_4px_0_#D4C4B3,0_8px_16px_rgba(29,18,11,0.05)] hover:border-[#DF9A28] hover:shadow-[0_6px_0_#A85816,0_12px_24px_rgba(201,130,36,0.18)] hover:-translate-y-0.5 transition-all cursor-pointer" onclick="switchTab('products')">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] sm:text-xs font-black uppercase tracking-wider text-[#6B5E52] block">Total Menu Terdaftar</span>
                        <span class="text-[11px] sm:text-xs font-black text-[#1D120B] hover:underline">Kelola Menu →</span>
                    </div>
                    <p class="text-2xl sm:text-3xl font-serif font-black text-[#1D120B] mt-1.5 sm:mt-2">{{ $totalProducts }} Produk</p>
                    <p class="text-[11px] sm:text-xs text-[#6B5E52] font-semibold mt-1 sm:mt-1.5">Kue tart, artisan pastry & minuman botol</p>
                </div>
            </div>

            <!-- Tinjauan Cepat Menu Terbaru & Pesanan Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5 pt-1 sm:pt-2">
                <!-- Box Menu Aktif -->
                <div class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_4px_0_#D4C4B3] space-y-3 sm:space-y-4">
                    <div class="flex items-center justify-between border-b-2 border-[#F1EDE6] pb-3 sm:pb-3.5">
                        <div>
                            <h3 class="text-xs font-black uppercase tracking-wider text-[#1D120B]">Menu Toko Terbaru</h3>
                            <p class="text-[11px] sm:text-xs text-[#6B5E52] mt-0.5 font-medium">Ringkasan produk aktif di etalase</p>
                        </div>
                        <button onclick="switchTab('products')" class="text-xs font-black text-[#1D120B] bg-white hover:bg-[#FAF7F0] border-2 border-[#D8C7B5] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none px-3 py-1.5 rounded-xl transition cursor-pointer">
                            + Tambah Menu
                        </button>
                    </div>
                    <div class="divide-y divide-[#F1EDE6]">
                        @forelse($products->take(4) as $prod)
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div class="flex items-center gap-3">
                                <img src="{{ $prod->image_url ?? 'https://placehold.co/60x60/F5EFE4/2C1A11?text=Cake' }}" class="w-10 h-10 rounded-xl object-cover border-2 border-[#DDD5C8]" alt="">
                                <div>
                                    <p class="font-bold text-sm text-[#1D120B]">{{ $prod->name }}</p>
                                    <span class="text-[10px] font-bold text-[#6B5E52]">{{ $prod->category }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-black text-xs sm:text-sm text-[#A85816] block">Rp {{ number_format($prod->price_idr, 0, ',', '.') }}</span>
                                <span class="text-[10px] font-black {{ $prod->stock < 5 ? 'text-amber-700 font-black' : 'text-[#5A524A]' }}">Stok: {{ $prod->stock }} unit</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-center py-6 text-[#8C7D70] font-semibold">Belum ada menu tersimpan di database.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Box Pesanan Terbaru -->
                <div class="bg-white p-6 rounded-3xl border-2 border-[#D8C7B5] shadow-[0_6px_0_#D4C4B3] space-y-4">
                    <div class="flex items-center justify-between border-b-2 border-[#F1EDE6] pb-3.5">
                        <div>
                            <h3 class="text-xs font-black uppercase tracking-wider text-[#1D120B]">Transaksi Pesanan Terkini</h3>
                            <p class="text-xs text-[#6B5E52] mt-0.5 font-medium">Pelanggan masuk via marketplace</p>
                        </div>
                        <button onclick="switchTab('orders')" class="text-xs font-black text-[#1D120B] bg-white hover:bg-[#FAF7F0] border-2 border-[#D8C7B5] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none px-3.5 py-1.5 rounded-xl transition cursor-pointer">
                            Semua Pesanan →
                        </button>
                    </div>
                    <div class="divide-y divide-[#F1EDE6]">
                        @forelse($orders->take(4) as $ord)
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div>
                                <p class="font-bold text-sm text-[#1D120B]">#{{ $ord->order_code }} — {{ $ord->customer_name }}</p>
                                <p class="text-[10px] text-[#6B5E52] font-semibold">{{ $ord->product->name ?? 'Menu' }} ({{ $ord->quantity }} unit)</p>
                            </div>
                            <div class="text-right">
                                <span class="font-black text-xs sm:text-sm text-[#A85816] block">Rp {{ number_format($ord->total_price, 0, ',', '.') }}</span>
                                <span class="text-[9px] font-black uppercase px-2 py-0.5 rounded-full {{ $ord->status == 'completed' ? 'bg-[#EBF7EE] text-[#166534] border border-[#86EFAC]' : ($ord->status == 'confirmed' ? 'bg-[#EFF6FF] text-[#1E40AF] border border-[#93C5FD]' : 'bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D]') }}">
                                    {{ $ord->status }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-center py-6 text-[#8C7D70] font-semibold">Belum ada pesanan masuk.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 2: KATALOG & HARGA (FORM PENAMBAHAN MENU HIGH DEFINITION & PROMINENT 3D) -->
        <div id="section-products" class="tab-pane space-y-5 hidden">
            
            <!-- FORM TAMBAH MENU BARU (CRISP MODERN CLASSIC 3D HD) -->
            <div class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] shadow-[0_4px_24px_rgba(44,26,17,0.06)] p-4 sm:p-6 md:p-7 space-y-4 sm:space-y-5">
                
                <!-- Header Form dengan Icon Circle Brown + & Tombol Toggle Buka/Tutup -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 sm:pb-4 border-b border-[#ECE5DD]">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#2C1A11] text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                            +
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-[#2C1A11]">Tambah Menu Baru</h3>
                                <span class="text-[10px] sm:text-[11px] bg-[#F7F2EB] text-[#7A624E] font-bold px-2.5 py-0.5 rounded-full border border-[#E2DDD5]">Katalog & Harga</span>
                            </div>
                            <p class="text-[11px] sm:text-xs text-[#7A6E65] mt-0.5 font-normal">Input varian kue tart, artisan pastry, atau minuman botol langsung ke database etalase</p>
                        </div>
                    </div>

                    <button type="button" onclick="document.getElementById('productFormBody').classList.toggle('hidden')" 
                        class="text-[11px] sm:text-xs font-semibold text-[#2C1A11] bg-[#F7F4EE] hover:bg-[#EFE9DF] px-3.5 sm:px-4 py-2 rounded-xl border border-[#D5CBC0] shadow-sm transition-all cursor-pointer flex items-center gap-1.5 self-end sm:self-auto">
                        <span>Buka / Tutup Form</span>
                        <span>▾</span>
                    </button>
                </div>

                <!-- Konten Formulir Penambahan Menu (Struktur HD Bersih Sesuai Desain Modern Klasik) -->
                <div id="productFormBody" class="{{ $errors->has('name') || $errors->has('price_idr') || $errors->has('stock') || $errors->has('category') ? '' : '' }}">
                    <form action="{{ route('admin.products.store', ['tab' => 'products'], false) }}" method="POST" class="space-y-3.5 sm:space-y-4">
                        @csrf
                        
                        <datalist id="categoryList">
                            <option value="Tart & Cake">
                            <option value="Pastry">
                            <option value="Beverage">
                            <option value="Kue Basah">
                            <option value="Roti & Donat">
                        </datalist>

                        <!-- BARIS 1: IDENTITAS PRODUK (NAMA, KATEGORI, HARGA, STOK) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3.5 sm:gap-4 items-end">
                            <!-- Nama Menu -->
                            <div class="sm:col-span-1 lg:col-span-4">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    NAMA MENU <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Earl Grey Chiffon Cake"
                                    class="w-full bg-[#FAF7F2] border {{ $errors->has('name') ? 'border-rose-500 ring-2 ring-rose-200' : 'border-[#D5CBC0]' }} rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                                @error('name')
                                    <span class="text-[10px] text-rose-600 font-bold block mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="sm:col-span-1 lg:col-span-3">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    KATEGORI <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="text" name="category" list="categoryList" value="{{ old('category', 'Tart & Cake') }}" required placeholder="Pilih / ketik kategori"
                                    class="w-full bg-[#FAF7F2] border {{ $errors->has('category') ? 'border-rose-500 ring-2 ring-rose-200' : 'border-[#D5CBC0]' }} rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                                @error('category')
                                    <span class="text-[10px] text-rose-600 font-bold block mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Harga Jual -->
                            <div class="sm:col-span-1 lg:col-span-3">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    HARGA (RP) <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="text" name="price_idr" value="{{ old('price_idr') }}" required placeholder="Contoh: 150000 / 150.000"
                                    class="w-full bg-[#FAF7F2] border {{ $errors->has('price_idr') ? 'border-rose-500 ring-2 ring-rose-200' : 'border-[#D5CBC0]' }} rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                                @error('price_idr')
                                    <span class="text-[10px] text-rose-600 font-bold block mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Stok Awal -->
                            <div class="sm:col-span-1 lg:col-span-2">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    STOK AWAL <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="number" name="stock" value="{{ old('stock', 10) }}" min="0" required placeholder="10"
                                    class="w-full bg-[#FAF7F2] border {{ $errors->has('stock') ? 'border-rose-500 ring-2 ring-rose-200' : 'border-[#D5CBC0]' }} rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                                @error('stock')
                                    <span class="text-[10px] text-rose-600 font-bold block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- BARIS 2: DESKRIPSI RASA, URL FOTO & TOMBOL SIMPAN -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3.5 sm:gap-4 items-end">
                            <div class="sm:col-span-1 lg:col-span-5">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    DESKRIPSI RASA (OPSIONAL)
                                </label>
                                <input type="text" name="description" value="{{ old('description') }}" placeholder="Bahan baku pilihan, diameter loyang, tekstur..."
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                            </div>

                            <div class="sm:col-span-1 lg:col-span-4">
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    URL FOTO PRODUK (LINK GAMBAR)
                                </label>
                                <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/... atau kosongkan"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 outline-none transition shadow-sm">
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <button type="submit" 
                                    class="w-full h-[42px] sm:h-[45px] flex items-center justify-center text-center px-4 py-2 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm text-white tracking-wide shadow-[0_4px_0_#7A3E05,0_8px_16px_rgba(178,93,7,0.32)] hover:brightness-105 active:translate-y-1 active:shadow-[0_1px_0_#7A3E05] transition-all cursor-pointer select-none"
                                    style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%); border-top: 1.5px solid rgba(254, 215, 170, 0.55);">
                                    <span>+ Simpan Menu Baru</span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- TABEL DAFTAR PRODUK DENGAN EDIT LANGSUNG (HIGH DEFINITION & 2PX BORDER) -->
            <div class="bg-white rounded-3xl border-2 border-[#D8C7B5] shadow-[0_6px_0_#D4C4B3] overflow-hidden">
                <div class="p-5 px-6 border-b-2 border-[#E2DDD5] flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#FAF7F0]">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-[#1D120B]">Daftar Menu & Edit Harga (Total: {{ $products->count() }})</h3>
                        <p class="text-xs text-[#6B5E52] mt-0.5 font-medium">Klik "Edit" untuk mengubah harga jual atau unit stok secara instan</p>
                    </div>
                    <form action="{{ route('admin.dashboard', [], false) }}" method="GET">
                        <input type="hidden" name="tab" value="products">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kue..."
                                class="bg-white border-2 border-[#C8B8A6] rounded-xl pl-8 pr-3 py-1.5 text-xs font-bold text-[#1D120B] placeholder-[#8C7D70] focus:outline-none focus:border-[#DF9A28] focus:ring-4 focus:ring-[#DF9A28]/20 shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]">
                            <svg class="w-3.5 h-3.5 text-[#8C7D70] absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </form>
                </div>

                <div class="divide-y-2 divide-[#F1EDE6]">
                    @forelse($products as $product)
                    <div class="p-3.5 sm:p-4 px-4 sm:px-6 hover:bg-[#FAF7F0]/80 transition">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="{{ $product->image_url ?? 'https://placehold.co/80x80/F5EFE4/2C1A11?text=Cake' }}" 
                                    class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl object-cover border-2 border-[#DDD5C8] shrink-0" alt="{{ $product->name }}">
                                <div class="min-w-0">
                                    <h4 class="font-bold text-xs sm:text-sm text-[#1D120B] truncate">{{ $product->name }}</h4>
                                    <span class="inline-block bg-[#FFF8E7] text-[#9A6216] font-black text-[9px] sm:text-[10px] px-2 py-0.5 rounded-md mt-0.5 border border-[#FCD34D]">
                                        {{ $product->category }}
                                    </span>
                                    <p class="text-[11px] text-[#6B5E52] truncate max-w-xs mt-0.5 font-medium">{{ $product->description }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end gap-3 sm:gap-6 pt-2 sm:pt-0 border-t sm:border-t-0 border-[#F1EDE6]">
                                <div>
                                    <span class="text-[9px] sm:text-[10px] uppercase font-black text-[#6B5E52] block">Harga Toko</span>
                                    <span class="text-xs sm:text-sm font-black text-[#A85816]">Rp {{ number_format($product->price_idr, 0, ',', '.') }}</span>
                                </div>

                                <div>
                                    <span class="text-[9px] sm:text-[10px] uppercase font-black text-[#6B5E52] block">Status Stok</span>
                                    @if($product->stock <= 0)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-black bg-[#F1EDE6] text-[#475569] border border-[#DDD5C8]">
                                            Habis (0 unit)
                                        </span>
                                    @elseif($product->stock < 5)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-black bg-[#FFF8E7] text-[#9A6216] border border-[#FCD34D]">
                                            {{ $product->stock }} unit (Menipis)
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-black bg-[#EBF7EE] text-[#166534] border border-[#86EFAC]">
                                            {{ $product->stock }} unit (Ready)
                                        </span>
                                    @endif
                                </div>

                                <div class="flex items-center gap-1.5 shrink-0">
                                    <button onclick="toggleRowEdit({{ $product->id }})" 
                                        class="bg-white hover:bg-[#FAF7F0] text-[#1D120B] text-xs font-black px-3 py-1.5 rounded-xl border-2 border-[#D8C7B5] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition cursor-pointer">
                                        Edit ▾
                                    </button>
                                    <form action="{{ route('admin.products.destroy', ['id' => $product->id, 'tab' => 'products'], false) }}" method="POST" 
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu \'{{ addslashes($product->name) }}\' dari database?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-rose-700 hover:text-rose-950 text-xs font-bold px-1.5 py-1.5 cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Baris Formulir Edit Cepat (3D Style HD) -->
                        <div id="edit-row-{{ $product->id }}" class="hidden mt-3 sm:mt-4 pt-3 sm:pt-4 border-t-2 border-dashed border-[#DDD5C8] bg-[#FAF7F0] -mx-4 sm:-mx-6 -mb-3.5 sm:-mb-4 p-3 sm:p-4 px-4 sm:px-6 rounded-b-2xl">
                            <form action="{{ route('admin.products.update', ['id' => $product->id, 'tab' => 'products'], false) }}" method="POST" class="space-y-3">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-end">
                                    <div class="sm:col-span-4">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">Nama Produk</label>
                                        <input type="text" name="name" value="{{ $product->name }}" required
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-bold text-[#1D120B] outline-none focus:border-[#DF9A28]">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">Kategori</label>
                                        <input type="text" name="category" list="categoryList" value="{{ $product->category }}" required
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-bold text-[#1D120B] outline-none focus:border-[#DF9A28]">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">Harga (Rp)</label>
                                        <input type="text" name="price_idr" value="{{ (int)$product->price_idr }}" required
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-black text-[#A85816] outline-none focus:border-[#DF9A28]">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">Stok Unit</label>
                                        <input type="number" name="stock" value="{{ $product->stock }}" required min="0"
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-black text-[#1D120B] outline-none focus:border-[#DF9A28]">
                                    </div>
                                    <div class="sm:col-span-2 flex gap-1.5">
                                        <button type="submit" class="w-full bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] text-white text-xs font-black py-2 rounded-xl border-t border-white/40 shadow-[0_3px_0_#5C2E0D] active:translate-y-0.5 active:shadow-none transition cursor-pointer">
                                            Simpan
                                        </button>
                                        <button type="button" onclick="toggleRowEdit({{ $product->id }})" class="bg-white border-2 border-[#DDD5C8] text-xs px-2.5 py-2 rounded-xl cursor-pointer font-bold">
                                            ✕
                                        </button>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">Deskripsi Menu</label>
                                        <input type="text" name="description" value="{{ $product->description }}"
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-bold text-[#1D120B] outline-none focus:border-[#DF9A28]">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label class="block text-[10px] font-black text-[#1D120B] uppercase mb-1">URL Foto Produk</label>
                                        <input type="text" name="image_url" value="{{ $product->image_url }}"
                                            class="w-full bg-white border-2 border-[#C8B8A6] rounded-xl px-3 py-2 text-xs font-bold text-[#1D120B] outline-none focus:border-[#DF9A28]">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-xs text-[#7A7570]">
                        Belum ada menu yang didaftarkan. Silakan gunakan formulir di atas untuk menambah menu pertama Anda.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- TAB 3: DAFTAR PESANAN MASUK (FORMULIR TERSTRUKTUR RAPI & FITUR EKSTRAK OTOMATIS HIGH DEFINITION) -->
        <div id="section-orders" class="tab-pane space-y-5 hidden">
            
            <!-- FORM CATAT PESANAN BARU MANUAL OLEH ADMIN (CRISP MODERN CLASSIC 3D HD SESUAI DESAIN GAMBAR) -->
            <div class="bg-white rounded-2xl sm:rounded-3xl border border-[#E8DFD5] shadow-[0_4px_24px_rgba(44,26,17,0.06)] p-4 sm:p-6 md:p-7 space-y-4 sm:space-y-5">
                
                <!-- Header Form dengan Icon Circle Brown + & Tombol Buka/Tutup -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 sm:pb-4 border-b border-[#ECE5DD]">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#2C1A11] text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                            +
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-[#2C1A11]">Catat Pesanan Baru (Manual Order)</h3>
                                <span class="text-[10px] sm:text-[11px] bg-[#F7F2EB] text-[#7A624E] font-bold px-2.5 py-0.5 rounded-full border border-[#E2DDD5]">Admin Order Entry</span>
                            </div>
                            <p class="text-[11px] sm:text-xs text-[#7A6E65] mt-0.5 font-normal">Catat transaksi pesanan offline, WhatsApp langsung, atau via telepon</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 flex-wrap self-end sm:self-auto">
                        <!-- Tombol Buka Panel Ekstrak Cepat Chat WhatsApp -->
                        <button type="button" onclick="document.getElementById('quickExtractBox').classList.toggle('hidden')" 
                            class="text-[11px] sm:text-xs font-semibold text-emerald-800 bg-emerald-50 hover:bg-emerald-100 px-3.5 py-2 rounded-xl border border-emerald-200 shadow-sm transition-all cursor-pointer flex items-center gap-1.5" title="Ekstrak Pesanan dari Teks Chat">
                            <span>⚡</span>
                            <span>Ekstrak WhatsApp</span>
                        </button>

                        <button type="button" onclick="document.getElementById('manualOrderFormContainer').classList.toggle('hidden')" 
                            class="text-[11px] sm:text-xs font-semibold text-[#2C1A11] bg-[#F7F4EE] hover:bg-[#EFE9DF] px-3.5 sm:px-4 py-2 rounded-xl border border-[#D5CBC0] shadow-sm transition-all cursor-pointer flex items-center gap-1.5">
                            <span>Buka / Tutup Form</span>
                            <span>▾</span>
                        </button>
                    </div>
                </div>

                <!-- PANEL EKSTRAK LANGSUNG (SMART WHATSAPP ORDER EXTRACTOR) -->
                <div id="quickExtractBox" class="hidden p-4 sm:p-5 rounded-2xl bg-[#FFF8E7] border border-[#FCD34D] shadow-sm space-y-3 transition-all">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-black text-[#92400E]">
                            <span>⚡ Ekstraksi Instan Format Pesanan WhatsApp</span>
                        </div>
                        <span id="extractSuccessBadge" class="hidden text-[10px] font-black text-emerald-800 bg-emerald-100 px-3 py-1 rounded-full border border-emerald-300">
                            ✓ Berhasil Ekstrak ke Form di Bawah!
                        </span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-[#78350F] leading-relaxed font-semibold">
                        Salin dan tempel format pesan dari pembeli di bawah ini, lalu klik tombol <strong>"Ekstrak Otomatis"</strong>.
                    </p>
                    <textarea id="quickExtractInput" rows="3" placeholder="Contoh:&#10;Nama: Sarah Angelina&#10;WA: 081298765432&#10;Menu: Chiffon Cake&#10;Jumlah: 2 unit&#10;Alamat: Jl. Melati No. 15 Batam"
                        class="w-full bg-white border border-[#FCD34D] rounded-xl p-3 text-xs font-mono font-bold text-[#1D120B] placeholder-[#8C7D70] outline-none focus:border-[#DF9A28] focus:ring-2 focus:ring-[#DF9A28]/25 shadow-sm"></textarea>
                    <div class="flex items-center gap-2 flex-wrap">
                        <button type="button" onclick="extractOrderFromText()"
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-xs font-bold text-white shadow-[0_3px_0_#7A3E05] active:translate-y-0.5 active:shadow-none cursor-pointer"
                            style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%);">
                            <span>⚡ Ekstrak Otomatis ke Form</span>
                        </button>
                        <button type="button" onclick="document.getElementById('quickExtractInput').value = ''"
                            class="px-3.5 py-2 rounded-xl text-xs font-bold text-[#1D120B] bg-white hover:bg-[#FAF7F0] border border-[#DDD5C8] shadow-sm transition cursor-pointer">
                            Bersihkan Teks
                        </button>
                    </div>
                </div>

                <!-- KONTEN FORMULIR MANUAL ORDER (TERSTRUKTUR RAPI, BERSIH SESUAI GAMBAR 2) -->
                <div id="manualOrderFormContainer" class="{{ $errors->has('customer_name') || $errors->has('product_id') ? '' : '' }}">
                    <form action="{{ route('admin.orders.store', ['tab' => 'orders'], false) }}" method="POST" class="space-y-3.5 sm:space-y-4">
                        @csrf
                        
                        <!-- BARIS 1: PILIH MENU, NAMA, NO WA, JUMLAH QTY (4 KOLOM DESKTOP, FLUID MOBILE) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4 items-end">
                            <!-- 1. Pilih Menu Kue/Roti -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    PILIH MENU KUE/ROTI <span class="text-[#DF851A]">*</span>
                                </label>
                                <select name="product_id" id="manualOrderProductId" required onchange="updateManualOrderTotal()"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] outline-none transition shadow-sm">
                                    <option value="" data-price="0">-- Pilih Menu Terdaftar --</option>
                                    @foreach($products as $p)
                                        <option value="{{ $p->id }}" data-price="{{ (int)$p->price_idr }}" {{ old('product_id') == $p->id ? 'selected' : '' }}>
                                            {{ $p->name }} — Rp {{ number_format($p->price_idr, 0, ',', '.') }} (Sisa: {{ $p->stock }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- 2. Nama Lengkap Pemesan -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    NAMA PEMESAN <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="text" name="customer_name" id="manualOrderName" value="{{ old('customer_name') }}" required placeholder="Nama lengkap pelanggan"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] outline-none transition shadow-sm">
                            </div>

                            <!-- 3. Nomor WhatsApp -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    NO. WHATSAPP <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="text" name="customer_phone" id="manualOrderPhone" value="{{ old('customer_phone') }}" required placeholder="08xxxxxxxxxx"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] outline-none transition shadow-sm">
                            </div>

                            <!-- 4. Jumlah Qty -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    JUMLAH (QTY) <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="number" name="quantity" id="manualOrderQty" value="{{ old('quantity', 1) }}" min="1" required oninput="updateManualOrderTotal()" placeholder="1"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#2C1A11] outline-none transition shadow-sm">
                            </div>
                        </div>

                        <!-- BARIS 2: TANGGAL, METODE KIRIM, STATUS AWAL, TOMBOL SIMPAN KE DATABASE (SESUAI GAMBAR 2) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4 items-end">
                            <!-- 1. Target Tanggal Kirim -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    TARGET TANGGAL KIRIM <span class="text-[#DF851A]">*</span>
                                </label>
                                <input type="date" name="delivery_date" id="manualOrderDate" value="{{ old('delivery_date', date('Y-m-d')) }}" required
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] outline-none transition shadow-sm">
                            </div>

                            <!-- 2. Metode Pengiriman -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    METODE PENGIRIMAN
                                </label>
                                <select name="order_type" id="manualOrderType" 
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] outline-none transition shadow-sm">
                                    <option value="delivery" {{ old('order_type') == 'delivery' ? 'selected' : '' }}>Kurir Toko (Delivery)</option>
                                    <option value="pickup" {{ old('order_type') == 'pickup' ? 'selected' : '' }}>Ambil di Gerai (Pick-up)</option>
                                </select>
                            </div>

                            <!-- 3. Status Awal -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    STATUS AWAL
                                </label>
                                <select name="status" 
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] outline-none transition shadow-sm">
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                                    <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed (Dikonfirmasi)</option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed (Lunas)</option>
                                </select>
                            </div>

                            <!-- 4. Tombol Oren Gold 3D: + Simpan Pesanan ke Database (SESUAI PERSIS GAMBAR 2) -->
                            <div>
                                <button type="submit" 
                                    class="w-full h-[42px] sm:h-[45px] flex items-center justify-center text-center px-3 py-2 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm text-white tracking-wide shadow-[0_4px_0_#7A3E05,0_8px_16px_rgba(178,93,7,0.32)] hover:brightness-105 active:translate-y-1 active:shadow-[0_1px_0_#7A3E05] transition-all cursor-pointer select-none"
                                    style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%); border-top: 1.5px solid rgba(254, 215, 170, 0.55);">
                                    <span class="block leading-tight text-center">+ Simpan Pesanan ke<br class="hidden sm:inline lg:inline xl:hidden"> Database</span>
                                </button>
                            </div>
                        </div>

                        <!-- BARIS 3: ALAMAT ANTAR (50%) & CATATAN KHUSUS PESANAN (50%) - SESUAI GAMBAR 2 -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3.5 sm:gap-4 items-end">
                            <!-- Alamat Antar -->
                            <div>
                                <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider mb-1.5">
                                    ALAMAT ANTAR (KOSONGKAN JIKA PICK-UP)
                                </label>
                                <input type="text" name="address" id="manualOrderAddress" value="{{ old('address') }}" placeholder="Jalan, nomor rumah, patokan..."
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] outline-none transition shadow-sm">
                            </div>

                            <!-- Catatan Khusus Pesanan & Info Subtotal -->
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <label class="block text-[11px] sm:text-xs font-bold text-[#2C1A11] uppercase tracking-wider">
                                        CATATAN KHUSUS PESANAN
                                    </label>
                                    <span id="manualOrderEstimatedTotal" class="text-[11px] font-bold text-[#A85816]">Rp 0</span>
                                </div>
                                <input type="text" name="order_notes" id="manualOrderNotes" value="{{ old('order_notes') }}" placeholder="Misal: Tulisan ucapan / lilin / request hiasan"
                                    class="w-full bg-[#FAF7F2] border border-[#D5CBC0] focus:border-[#DF851A] focus:bg-white focus:ring-2 focus:ring-[#DF851A]/20 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-medium text-[#2C1A11] placeholder-[#9E9085] outline-none transition shadow-sm">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- TABEL DAFTAR PESANAN MASUK (CRISP WHITE CARD 3D HD RESPONSIVE) -->
            <div class="bg-white rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_6px_0_#D4C4B3] overflow-hidden">
                <div class="p-4 sm:p-5 px-4 sm:px-6 border-b-2 border-[#E2DDD5] bg-[#FAF7F0] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-[#1D120B]">Daftar Pesanan Masuk (Total: {{ $orders->count() }})</h3>
                        <p class="text-[11px] sm:text-xs text-[#6B5E52] mt-0.5 font-medium">Pantau rincian pesanan, metode kirim, dan sesuaikan status transaksi</p>
                    </div>

                    <!-- Tombol Ekstrak / Ekspor Rekap Pesanan -->
                    <div class="flex items-center gap-2 self-start sm:self-auto">
                        <button type="button" onclick="exportOrdersToCSV()" 
                            class="inline-flex items-center gap-2 text-xs font-black text-[#1D120B] bg-white hover:bg-[#FAF7F0] px-3.5 sm:px-4 py-2 rounded-xl border-2 border-[#D8C7B5] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all cursor-pointer" title="Ekstrak data pesanan ke format CSV/Excel">
                            <span>📥</span>
                            <span>Ekstrak Rekap CSV</span>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-xs">
                        <thead class="bg-[#FAF7F0] text-[#1D120B] uppercase font-black text-xs tracking-wider border-b-2 border-[#E2DDD5]">
                            <tr>
                                <th class="py-3.5 px-6">Invoice</th>
                                <th class="py-3.5 px-4">Pelanggan</th>
                                <th class="py-3.5 px-4">Menu & Qty</th>
                                <th class="py-3.5 px-4">Target Tgl</th>
                                <th class="py-3.5 px-4">Metode</th>
                                <th class="py-3.5 px-4">Total</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#F1EDE6] text-[#2C1A11]">
                            @forelse($orders as $order)
                            <tr class="hover:bg-[#FAF7F0]/60 transition">
                                <td class="py-3.5 px-6 font-mono font-bold text-[#A85816]">
                                    <a href="{{ route('order.invoice', $order->order_code) }}" target="_blank" class="hover:underline">
                                        {{ $order->order_code }} ↗
                                    </a>
                                </td>
                                <td class="py-3.5 px-4">
                                    <p class="font-bold text-[#2C1A11]">{{ $order->customer_name }}</p>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->customer_phone) }}" target="_blank" class="text-[11px] text-[#A85816] font-semibold hover:underline inline-flex items-center gap-1">
                                        WA: {{ $order->customer_phone }} ↗
                                    </a>
                                    @if($order->address)
                                        <p class="text-[10px] text-[#7A7570] max-w-xs truncate mt-0.5">📍 {{ $order->address }}</p>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold text-[#2C1A11]">{{ $order->product->name ?? 'Menu Dihapus' }}</span>
                                    <span class="text-[#7A7570]">({{ $order->quantity }}x)</span>
                                    @if($order->order_notes)
                                        <p class="text-[10px] text-[#A85816] italic mt-0.5">"{{ $order->order_notes }}"</p>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 font-semibold text-[#5A524A]">{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="capitalize text-[10px] font-bold px-2.5 py-0.5 rounded-full {{ $order->order_type == 'delivery' ? 'bg-[#F1EDE6] text-[#2C1A11] border border-[#DDD5C8]' : 'bg-[#FFF8E7] text-[#9A6216] border border-[#F3DEB2]' }}">
                                        {{ $order->order_type }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 font-black text-[#A85816]">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <form action="{{ route('admin.order.status', ['id' => $order->id, 'tab' => 'orders'], false) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="bg-[#FFFDF9] border border-[#DDD5C8] rounded-lg text-[11px] font-bold px-2 py-1 outline-none cursor-pointer {{ $order->status == 'completed' ? 'text-[#2C1A11]' : ($order->status == 'confirmed' ? 'text-[#334155]' : 'text-[#A85816]') }}">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3.5 px-6 text-right">
                                    <form action="{{ route('admin.order.destroy', ['id' => $order->id, 'tab' => 'orders'], false) }}" method="POST" 
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat pesanan #{{ $order->order_code }} dari database?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-rose-700 hover:text-rose-950 text-xs font-semibold cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-xs text-[#7A7570]">Belum ada pesanan masuk di database.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 4: KELOLA REKENING BANK & QRIS TOKO -->
        <div id="section-banks" class="tab-pane hidden space-y-6">
            
            <!-- Banner Header Rekening & QRIS (Coklat & Oren Gold) -->
            <div class="bg-gradient-to-r from-[#1D120B] via-[#2C1A11] to-[#3D251A] rounded-3xl p-6 text-white shadow-[0_4px_0_#120A06] border border-[#3D251A] flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#DF9A28]"></span>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-[#DF9A28]">Gerbang Pembayaran Toko</span>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight font-serif">Kelola Rekening Bank & QRIS</h2>
                    <p class="text-xs text-[#D5C4B5] mt-1 max-w-xl">
                        Rekening bank yang Anda input di sini akan secara otomatis menjadi pilihan bagi pelanggan di form pemesanan web, serta tercetak di invoice resmi.
                    </p>
                </div>
                <div class="shrink-0 flex items-center gap-2">
                    <span class="bg-white/10 backdrop-blur-sm text-xs font-semibold px-3 py-1.5 rounded-xl border border-white/15 text-[#F5EFE4]">
                        ⚡ Sinkronisasi Real-Time
                    </span>
                </div>
            </div>

            <!-- Form Tambah Rekening Baru (CRISP WHITE CARD 3D HD) -->
            <div class="bg-white rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_8px_0_#CFC1AF] p-4 sm:p-6 md:p-7 space-y-4">
                <div class="pb-3 sm:pb-4 border-b-2 border-[#E2DDD5] flex items-center justify-between">
                    <div>
                        <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-[#1D120B] flex items-center gap-2">
                            <span>💳</span>
                            <span>Tambah Rekening Bank / Pembayaran Baru</span>
                        </h3>
                        <p class="text-[11px] sm:text-xs text-[#6B5E52] mt-0.5 font-medium">Input detail nomor rekening resmi toko Anda</p>
                    </div>
                </div>

                <form action="{{ route('admin.banks.store') }}" method="POST" class="space-y-3 sm:space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 sm:gap-3.5 items-end">
                        <div class="sm:col-span-1 lg:col-span-4">
                            <label class="block text-[11px] sm:text-xs font-black text-[#1D120B] uppercase tracking-wider mb-1.5">
                                NAMA BANK <span class="text-[#A85816]">*</span>
                            </label>
                            <input type="text" name="bank_name" list="bankPresets" required placeholder="Contoh: BCA, Mandiri, BRI, BNI"
                                class="w-full bg-[#FFFDF9] border-2 border-[#C8B8A6] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#1D120B] focus:border-[#DF9A28] focus:ring-4 focus:ring-[#DF9A28]/25 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                            <datalist id="bankPresets">
                                <option value="BCA">Bank Central Asia (BCA)</option>
                                <option value="Bank Mandiri">Bank Mandiri</option>
                                <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                                <option value="BNI">Bank Negara Indonesia (BNI)</option>
                                <option value="BSI">Bank Syariah Indonesia (BSI)</option>
                                <option value="CIMB Niaga">CIMB Niaga</option>
                                <option value="Permata Bank">Permata Bank</option>
                            </datalist>
                        </div>

                        <div class="sm:col-span-1 lg:col-span-4">
                            <label class="block text-[11px] sm:text-xs font-black text-[#1D120B] uppercase tracking-wider mb-1.5">
                                NOMOR REKENING <span class="text-[#A85816]">*</span>
                            </label>
                            <input type="text" name="account_number" required placeholder="Contoh: 821-098-7654"
                                class="w-full bg-[#FFFDF9] border-2 border-[#C8B8A6] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-mono font-black text-[#1D120B] focus:border-[#DF9A28] focus:ring-4 focus:ring-[#DF9A28]/25 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                        </div>

                        <div class="sm:col-span-2 lg:col-span-4">
                            <label class="block text-[11px] sm:text-xs font-black text-[#1D120B] uppercase tracking-wider mb-1.5">
                                ATAS NAMA REKENING <span class="text-[#A85816]">*</span>
                            </label>
                            <input type="text" name="account_name" required placeholder="Contoh: Mey Bakery Official"
                                class="w-full bg-[#FFFDF9] border-2 border-[#C8B8A6] rounded-xl px-3.5 py-2.5 text-xs sm:text-sm font-bold text-[#1D120B] focus:border-[#DF9A28] focus:ring-4 focus:ring-[#DF9A28]/25 outline-none shadow-[inset_0_2px_4px_rgba(0,0,0,0.03)] transition">
                        </div>

                        <div class="sm:col-span-1 lg:col-span-8 flex items-center gap-2 pt-1">
                            <input type="checkbox" name="is_active" id="new_bank_active" value="1" checked
                                class="w-4 h-4 rounded text-[#1D120B] border-[#DDD5C8] focus:ring-0 cursor-pointer">
                            <label for="new_bank_active" class="text-xs text-[#1D120B] font-bold cursor-pointer">
                                Aktifkan langsung & tampilkan di formulir checkout toko
                            </label>
                        </div>

                        <div class="sm:col-span-1 lg:col-span-4">
                            <button type="submit" 
                                class="w-full h-[42px] sm:h-[45px] flex items-center justify-center text-center px-4 py-2 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm text-white tracking-wide shadow-[0_4px_0_#7A3E05,0_8px_16px_rgba(178,93,7,0.32)] hover:brightness-105 active:translate-y-1 active:shadow-[0_1px_0_#7A3E05] transition-all cursor-pointer"
                                style="background: linear-gradient(180deg, #DF851A 0%, #B25D07 100%); border-top: 1.5px solid rgba(254, 215, 170, 0.55);">
                                <span>+ Simpan Rekening Bank</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Daftar Rekening Toko yang Sudah Tersedia (CRISP WHITE CARD 3D HD) -->
            <div class="bg-white rounded-2xl sm:rounded-3xl border-2 border-[#D8C7B5] shadow-[0_6px_0_#D4C4B3] overflow-hidden">
                <div class="p-4 sm:p-5 px-4 sm:px-6 border-b-2 border-[#E2DDD5] flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#FAF7F0]">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-[#1D120B]">Daftar Rekening Bank Terdaftar (Total: {{ $bankAccounts->count() }})</h3>
                        <p class="text-[11px] sm:text-xs text-[#6B5E52] mt-0.5 font-medium">Rekening yang aktif langsung dipilih pembeli saat memilih metode "Transfer Bank"</p>
                    </div>
                </div>

                <div class="divide-y divide-[#F1EDE6]">
                    @forelse($bankAccounts as $bank)
                    <div class="p-3.5 sm:p-4 px-4 sm:px-6 hover:bg-[#FAF7F0]/60 transition">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <div class="w-11 h-10 sm:w-12 sm:h-10 rounded-xl bg-[#2C1A11] text-white flex items-center justify-center font-black text-xs uppercase tracking-wider shrink-0 shadow-2xs">
                                    {{ substr($bank->bank_name, 0, 4) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h4 class="font-bold text-xs sm:text-sm text-[#2C1A11] truncate">{{ $bank->bank_name }}</h4>
                                        @if($bank->is_active)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-bold bg-[#F1EDE6] text-[#2C1A11] border border-[#DDD5C8] shrink-0">
                                                ✓ Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-bold bg-[#F1EDE6] text-[#7A7570] border border-[#DDD5C8] shrink-0">
                                                Nonaktif
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-xs font-mono font-bold text-[#A85816] mt-0.5">{{ $bank->account_number }}</p>
                                    <p class="text-[11px] text-[#7A7570] truncate">a.n {{ $bank->account_name }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 self-end sm:self-center shrink-0">
                                <button onclick="toggleBankEdit({{ $bank->id }})" 
                                    class="bg-white hover:bg-[#FAF7F0] text-[#2C1A11] text-xs font-bold px-3 py-1.5 rounded-xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition cursor-pointer">
                                    Edit ▾
                                </button>
                                <form action="{{ route('admin.banks.destroy', $bank->id) }}" method="POST" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus rekening {{ addslashes($bank->bank_name) }} ({{ $bank->account_number }})?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-rose-700 hover:text-rose-950 text-xs font-semibold px-2 py-1.5 cursor-pointer">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Baris Edit Cepat Rekening -->
                        <div id="edit-bank-{{ $bank->id }}" class="hidden mt-4 pt-4 border-t border-dashed border-[#DDD5C8] bg-[#FAF7F0] -mx-6 -mb-4 p-4 px-6 rounded-b-2xl">
                            <form action="{{ route('admin.banks.update', $bank->id) }}" method="POST" class="space-y-3">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-end">
                                    <div class="sm:col-span-4">
                                        <label class="block text-[9px] font-bold text-[#5A524A] uppercase mb-1">Nama Bank</label>
                                        <input type="text" name="bank_name" value="{{ $bank->bank_name }}" required
                                            class="w-full bg-[#FFFDF9] border border-[#DDD5C8] rounded-xl px-3 py-1.5 text-xs text-[#2C1A11] outline-none">
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label class="block text-[9px] font-bold text-[#5A524A] uppercase mb-1">Nomor Rekening</label>
                                        <input type="text" name="account_number" value="{{ $bank->account_number }}" required
                                            class="w-full bg-[#FFFDF9] border border-[#DDD5C8] rounded-xl px-3 py-1.5 text-xs font-mono font-bold text-[#2C1A11] outline-none">
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label class="block text-[9px] font-bold text-[#5A524A] uppercase mb-1">Atas Nama</label>
                                        <input type="text" name="account_name" value="{{ $bank->account_name }}" required
                                            class="w-full bg-[#FFFDF9] border border-[#DDD5C8] rounded-xl px-3 py-1.5 text-xs text-[#2C1A11] outline-none">
                                    </div>

                                    <div class="sm:col-span-8 flex items-center gap-2 pt-1">
                                        <input type="checkbox" name="is_active" id="edit_bank_active_{{ $bank->id }}" value="1" {{ $bank->is_active ? 'checked' : '' }}
                                            class="w-4 h-4 rounded text-[#2C1A11] border-[#DDD5C8] focus:ring-0 cursor-pointer">
                                        <label for="edit_bank_active_{{ $bank->id }}" class="text-xs text-[#5A524A] font-semibold cursor-pointer">
                                            Tampilkan di formulir checkout toko
                                        </label>
                                    </div>

                                    <div class="sm:col-span-4 flex gap-1.5">
                                        <button type="submit" class="w-full bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] text-white text-xs font-bold py-1.5 rounded-xl border-t border-white/40 shadow-[0_2px_0_#5C2E0D] active:translate-y-0.5 active:shadow-none transition cursor-pointer">
                                            Simpan Perubahan
                                        </button>
                                        <button type="button" onclick="toggleBankEdit({{ $bank->id }})" class="bg-[#FFFDF9] border border-[#DDD5C8] text-xs px-2.5 py-1.5 rounded-xl cursor-pointer">
                                            ✕
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-xs text-[#7A7570]">
                        Belum ada rekening bank yang didaftarkan. Tambahkan rekening di formulir atas agar pelanggan dapat memilihnya saat checkout.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Kartu Edukasi & Pengaturan Integrasi Barcode QRIS Otomatis -->
            <div class="bg-[#FFF8E7] rounded-3xl border border-[#F3DEB2] p-5 shadow-[0_2px_0_#EAE1CE]">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-2xl bg-[#DF9A28] text-white font-black text-xs flex items-center justify-center shrink-0 shadow-[0_2px_0_#5C2E0D]">
                            QRIS
                        </div>
                        <div>
                            <h4 class="font-bold text-xs text-[#2C1A11] uppercase tracking-wide">Barcode QRIS Nasional Terintegrasi Otomatis</h4>
                            <p class="text-[11px] text-[#5A524A] mt-1 max-w-xl leading-relaxed">
                                Setiap kali pelanggan memesan dengan metode QRIS di etalase web, sistem secara instan menghasilkan <strong>Barcode QRIS</strong> dinamis yang memuat kode invoice dan nominal pesanan yang sesuai pada digital receipt. Anda tidak perlu membuat barcode manual berulang kali.
                            </p>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-[#9A6216] bg-[#FFFDF9] px-3 py-1.5 rounded-xl border border-[#F3DEB2] shrink-0">
                        ✓ Otomatis & Siap Pakai
                    </span>
                </div>
            </div>

        </div>

    </main>

    <!-- JS SCRIPT LOGIC (NAVIGASI TAB, KALKULASI SUB-TOTAL, EKSTRAK TEKS WHATSAPP & EKSPOR CSV) -->
    <script>
        function toggleMobileDrawer(show) {
            const drawer = document.getElementById('mobileDrawer');
            const panel = document.getElementById('mobileDrawerPanel');
            if (!drawer || !panel) return;
            if (show) {
                drawer.classList.remove('hidden');
                setTimeout(() => {
                    panel.classList.remove('-translate-x-full');
                }, 10);
            } else {
                panel.classList.add('-translate-x-full');
                setTimeout(() => {
                    drawer.classList.add('hidden');
                }, 300);
            }
        }

        function switchTab(tabKey) {
            document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));

            const targetPane = document.getElementById('section-' + tabKey);
            if (targetPane) targetPane.classList.remove('hidden');

            const url = new URL(window.location.href);
            url.searchParams.set('tab', tabKey);
            window.history.replaceState({}, '', url);

            // Desktop Sidebar Navigation Active State
            document.querySelectorAll('.nav-item').forEach(btn => {
                btn.classList.remove('text-white', 'bg-[#2C1A11]', 'border-[#4A3225]', 'shadow-[0_2px_0_#120A06]', 'font-bold');
                btn.classList.add('text-[#B5A89E]', 'font-medium');
            });

            const activeBtn = document.getElementById('nav-' + tabKey);
            if (activeBtn) {
                activeBtn.classList.add('text-white', 'bg-[#2C1A11]', 'border-[#4A3225]', 'shadow-[0_2px_0_#120A06]', 'font-bold');
                activeBtn.classList.remove('text-[#B5A89E]', 'font-medium');
            }

            // Mobile Quick Tab Navigation Active State
            document.querySelectorAll('.mobile-tab-btn').forEach(btn => {
                btn.classList.remove('bg-[#2C1A11]', 'text-white', 'border', 'border-[#4A3225]', 'font-bold');
                btn.classList.add('text-[#B5A89E]', 'font-medium');
            });

            const activeMobileBtn = document.getElementById('mobile-tab-' + tabKey);
            if (activeMobileBtn) {
                activeMobileBtn.classList.add('bg-[#2C1A11]', 'text-white', 'border', 'border-[#4A3225]', 'font-bold');
                activeMobileBtn.classList.remove('text-[#B5A89E]', 'font-medium');
            }

            // Mobile Top Header Active Tab Title
            const labels = {
                'overview': 'Ringkasan Bisnis',
                'products': 'Katalog & Harga',
                'orders': 'Pesanan Masuk',
                'banks': 'Rekening & QRIS'
            };
            const mobileLabel = document.getElementById('mobileActiveTabLabel');
            if (mobileLabel && labels[tabKey]) {
                mobileLabel.innerText = labels[tabKey];
            }
        }

        function toggleRowEdit(productId) {
            const editRow = document.getElementById('edit-row-' + productId);
            if (editRow.classList.contains('hidden')) {
                editRow.classList.remove('hidden');
            } else {
                editRow.classList.add('hidden');
            }
        }

        function toggleBankEdit(bankId) {
            const editRow = document.getElementById('edit-bank-' + bankId);
            if (editRow.classList.contains('hidden')) {
                editRow.classList.remove('hidden');
            } else {
                editRow.classList.add('hidden');
            }
        }

        // 1. Live Subtotal Calculator pada Form Manual Order
        function updateManualOrderTotal() {
            const select = document.getElementById('manualOrderProductId');
            const qtyInput = document.getElementById('manualOrderQty');
            const totalDisplay = document.getElementById('manualOrderEstimatedTotal');
            if (!select || !qtyInput || !totalDisplay) return;

            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption ? parseInt(selectedOption.getAttribute('data-price') || 0) : 0;
            const qty = parseInt(qtyInput.value) || 1;
            const total = price * qty;
            totalDisplay.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        // 2. Smart WhatsApp Text Extractor (Ekstrak Langsung Teks Chat ke Form)
        function extractOrderFromText() {
            const rawText = document.getElementById('quickExtractInput').value;
            if (!rawText.trim()) return;

            // Extract Phone
            const phoneMatch = rawText.match(/(?:(?:\+?62)|0)[0-9\-\s]{8,16}/);
            if (phoneMatch) {
                const phoneInput = document.getElementById('manualOrderPhone');
                if (phoneInput) phoneInput.value = phoneMatch[0].replace(/[^0-9]/g, '');
            }

            // Extract Quantity
            const qtyMatch = rawText.match(/(\d+)\s*(?:unit|buah|pcs|kotak|box|biji|porsi|x)/i) || rawText.match(/(?:qty|jumlah|total)\s*[:=]?\s*(\d+)/i);
            if (qtyMatch) {
                const qtyInput = document.getElementById('manualOrderQty');
                if (qtyInput) qtyInput.value = parseInt(qtyMatch[1]);
            }

            // Extract Name
            const nameMatch = rawText.match(/(?:nama|pemesan|an|a\.n|atas nama)\s*[:=]?\s*([a-zA-Z\s]{2,30})/i) || rawText.match(/(?:halo|pagi|siang|malam)\s+(?:saya|sy)\s+([a-zA-Z\s]{2,20})/i);
            if (nameMatch) {
                const nameInput = document.getElementById('manualOrderName');
                if (nameInput) nameInput.value = nameMatch[1].trim();
            }

            // Extract Address
            const addrMatch = rawText.match(/(?:alamat|kirim ke|tujuan|antar ke)\s*[:=]?\s*([^\n\r]+)/i) || rawText.match(/(jl\.\s*[^\n\r]+)/i);
            if (addrMatch) {
                const addrInput = document.getElementById('manualOrderAddress');
                if (addrInput) addrInput.value = addrMatch[1].trim();
            }

            // Extract Notes
            const notesMatch = rawText.match(/(?:catatan|notes|pesan|ucapan|tulisan|lilin)\s*[:=]?\s*([^\n\r]+)/i);
            if (notesMatch) {
                const notesInput = document.getElementById('manualOrderNotes');
                if (notesInput) notesInput.value = notesMatch[1].trim();
            }

            // Match Product
            const select = document.getElementById('manualOrderProductId');
            if (select) {
                for (let i = 0; i < select.options.length; i++) {
                    const optText = select.options[i].text.toLowerCase();
                    const prodName = optText.split('—')[0].trim().toLowerCase();
                    if (prodName && rawText.toLowerCase().includes(prodName)) {
                        select.selectedIndex = i;
                        break;
                    }
                }
            }

            updateManualOrderTotal();

            const badge = document.getElementById('extractSuccessBadge');
            if (badge) {
                badge.classList.remove('hidden');
                setTimeout(() => badge.classList.add('hidden'), 3500);
            }
        }

        // 3. Ekspor / Ekstrak Rekap Data Pesanan ke CSV
        function exportOrdersToCSV() {
            let csv = ["Invoice,Pelanggan,WhatsApp,Alamat,Menu,Target Tanggal,Metode,Total,Status"];
            const rows = document.querySelectorAll('#section-orders tbody tr');
            rows.forEach(tr => {
                const cols = tr.querySelectorAll('td');
                if (cols.length >= 7) {
                    const invoice = cols[0].innerText.replace(/[\n\r↗]/g, '').trim();
                    const custLines = cols[1].innerText.split('\n').map(s => s.trim()).filter(Boolean);
                    const custName = custLines[0] || '';
                    const custWA = (custLines[1] || '').replace(/[^0-9]/g, '');
                    const custAddr = (custLines[2] || '').replace('📍', '').trim();
                    const menu = cols[2].innerText.replace(/[\n\r]/g, ' ').trim();
                    const date = cols[3].innerText.trim();
                    const method = cols[4].innerText.trim();
                    const total = cols[5].innerText.replace(/[^0-9]/g, '').trim();
                    const statusSelect = cols[6].querySelector('select');
                    const status = statusSelect ? statusSelect.value : cols[6].innerText.trim();

                    csv.push(`"${invoice}","${custName}","${custWA}","${custAddr}","${menu}","${date}","${method}","${total}","${status}"`);
                }
            });

            const blob = new Blob([csv.join('\n')], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'rekap_pesanan_meybakery_' + new Date().toISOString().slice(0, 10) + '.csv';
            link.click();
        }

        // Auto Switch ke tab sesuai request atau error validasi
        const hasProductErrors = @json($errors->has('name') || $errors->has('price_idr') || $errors->has('stock') || $errors->has('category') || $errors->has('description') || $errors->has('image_url'));
        const hasOrderErrors = @json($errors->has('customer_name') || $errors->has('customer_phone') || $errors->has('quantity') || $errors->has('delivery_date') || $errors->has('product_id') || $errors->has('order_type'));
        const hasBankErrors = @json($errors->has('bank_name') || $errors->has('account_number') || $errors->has('account_name'));

        const requestedTab = new URLSearchParams(window.location.search).get('tab');
        if (hasProductErrors) {
            switchTab('products');
        } else if (hasOrderErrors) {
            switchTab('orders');
        } else if (hasBankErrors) {
            switchTab('banks');
        } else if (['products', 'orders', 'banks'].includes(requestedTab)) {
            switchTab(requestedTab);
        } else {
            switchTab('overview');
        }

        // Initialize Live Price Subtotal
        window.addEventListener('DOMContentLoaded', updateManualOrderTotal);

        // Auto-dismiss toast setelah 6 detik
        setTimeout(() => {
            document.querySelectorAll('.toast-item').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateX(110%)';
                setTimeout(() => el.remove(), 400);
            });
        }, 6000);
    </script>

</body>
</html>
