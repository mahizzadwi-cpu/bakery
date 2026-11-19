<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BankAccount;

return new class extends Migration
{
    /**
     * Seed default official bakery bank accounts if none exist.
     */
    public function up(): void
    {
        if (Schema::hasTable('bank_accounts')) {
            if (BankAccount::count() === 0) {
                BankAccount::create([
                    'bank_name' => 'BCA',
                    'account_number' => '8290192811',
                    'account_name' => 'Mey Bakery Official',
                    'is_active' => true,
                ]);
                BankAccount::create([
                    'bank_name' => 'Mandiri',
                    'account_number' => '1420019283712',
                    'account_name' => 'Mey Bakery Official',
                    'is_active' => true,
                ]);
                BankAccount::create([
                    'bank_name' => 'BRI',
                    'account_number' => '012301098234501',
                    'account_name' => 'Mey Bakery Official',
                    'is_active' => true,
                ]);
            }
        }
    }

    public function down(): void
    {
    }
};
