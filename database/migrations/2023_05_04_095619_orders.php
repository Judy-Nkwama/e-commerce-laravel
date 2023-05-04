<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // order status table
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->text('description');
            $table->timestamps();
        });

        DB::table('order_statuses')->insert([
            ['name' => 'Sipariş Onayı Bekleniyor', 'description' => 'Mağaza onaylaması bekleniyor.'],
            ['name' => 'Sipariş Alındı', 'description' => 'Siparişiniz başarıyla alındı.'],
            ['name' => 'Hazırlanıyor', 'description' => 'Siparişiniz hazırlanıyor.'],
            ['name' => 'Kargoya Verildi', 'description' => 'Siparişiniz kargoya verildi.'],
            ['name' => 'Teslim Edildi', 'description' => 'Siparişiniz başarıyla teslim edildi.'],
            ['name' => 'Müşteriye Teslim Edildi', 'description' => 'Siparişiniz müşteriye teslim edildi.'],
            ['name' => 'İptal Edildi', 'description' => 'Siparişiniz iptal edildi.']
        ]);

        // Create orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('order_statuses');
        });

        // Create order_items table
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop order_items table
        Schema::dropIfExists('order_items');

        // Drop orders table
        Schema::dropIfExists('orders');

        // Drop orders_status table
        Schema::dropIfExists('order_statuses');
        
    }
};
