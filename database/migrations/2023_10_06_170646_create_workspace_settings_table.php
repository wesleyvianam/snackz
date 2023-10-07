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
        Schema::create('workspace_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('recurrent')->nullable();
            $table->time('snack_time')->nullable();
            $table->foreignId('workspace_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_settings');
    }
};
