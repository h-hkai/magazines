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
        Schema::create('magazine_items', function (Blueprint $table) {
            $table->id();
            $table->string('title_zh');
            $table->string('title_en')->nullable();
            $table->string('download_links')->nullable();
            $table->string('pure_download_links')->nullable();
            $table->string('lanzoup_download_links')->nullable();
            $table->string('kdocs_download_links')->nullable();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->string('tags');
            $table->timestamp('update_time');
            $table->update_time();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazine_items');
    }
};
