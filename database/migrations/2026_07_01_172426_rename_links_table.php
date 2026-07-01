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
        Schema::table('links', function (Blueprint $table) {
            $table->renameColumn('orig_link', 'orig_url');
            $table->renameColumn('short_link', 'short_url');
        });

        Schema::rename('links', 'redirected_urls');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('redirected_urls', function (Blueprint $table) {
            $table->renameColumn('orig_url', 'orig_link');
            $table->renameColumn('short_url', 'short_link');
        });

        Schema::rename('redirected_urls', 'links');
    }
};
