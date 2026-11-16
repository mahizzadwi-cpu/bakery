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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        @media print {
            .no-print { display: none !important; }
            body { background: #FFFFFF !important; padding: 0 !important; }
            .print-clean { 
                box-shadow: none !important; 
                border: 1px solid #E2DDD5 !important;
                border-radius: 0 !important;
                padding: 1.5rem !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body class="bg-[#FAF7F0] text-[#2C1A11] min-h-screen py-6 md:py-12 px-4 antialiased selection:bg-[#F3E5C8] selection:text-[#3D251A] flex flex-col items-center justify-start">

    <!-- Toast Notification for Copy -->
    <div id="copyToast" class="fixed top-5 right-5 z-50 transform -translate-y-10 opacity-0 pointer-events-none transition-all duration-300 bg-[#2C1A11] text-[#FFFDF9] text-xs font-semibold px-4 py-2.5 rounded-xl shadow-xl flex items-center gap-2 border border-[#E2DDD5]">
        <svg class="w-4 h-4 text-[#DF9A28]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span id="copyToastText">Tersalin ke papan klip!</span>
    </div>

    <div class="max-w-2xl w-full space-y-5">

        <!-- Top Navigation Bar (Hidden when Printing) -->
        <div class="no-print flex items-center justify-between">
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#5A524A] hover:text-[#2C1A11] transition-colors group bg-[#FFFDF9] hover:bg-[#F1EDE6] px-3.5 py-2 rounded-xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none">
                <span class="text-sm">←</span>
                <span>Kembali ke Menu Toko</span>
            </a>

            <div class="flex items-center gap-2">
                <button onclick="window.print()" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#FFFDF9] hover:bg-[#F1EDE6] text-[#2C1A11] text-xs font-bold rounded-xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all cursor-pointer">
                    <svg class="w-4 h-4 text-[#A85816]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Cetak / PDF</span>
                </button>
                <a href="{{ route('landing') }}" class="text-xs font-bold text-[#5A524A] hover:text-[#2C1A11] bg-[#FFFDF9] hover:bg-[#F1EDE6] px-3 py-2 rounded-xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all">
                    Beranda
                </a>
            </div>
        </div>

        <!-- Success Alert if Redirected from Order Form -->
        @if(session('success'))
            <div class="no-print p-4 bg-[#F1EDE6] border border-[#DDD5C8] rounded-2xl flex items-center justify-between shadow-2xs">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-[#DF9A28]/20 flex items-center justify-center text-[#9A6216] font-bold shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-[#2C1A11]">Pesanan Berhasil Dicatat!</p>
                        <p class="text-[11px] text-[#7A7570]">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-[#8C7D70] hover:text-[#2C1A11] text-sm font-bold p-1">✕</button>
            </div>
        @endif

        <!-- Main Digital Receipt Card (Vanila Ivory Surface & Lis Abu) -->
        <div class="bg-[#FFFDF9] rounded-3xl border border-[#E2DDD5] shadow-[0_20px_50px_rgba(44,26,17,0.08),0_4px_0_#E0D9CE] print-clean overflow-hidden">
            
            <!-- Header Accent Ribbon: Abu Slate -> Coklat -> Oren Gold -> Vanila -->
            <div class="h-2 bg-gradient-to-r from-[#64748B] via-[#3D251A] via-[#DF9A28] to-[#F5EFE4]"></div>

            <div class="p-6 md:p-10 space-y-7">
                
                <!-- Boutique Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-[#E2DDD5]">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#DF9A28]"></span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#8C7D70]">Official Digital Receipt</span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-serif font-black text-[#2C1A11] tracking-tight">Mey Bakery.</h1>
                        <p class="text-xs text-[#7A7570] mt-0.5">Artisan Pâtisserie & Specialty Bakes • Batam, ID</p>
                    </div>

                    <!-- Order Code & Status -->
                    <div class="flex flex-col md:items-end gap-1.5">
                        <div class="inline-flex items-center gap-1.5 bg-[#F1EDE6] border border-[#DDD5C8] px-3 py-1.5 rounded-xl shadow-2xs">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#7A7570]">No. Order</span>
                            <span class="font-mono text-xs font-extrabold text-[#2C1A11]">#{{ $order->order_code }}</span>
                            <button type="button" onclick="copyToClipboard('{{ $order->order_code }}', 'Nomor order tersalin!')" title="Salin Nomor Order" class="no-print text-[#8C7D70] hover:text-[#A85816] transition-colors ml-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            </button>
                        </div>

                        <!-- Status Pill -->
                        @if($order->status === 'completed')
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-[#2C1A11] bg-[#F1EDE6] px-2.5 py-0.5 rounded-full border border-[#DDD5C8]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#DF9A28]"></span>
                                Pesanan Selesai
                            </span>
                        @elseif($order->status === 'confirmed')
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-[#334155] bg-[#F1EDE6] px-2.5 py-0.5 rounded-full border border-[#DDD5C8]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#64748B]"></span>
                                Dikonfirmasi Admin
                            </span>
                        @elseif($order->status === 'cancelled')
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-rose-800 bg-rose-50 px-2.5 py-0.5 rounded-full border border-rose-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                Dibatalkan
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-[#9A6216] bg-[#FFF8E7] px-2.5 py-0.5 rounded-full border border-[#F3DEB2]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#DF9A28] animate-pulse"></span>
                                Menunggu Pembayaran
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Order Flow Progress (Modern Classic 3D Stepper) -->
                <div class="no-print bg-[#F1EDE6] p-4 rounded-2xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4]">
                    <div class="grid grid-cols-4 gap-2 text-center">
                        <div class="space-y-1">
                            <div class="w-6 h-6 mx-auto rounded-full bg-[#2C1A11] text-[#FFFDF9] text-[10px] font-bold flex items-center justify-center shadow-[0_1px_0_#120A06]">✓</div>
                            <span class="text-[10px] font-bold text-[#2C1A11] block">Order Dibuat</span>
                        </div>
                        <div class="space-y-1">
                            <div class="w-6 h-6 mx-auto rounded-full {{ in_array($order->status, ['confirmed', 'completed']) ? 'bg-[#2C1A11] text-[#FFFDF9]' : 'bg-gradient-to-tr from-[#DF9A28] to-[#A85816] text-white font-black shadow-[0_2px_0_#5C2E0D]' }} text-[10px] flex items-center justify-center">
                                {{ in_array($order->status, ['confirmed', 'completed']) ? '✓' : '2' }}
                            </div>
                            <span class="text-[10px] font-semibold {{ in_array($order->status, ['confirmed', 'completed']) ? 'text-[#2C1A11]' : 'text-[#A85816] font-black' }} block">Konfirmasi</span>
                        </div>
                        <div class="space-y-1">
                            <div class="w-6 h-6 mx-auto rounded-full {{ $order->status === 'completed' ? 'bg-[#2C1A11] text-[#FFFDF9]' : 'bg-[#DDD5C8] text-[#7A7570]' }} text-[10px] font-semibold flex items-center justify-center">
                                {{ $order->status === 'completed' ? '✓' : '3' }}
                            </div>
                            <span class="text-[10px] font-medium text-[#7A7570] block">Fresh Baking</span>
                        </div>
                        <div class="space-y-1">
                            <div class="w-6 h-6 mx-auto rounded-full {{ $order->status === 'completed' ? 'bg-[#3D251A] text-white' : 'bg-[#DDD5C8] text-[#7A7570]' }} text-[10px] font-semibold flex items-center justify-center">
                                {{ $order->status === 'completed' ? '✓' : '4' }}
                            </div>
                            <span class="text-[10px] font-medium text-[#7A7570] block">Terkirim / Ambil</span>
                        </div>
                    </div>
                </div>

                <!-- Customer & Delivery Information Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-4 rounded-2xl bg-[#F1EDE6] border border-[#DDD5C8] space-y-1 shadow-[0_1px_0_#CEC3B4]">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#8C7D70] block">Penerima Pesanan</span>
                        <p class="text-sm font-bold text-[#2C1A11]">{{ $order->customer_name }}</p>
                        <p class="font-mono text-[#7A7570] flex items-center gap-1.5 mt-0.5">
                            <svg class="w-3.5 h-3.5 text-[#8C7D70]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $order->customer_phone }}
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-[#F1EDE6] border border-[#DDD5C8] space-y-1 shadow-[0_1px_0_#CEC3B4]">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#8C7D70] block">Jadwal Kirim / Diambil</span>
                        <p class="text-sm font-bold text-[#2C1A11]">{{ date('d F Y', strtotime($order->delivery_date)) }}</p>
                        <p class="text-xs text-[#7A7570] flex items-center gap-1.5 mt-0.5">
                            <span class="inline-block w-2 h-2 rounded-full {{ $order->order_type == 'delivery' ? 'bg-[#A85816]' : 'bg-[#3D251A]' }}"></span>
                            {{ $order->order_type == 'delivery' ? 'Kurir Toko (Delivery Order)' : 'Ambil di Gerai (Self Pick-up)' }}
                        </p>
                    </div>

                    @if($order->address)
                    <div class="sm:col-span-2 p-4 rounded-2xl bg-[#F1EDE6] border border-[#DDD5C8] flex items-start gap-2.5 shadow-[0_1px_0_#CEC3B4]">
                        <svg class="w-4 h-4 text-[#A85816] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-[#8C7D70] block">Alamat Pengantaran</span>
                            <p class="text-xs text-[#2C1A11] mt-0.5 leading-relaxed">{{ $order->address }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Itemised Menu Order -->
                <div class="space-y-3 pt-2">
                    <span class="text-[10px] uppercase font-bold tracking-wider text-[#8C7D70] block">Rincian Menu Pesanan</span>
                    
                    <div class="bg-[#F1EDE6] rounded-2xl border border-[#DDD5C8] p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_1px_0_#CEC3B4]">
                        <div class="flex items-center gap-3.5">
                            @if($order->product->image_url)
                                <img src="{{ $order->product->image_url }}" alt="{{ $order->product->name }}" class="w-16 h-16 rounded-xl object-cover border border-[#DDD5C8] shrink-0">
                            @else
                                <div class="w-16 h-16 rounded-xl bg-[#FFFDF9] border border-[#DDD5C8] flex items-center justify-center text-[#8C7D70] font-serif text-xl shrink-0">
                                    🥐
                                </div>
                            @endif
                            
                            <div>
                                @if(str_contains($order->order_notes ?? '', 'PAKET BUNDLE'))
                                    <span class="text-[10px] font-black text-[#9A6216] bg-[#FFF8E7] px-2.5 py-0.5 rounded-full uppercase tracking-wider inline-block mb-1 border border-[#F3DEB2]">Paket Bundle</span>
                                    <h3 class="text-sm font-bold text-[#2C1A11]">Paket Bundle Pilihan ({{ $order->quantity }} Unit)</h3>
                                @else
                                    <span class="text-[10px] font-bold text-[#9A6216] uppercase tracking-wider">{{ $order->product->category ?? 'Artisan' }}</span>
                                    <h3 class="text-sm font-bold text-[#2C1A11]">{{ $order->product->name }}</h3>
                                    <p class="text-xs text-[#7A7570] mt-0.5">
                                        Rp {{ number_format($order->product->price_idr, 0, ',', '.') }} × {{ $order->quantity }} unit
                                    </p>
                                @endif
                                
                                @if($order->order_notes)
                                    <div class="mt-2 bg-[#FFFDF9] p-2.5 rounded-xl border border-[#DDD5C8] text-[11px] text-[#2C1A11] leading-relaxed font-mono whitespace-pre-line shadow-2xs">
                                        {{ $order->order_notes }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="sm:text-right border-t sm:border-t-0 pt-2 sm:pt-0 border-[#DDD5C8]">
                            <span class="text-[10px] text-[#8C7D70] uppercase font-bold tracking-wider block">Subtotal</span>
                            <span class="text-base font-black text-[#A85816]">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Receipt Dashed Divider -->
                <div class="relative py-2">
                    <div class="border-t border-dashed border-[#DDD5C8]"></div>
                </div>

                <!-- Financial Calculation & Total -->
                <div class="space-y-2 text-xs">
                    <div class="flex justify-between items-center text-[#6B6661]">
                        <span>Subtotal Item</span>
                        <span class="font-bold text-[#2C1A11]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center text-[#6B6661]">
                        <span>Ongkos Pengiriman</span>
                        <span class="font-semibold text-[#3D251A]">
                            {{ $order->order_type == 'delivery' ? 'Konfirmasi Kurir Sesuai Jarak' : 'Gratis (Ambil di Gerai)' }}
                        </span>
                    </div>

                    <div class="flex justify-between items-baseline pt-3 border-t border-[#DDD5C8]">
                        <div>
                            <span class="text-xs uppercase font-extrabold tracking-wider text-[#8C7D70] block">Total Tagihan</span>
                            <span class="text-[11px] text-[#7A7570]">Sesuai invoice resmi</span>
                        </div>
                        <div class="text-right">
                            <span class="font-serif text-2xl md:text-3xl font-black text-[#A85816] tracking-tight">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods & Instructions (Hidden in Print) -->
                <div class="no-print bg-[#F1EDE6] p-5 md:p-6 rounded-2xl border border-[#DDD5C8] space-y-4 shadow-[0_2px_0_#CEC3B4]">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xs font-bold text-[#2C1A11] uppercase tracking-wider">Instruksi Pembayaran Resmi</h4>
                            <p class="text-[11px] text-[#7A7570] mt-0.5">Silakan transfer sesuai nominal, lalu konfirmasi ke admin via WhatsApp.</p>
                        </div>
                        <span class="text-[10px] font-bold bg-[#FFFDF9] text-[#A85816] px-2.5 py-1 rounded-full border border-[#DDD5C8]">
                            Direct Transfer
                        </span>
                    </div>

                    <!-- Dynamic Bank Accounts from Database -->
                    <div class="space-y-2.5">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#7A7570] block">Pilihan Rekening Transfer Bank:</span>
                        
                        @forelse($bankAccounts ?? [] as $bank)
                        <div class="bg-[#FFFDF9] p-3.5 rounded-xl border border-[#DDD5C8] flex items-center justify-between shadow-[0_2px_0_#CEC3B4]">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-8 rounded-lg bg-[#2C1A11] text-white flex items-center justify-center font-black text-[10px] tracking-wider shrink-0 uppercase shadow-xs">
                                    {{ substr($bank->bank_name, 0, 4) }}
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-[#2C1A11] flex items-center gap-2">
                                        <span>{{ $bank->bank_name }}</span>
                                        <span class="font-mono text-[#7A7570] font-semibold">({{ $bank->account_number }})</span>
                                    </p>
                                    <p class="text-[10px] text-[#8C7D70]">a.n {{ $bank->account_name }}</p>
                                </div>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ preg_replace('/[^0-9]/', '', $bank->account_number) }}', 'No. Rekening {{ $bank->bank_name }} tersalin!')" class="text-xs font-bold text-[#3D251A] hover:text-[#2C1A11] bg-[#F1EDE6] hover:bg-[#E6DFD3] px-3 py-1.5 rounded-lg border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all cursor-pointer">
                                Salin
                            </button>
                        </div>
                        @empty
                        <div class="bg-[#FFFDF9] p-3 rounded-xl border border-[#DDD5C8] text-xs text-[#7A7570] text-center">
                            Silakan hubungi WhatsApp admin untuk informasi nomor rekening resmi.
                        </div>
                        @endforelse

                        <!-- QRIS Barcode Scan Card -->
                        <div class="bg-[#FFFDF9] p-4 rounded-2xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-10 h-7 rounded-md bg-[#DF9A28] text-white font-black text-[10px] flex items-center justify-center tracking-wider shadow-xs">
                                        QRIS
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-[#2C1A11]">Barcode Pembayaran QRIS Nasional</p>
                                        <p class="text-[10px] text-[#7A7570]">BCA Mobile, Livin, GoPay, OVO, ShopeePay, Dana, LinkAja</p>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-[#3D251A] bg-[#F1EDE6] px-2 py-0.5 rounded border border-[#DDD5C8]">
                                    Scan Instant
                                </span>
                            </div>

                            <!-- QR Code Barcode Image -->
                            <div class="bg-[#FAF7F0] p-4 rounded-xl border border-dashed border-[#DDD5C8] flex flex-col sm:flex-row items-center gap-4 text-center sm:text-left">
                                <div class="bg-white p-2 rounded-xl border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] shrink-0">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=MEYBAKERY-ORDER-{{ $order->order_code }}-TOTAL-{{ $order->total_price }}" 
                                        alt="QRIS Barcode #{{ $order->order_code }}" 
                                        class="w-32 h-32 object-contain mx-auto">
                                </div>
                                <div class="space-y-1.5 text-xs">
                                    <p class="font-bold text-[#2C1A11] text-sm">Scan Barcode untuk Bayar</p>
                                    <p class="text-[#7A7570] text-[11px] leading-relaxed">
                                        1. Buka aplikasi M-Banking atau E-Wallet apa saja.<br>
                                        2. Arahkan kamera ke barcode di samping.<br>
                                        3. Pastikan nominal pembayaran sesuai: <strong class="text-[#A85816] font-black">Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                                    </p>
                                    <div class="pt-1">
                                        <a href="https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=MEYBAKERY-ORDER-{{ $order->order_code }}-TOTAL-{{ $order->total_price }}" download="QRIS-{{ $order->order_code }}.png" target="_blank"
                                            class="inline-flex items-center gap-1.5 text-[11px] font-bold text-[#3D251A] hover:text-[#2C1A11] bg-[#F1EDE6] hover:bg-[#E6DFD3] px-3 py-1.5 rounded-lg border border-[#DDD5C8] shadow-[0_2px_0_#CEC3B4] active:translate-y-0.5 active:shadow-none transition-all">
                                            <span>📥 Unduh Barcode QRIS</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Direct WhatsApp Confirmation Button: Oren Gold 3D -->
                    @php
                        $waMessage = "🧁 *KONFIRMASI PEMBAYARAN - MEY BAKERY*\n" .
                                     "Nomor Order: *#{$order->order_code}*\n" .
                                     "Pemesan: *{$order->customer_name}*\n" .
                                     "Total: *Rp " . number_format($order->total_price, 0, ',', '.') . "*\n" .
                                     "Menu: {$order->product->name} ({$order->quantity} unit)\n" .
                                     "Jadwal: " . date('d M Y', strtotime($order->delivery_date)) . "\n\n" .
                                     "Halo Admin Mey Bakery, saya telah membuat pesanan dan siap melampirkan bukti transfer / mengonfirmasi pesanan. Mohon dicek. Terima kasih!";
                        $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waMessage);
                    @endphp

                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                        class="w-full bg-gradient-to-r from-[#DF9A28] via-[#C98224] to-[#A85816] text-white text-xs sm:text-sm font-extrabold py-3.5 px-4 rounded-xl border-t border-white/40 shadow-[0_5px_0_#5C2E0D,0_12px_24px_rgba(201,130,36,0.3)] hover:-translate-y-0.5 hover:shadow-[0_6px_0_#5C2E0D,0_16px_28px_rgba(201,130,36,0.4)] active:translate-y-1 active:shadow-[0_1px_0_#5C2E0D] transition-all flex items-center justify-center gap-2 group cursor-pointer select-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Konfirmasi Pembayaran ke WhatsApp Admin</span>
                        <span class="group-hover:translate-x-0.5 transition-transform">→</span>
                    </a>
                </div>

                <!-- Boutique Closing Note -->
                <div class="text-center pt-3 border-t border-[#E2DDD5]">
                    <p class="text-xs font-serif italic text-[#7A7570]">"Setiap gigitan adalah karya penuh cinta dari oven kami untuk hari istimewa Anda."</p>
                    <p class="text-[10px] text-[#8C7D70] mt-1">Mey Bakery &copy; {{ date('Y') }} • Hubungi 0812-3456-7890 jika ada kendala pesanan.</p>
                </div>

            </div>
        </div>

    </div>

    <!-- Interactive Script for Copy Buttons -->
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
