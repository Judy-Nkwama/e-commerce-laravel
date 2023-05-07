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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();

            $table->boolean('is_admin')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Create products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('bg_image_link');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->boolean('is_active')->default(true);
            $table->string("tags_string");
            //$table->dateTime('created_at')->default(now());
            //$table->text('description');
            $table->timestamps();
        });

        // sepet
        Schema::create('sepet', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId("product_id");
            $table->foreignId("user_id");

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('sepet');
        
        //
        Schema::dropIfExists('products');

        // Drop user_addresses table
        Schema::dropIfExists('user_addresses');
    
        //
        Schema::dropIfExists('users');
    }
};
