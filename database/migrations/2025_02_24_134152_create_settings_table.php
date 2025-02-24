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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique();
            $table->string('group', 100)->default('default');
            $table->string('label', 100);
            $table->text('content')->nullable();
            $table->json('data')->nullable();
            $table->enum('type', ['string', 'data', 'image'])->default('string');
            $table->tinyInteger('is_editable')->default(1);
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
            $table->index(['is_active', 'code'], 'is_active_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
