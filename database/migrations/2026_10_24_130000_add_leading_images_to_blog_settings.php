<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Custom images for the 3 leading posts on the blog page. When set, the
     * slot shows this image instead of the selected post's image.
     */
    public function up(): void
    {
        Schema::table('blogsettings', function (Blueprint $table) {
            for ($i = 1; $i <= 3; $i++) {
                $table->string('leading_image'.$i)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogsettings', function (Blueprint $table) {
            for ($i = 1; $i <= 3; $i++) {
                $table->dropColumn('leading_image'.$i);
            }
        });
    }
};
