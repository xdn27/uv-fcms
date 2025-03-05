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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('default')->index();
            $table->bigInteger('user_id')->index();
            $table->string('title');
            $table->string('slug', 100)->unique();
            $table->string('banner')->nullable();
            $table->longText('body_html')->nullable();
            $table->longText('body_json')->nullable();
            $table->tinyInteger('is_using_builder')->default(0);
            $table->tinyInteger('is_published')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
