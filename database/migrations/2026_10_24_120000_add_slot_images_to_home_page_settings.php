<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Custom images for the 11 homepage product slots. When set, the slot
     * shows this image instead of the selected product's image.
     */
    public function up(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            for ($i = 1; $i <= 11; $i++) {
                $table->string('image_'.$i)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            for ($i = 1; $i <= 11; $i++) {
                $table->dropColumn('image_'.$i);
            }
        });
    }
};
