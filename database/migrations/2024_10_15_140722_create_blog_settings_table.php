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
        Schema::create('blogsettings', function (Blueprint $table) {
            $table->id();
            $table->longText('heading1')->nullable();
            $table->longText('heading2')->nullable();
            $table->longText('heading3')->nullable();
            $table->longText('heading_image1')->nullable();
            $table->longText('heading_image2')->nullable();
            $table->longText('heading_image3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_settings');
    }
};
