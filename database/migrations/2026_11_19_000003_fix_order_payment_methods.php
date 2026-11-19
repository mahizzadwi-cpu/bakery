<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('orders')) {
            // Update pesanan pengujian user agar sinkron sebagai transfer
            DB::table('orders')->where('order_code', 'MEY-7CLITC')->update(['payment_method' => 'transfer']);

            // Sinkronkan pesanan lainnya berdasarkan order_notes
            $orders = DB::table('orders')->get();
            foreach ($orders as $order) {
                $notes = $order->order_notes ?? '';
                if (preg_match('/\[Bayar:\s*([A-Za-z0-9_]+)/i', $notes, $m)) {
                    $method = strtolower($m[1]);
                    if (in_array($method, ['transfer', 'cod', 'qris'])) {
                        DB::table('orders')->where('id', $order->id)->update(['payment_method' => $method]);
                    }
                } elseif (stripos($notes, 'transfer') !== false) {
                    DB::table('orders')->where('id', $order->id)->update(['payment_method' => 'transfer']);
                } elseif (stripos($notes, 'cod') !== false || stripos($notes, 'tunai') !== false) {
                    DB::table('orders')->where('id', $order->id)->update(['payment_method' => 'cod']);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
