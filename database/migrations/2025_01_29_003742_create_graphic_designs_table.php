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
        Schema::create('graphic_designs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('graphic_designs_id')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('is_visible')->default(0);
            $table->timestamps();

            $table->foreign('graphic_designs_id')->references('id')->on('graphic_designs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graphic_designs');
    }
};
