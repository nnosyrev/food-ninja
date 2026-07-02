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
        Schema::table('redirected_urls', function (Blueprint $table) {
            $table->renameColumn('short_url', 'hash');

            $table->renameIndex('links_pkey', 'redirected_urls_pkey');
            $table->renameIndex('links_short_link_unique', 'redirected_urls_hash_unique');

            $table->dropForeign('links_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('redirected_urls', function (Blueprint $table) {
            $table->renameColumn('hash', 'short_url');

            $table->renameIndex('redirected_urls_pkey', 'links_pkey');
            $table->renameIndex('redirected_urls_hash_unique', 'links_short_link_unique');

            $table->dropForeign('redirected_urls_user_id_foreign');
            $table->foreign('user_id', 'links_user_id_foreign')->references('id')->on('users');
        });
    }
};
