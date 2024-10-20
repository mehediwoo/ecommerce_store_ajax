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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cat_id');
            $table->foreignId('sub_cat_id');
            $table->foreignId('child_cat_id')->nullable();
            $table->foreignId('brand_id');
            $table->string('p_title');
            $table->string('p_slug');
            $table->string('p_code');
            $table->string('p_meta_tags')->nullable();
            $table->string('p_unit');
            $table->string('p_size');
            $table->string('p_color');
            $table->string('p_qty');
            $table->string('p_alert_qty')->nullable();
            $table->string('p_cost');
            $table->string('p_price');
            $table->string('p_discount_price');
            $table->mediumText('p_meta_desc')->nullable();
            $table->mediumText('p_short_desc');
            $table->longText('p_desc');
            $table->string('thumbnail');
            $table->longText('p_image')->nullable();
            $table->string('feature')->nullable();
            $table->string('hot_deal')->nullable();
            $table->string('slide_product')->nullable();
            $table->string('product_count')->nullable();
            $table->string('admin_id');
            $table->enum('status',['enable','disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
