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
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->text('content')->nullable();
            $table->boolean('is_published')->default(false)->index();
            $table->foreignId('user_id')->index()->constrained();
            $table->timestamps();
            $table->unique(['user_id', 'slug']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentations');
    }
};
