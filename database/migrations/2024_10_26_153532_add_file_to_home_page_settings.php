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
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->longText('file')->nullable();
            $table->longText('video_text1')->nullable();
            $table->longText('video_text2')->nullable();
            $table->longText('product_id_7')->nullable();
            $table->longText('product_id_8')->nullable();
            $table->longText('product_id_9')->nullable();
            $table->longText('product_id_10')->nullable();
            $table->longText('product_id_11')->nullable();
            $table->longText('fb')->nullable();
            $table->longText('ig')->nullable();
            $table->longText('yb')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            //
        });
    }
};
