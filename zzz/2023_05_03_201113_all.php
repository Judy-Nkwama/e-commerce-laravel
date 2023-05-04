<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTable_users extends Migration
{
    public function up()
    {
        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop users table
        Schema::dropIfExists('users');
    }
}

class CreateTable_user_addresses extends Migration
{
    public function up()
    {
        // Create user_addresses table
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop user_addresses table
        Schema::dropIfExists('user_addresses');
    }
}

class CreateTable_products extends Migration
{
    public function up()
    {
        // Create products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->boolean('is_active')->default(true);
            $table->string("tags_string");

            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop products table
        Schema::dropIfExists('products');
    }
}

class CreateTable_product_images extends Migration
{
    public function up()
    {
        // Create product_images table
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('filename');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop product_images table
        Schema::dropIfExists('product_images');
    }
}

class CreateTable_orders extends Migration
{
    public function up()
    {
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

    public function down()
    {
        // Drop order_items table
        Schema::dropIfExists('order_items');

        // Drop orders table
        Schema::dropIfExists('orders');

        // Drop orders_status table
        Schema::dropIfExists('order_statuses');
    }
}
