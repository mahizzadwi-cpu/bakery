<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan #{{ $order->order_code }} — Mey Bakery</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        @media print {
            .no-print { display: none !important; }
            body { 
                background: #FFFFFF !important; 
                color: #000000 !important;
                padding: 0 !important; 
            }
            .print-clean { 
                box-shadow: none !important; 
                border: 1px solid #CCCCCC !important;
                border-radius: 0 !important;
                padding: 1.5rem !important;
                max-width: 100% !important;
                background: #FFFFFF !important;
                color: #000000 !important;
            }
            .print-clean * {
                color: #000000 !important;
                border-color: #DDDDDD !important;
            }
        }
    </style>
</head>
<body class="min-h-screen py-6 md:py-10 px-4 antialiased flex flex-col items-center justify-start">

    <!-- Toast Notification for Copy -->
    <div id="copyToast" class="fixed top-5 right-5 z-50 transform -translate-y-10 opacity-0 pointer-events-none transition-all duration-300 bg-[#241812] text-[#FAF7F2] text-xs font-semibold px-4 py-2.5 rounded-xl shadow-xl flex items-center gap-2 border border-[#8C7A6B]">
        <svg class="w-4 h-4 text-[#C8B89E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span id="copyToastText">Tersalin ke papan klip!</span>
    </div>

    <div class="max-w-lg w-full space-y-4">

        <!-- Top Action Navigation (Tanpa Panah, Elegan & Profesional) -->
        <div class="no-print flex items-center justify-between">
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#EADDCF] hover:text-white transition-colors bg-white/10 hover:bg-white/15 px-3.5 py-2 rounded-xl border border-white/15 backdrop-blur-sm">
                <span>Kembali ke Toko</span>
            </a>

            <div class="flex items-center gap-2">
                <button onclick="window.print()" class="inline-flex items-center gap-2 px-3.5 py-2 bg-white/10 hover:bg-white/15 text-[#FAF7F2] hover:text-white text-xs font-semibold rounded-xl border border-white/15 backdrop-blur-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#EADDCF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Cetak Struk</span>
                </button>
                <a href="{{ route('landing') }}" class="text-xs font-semibold text-[#EADDCF] hover:text-white bg-white/10 hover:bg-white/15 px-3 py-2 rounded-xl border border-white/15 backdrop-blur-sm transition-all">
                    Beranda
                </a>
            </div>
        </div>

        <!-- Success Alert if newly submitted -->
        @if(session('success'))
            <div class="no-print p-3.5 bg-emerald-950/60 border border-emerald-500/30 text-emerald-100 rounded-2xl flex items-center justify-between text-xs backdrop-blur-sm shadow-sm">
                <div class="flex items-center gap-2.5">
                    <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-300 flex items-center justify-center font-bold shrink-0">
                        ✓
                    </div>
                    <div>
                        <p class="font-bold">Pesanan Berhasil Dicatat</p>
                        <p class="text-[11px] text-emerald-200/80">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-300 hover:text-white text-xs font-bold p-1">✕</button>
            </div>
        @endif

        <!-- Main Clean Digital Invoice Card (Porcelain Cream, Professional Typography) -->
        <div class="bg-[#FAF8F5] text-[#241812] rounded-3xl border border-[#DDD5C8] shadow-[0_20px_50px_rgba(0,0,0,0.25)] print-clean overflow-hidden">
            
            <div class="p-6 sm:p-8 space-y-6">

                <!-- Header: Boutique Monogram & Order Code -->
                <div class="flex items-start justify-between pb-5 border-b border-[#E5DCD0]">
                    <div>
                        <div class="flex items-center gap-2 mb-0.5">
                            <span class="w-6 h-6 rounded-lg bg-[#241812] text-[#FAF8F5] text-xs font-black flex items-center justify-center font-serif">M</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#736559]">Struk Resmi</span>
                        </div>
                        <h1 class="text-xl sm:text-2xl font-serif font-black text-[#241812] tracking-tight">Mey Bakery.</h1>
                        <p class="text-[11px] text-[#736559]">Artisan Pâtisserie • Lamongan, Jawa Timur</p>
                    </div>

                    <div class="text-right space-y-1">
                        <div class="inline-flex items-center gap-1.5 bg-[#EFE9DF] border border-[#DDD3C4] px-2.5 py-1 rounded-lg">
                            <span class="font-mono text-xs font-black text-[#241812]">#{{ $order->order_code }}</span>
                            <button type="button" onclick="copyToClipboard('{{ $order->order_code }}', 'Nomor order tersalin!')" title="Salin Kode Pesanan" class="no-print text-[#736559] hover:text-[#241812] transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            </button>
                        </div>
                        <div>
                            @if($order->status === 'completed')
                                <span class="inline-block text-[10px] font-bold text-emerald-800 bg-emerald-100/70 border border-emerald-300 px-2 py-0.5 rounded-md">
                                    Pesanan Selesai
                                </span>
                            @elseif($order->status === 'confirmed')
                                <span class="inline-block text-[10px] font-bold text-sky-800 bg-sky-100/70 border border-sky-300 px-2 py-0.5 rounded-md">
                                    Dikonfirmasi Admin
                                </span>
                            @elseif($order->status === 'cancelled')
                                <span class="inline-block text-[10px] font-bold text-rose-800 bg-rose-100/70 border border-rose-300 px-2 py-0.5 rounded-md">
                                    Dibatalkan
                                </span>
                            @else
                                <span class="inline-block text-[10px] font-bold text-[#5C4533] bg-[#EFE6DB] border border-[#DDD0BF] px-2 py-0.5 rounded-md">
                                    Menunggu Pembayaran
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Info Singkat Pesanan (Ekonomis & Ringkas) -->
                <div class="grid grid-cols-2 gap-3 text-xs bg-[#F4EFE8] p-3.5 rounded-2xl border border-[#E2D8CC]">
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#7A6D61] block">Pemesan</span>
                        <p class="font-bold text-[#241812] truncate">{{ $order->customer_name }}</p>
                        <p class="text-[11px] text-[#7A6D61] font-mono">{{ $order->customer_phone }}</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#7A6D61] block">Jadwal & Pengambilan</span>
                        <p class="font-bold text-[#241812]">{{ date('d M Y', strtotime($order->delivery_date)) }}</p>
                        <p class="text-[11px] text-[#7A6D61] truncate">
                            {{ $order->order_type == 'delivery' ? 'Kurir Toko' : 'Ambil di Gerai' }}
                        </p>
                    </div>
                    @if($order->address)
                    <div class="col-span-2 pt-2 border-t border-[#E5DDD2]">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#7A6D61] block">Alamat Pengantaran</span>
                        <p class="text-[11px] text-[#241812] leading-tight">{{ $order->address }}</p>
                    </div>
                    @endif
                </div>

                <!-- Menu Item Singkat -->
                <div class="space-y-1.5 text-xs">
                    <span class="text-[10px] uppercase font-bold tracking-wider text-[#7A6D61] block">Menu Dipesan</span>
                    <div class="flex items-center justify-between py-2 border-b border-[#EAE3D9]">
                        <div class="pr-3">
                            @if(str_contains($order->order_notes ?? '', 'PAKET BUNDLE'))
                                <p class="font-bold text-[#241812]">Paket Bundle Pilihan</p>
                                <p class="text-[11px] text-[#7A6D61]">{{ $order->quantity }} item pilihan</p>
                            @else
                                <p class="font-bold text-[#241812]">{{ $order->product->name }}</p>
                                <p class="text-[11px] text-[#7A6D61]">{{ $order->quantity }} unit × Rp {{ number_format($order->product->price_idr, 0, ',', '.') }}</p>
                            @endif
                        </div>
                        <span class="font-bold text-[#241812] whitespace-nowrap">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <!-- TOTAL PEMBAYARAN (Utama & Menonjol, Bersih, Elegan) -->
                <div class="bg-[#241812] text-[#FAF8F5] p-5 rounded-2xl shadow-sm text-center space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#C8B89E] block">Total Pembayaran</span>
                    <p class="font-serif text-3xl sm:text-4xl font-black text-white tracking-tight">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </p>
                    <p class="text-[11px] text-[#B5A593]">
                        Status: {{ $order->status === 'completed' ? 'Lunas' : 'Menunggu Konfirmasi' }}
                    </p>
                </div>

                <!-- KODE QRIS PEMBAYARAN -->
                <div class="no-print bg-white p-5 rounded-2xl border border-[#DDD5C8] shadow-sm text-center space-y-3">
                    <div class="space-y-0.5">
                        <div class="inline-flex items-center gap-1.5 bg-[#241812] text-[#FAF8F5] text-[10px] font-black uppercase px-2 py-0.5 rounded tracking-wider">
                            QRIS
                        </div>
                        <h2 class="text-xs font-bold text-[#241812]">Kode QRIS Resmi Mey Bakery</h2>
                        <p class="text-[10px] text-[#736559]">Semua E-Wallet (GoPay, OVO, Dana, ShopeePay) & M-Banking</p>
                    </div>

                    <!-- Barcode Box -->
                    <div class="inline-block p-2.5 bg-white border border-[#DDD5C8] rounded-xl shadow-xs">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=MEYBAKERY-ORDER-{{ $order->order_code }}-TOTAL-{{ $order->total_price }}" 
                            alt="QRIS Barcode #{{ $order->order_code }}" 
                            class="w-36 h-36 object-contain mx-auto">
                    </div>

                    <div class="space-y-2">
                        <p class="text-[11px] text-[#736559]">
                            Scan barcode di atas dengan nominal pas <strong class="text-[#241812] font-extrabold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                        </p>
                        <div>
                            <a href="https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=MEYBAKERY-ORDER-{{ $order->order_code }}-TOTAL-{{ $order->total_price }}" 
                               download="QRIS-{{ $order->order_code }}.png" 
                               target="_blank"
                               class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-[#241812] bg-[#EFE9DF] hover:bg-[#E5DCD0] px-3.5 py-1.5 rounded-lg border border-[#DDD3C4] transition-all">
                                <span>Simpan Kode QR</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Opsi Rekening Bank jika tersedia di database -->
                @if(isset($bankAccounts) && $bankAccounts->count() > 0)
                <div class="no-print bg-[#F4EFE8] p-3.5 rounded-2xl border border-[#E2D8CC] text-xs space-y-2">
                    <span class="text-[10px] uppercase font-bold tracking-wider text-[#7A6D61] block">Pilihan Transfer Bank:</span>
                    <div class="space-y-1.5">
                        @foreach($bankAccounts as $bank)
                        <div class="bg-white p-2.5 rounded-xl border border-[#E0D7CB] flex items-center justify-between">
                            <div>
                                <p class="font-bold text-[#241812]">{{ $bank->bank_name }} : <span class="font-mono">{{ $bank->account_number }}</span></p>
                                <p class="text-[10px] text-[#7A6D61]">a.n {{ $bank->account_name }}</p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ preg_replace('/[^0-9]/', '', $bank->account_number) }}', 'No. Rekening tersalin!')" class="text-[11px] font-bold text-[#241812] bg-[#EFE9DF] hover:bg-[#E5DCD0] px-2.5 py-1 rounded-md border border-[#DDD3C4] transition-all">
                                Salin
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Aksi Utama: Tombol Konfirmasi WhatsApp (Profesional Hijau Zamrud, No Arrows) & Cetak Struk -->
                @php
                    $waMessage = "🧁 *KONFIRMASI PEMBAYARAN - MEY BAKERY*\n" .
                                 "Nomor Order: *#{$order->order_code}*\n" .
                                 "Pemesan: *{$order->customer_name}*\n" .
                                 "Total: *Rp " . number_format($order->total_price, 0, ',', '.') . "*\n" .
                                 "Menu: {$order->product->name} ({$order->quantity} unit)\n" .
                                 "Jadwal: " . date('d M Y', strtotime($order->delivery_date)) . "\n\n" .
                                 "Halo Admin Mey Bakery, saya telah membuat pesanan dan siap melampirkan bukti pembayaran QRIS. Mohon diproses. Terima kasih!";
                    $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waMessage);
                @endphp

                <div class="no-print space-y-2 pt-1">
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                        class="w-full bg-[#1B4D3E] hover:bg-[#143E31] text-white text-xs sm:text-sm font-bold py-3.5 px-4 rounded-xl shadow-sm transition-all flex items-center justify-center gap-2 cursor-pointer select-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Konfirmasi Pembayaran ke WhatsApp</span>
                    </a>

                    <button onclick="window.print()" class="w-full bg-[#EFE9DF] hover:bg-[#E5DCD0] text-[#241812] text-xs font-bold py-3 px-4 rounded-xl border border-[#DDD3C4] transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-[#736559]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        <span>Cetak Struk Resmi</span>
                    </button>
                </div>

                <!-- Footer Card -->
                <div class="text-center pt-4 border-t border-[#E5DCD0]">
                    <p class="text-[11px] text-[#736559]">Mey Bakery • Lamongan Kota, Jawa Timur</p>
                    <p class="text-[10px] text-[#9E9084] mt-0.5">Layanan bantuan: 0812-3456-7890</p>
                </div>

            </div>
        </div>

    </div>

    <!-- Script Salin -->
    <script>
        function copyToClipboard(text, customMessage) {
            navigator.clipboard.writeText(text).then(function() {
                const toast = document.getElementById('copyToast');
                const toastText = document.getElementById('copyToastText');
                if (toast && toastText) {
                    toastText.textContent = customMessage || 'Tersalin ke papan klip!';
                    toast.classList.remove('-translate-y-10', 'opacity-0', 'pointer-events-none');
                    toast.classList.add('translate-y-0', 'opacity-100');
                    
                    setTimeout(() => {
                        toast.classList.remove('translate-y-0', 'opacity-100');
                        toast.classList.add('-translate-y-10', 'opacity-0', 'pointer-events-none');
                    }, 2400);
                }
            }).catch(function(err) {
                console.error('Gagal menyalin:', err);
            });
        }
    </script>
</body>
</html>