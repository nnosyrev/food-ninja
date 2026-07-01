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
        Schema::create('redirect_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('redirected_url_id');
            $table->string('ip', 40);
            $table->timestamps();

            $table->foreign('redirected_url_id')->references('id')->on('redirected_urls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirect_statistics');
    }
};
