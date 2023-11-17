<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->unique();
            $table->date('trx_date');
            $table->decimal('sub_amount')->nullable()->comment('total semua');
            $table->decimal('amount_total')->nullable()->comment('total setelah diskon');
            $table->decimal('discount_amount')->nullable()->comment('nominal diskon');
            $table->integer('total_products')->nullable();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
