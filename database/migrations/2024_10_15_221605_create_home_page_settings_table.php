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

        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('hero_text')->nullable();
            $table->longText('hero_sub_text')->nullable();
            $table->longText('product_id_1')->nullable();
            $table->longText('product_id_2')->nullable();
            $table->longText('product_id_3')->nullable();
             $table->longText('product_id_4')->nullable();
            $table->longText('product_id_5')->nullable();
            $table->longText('product_id_6')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
