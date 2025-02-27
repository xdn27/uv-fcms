<?php

use App\Models\User;
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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(app(User::class)->getTable())->nullOnDelete();
            $table->string('title');
            $table->string('slug', 100)->index();
            $table->timestamp('post_at')->nullable();
            $table->string('banner')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('body')->nullable();
            $table->tinyInteger('is_published')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
