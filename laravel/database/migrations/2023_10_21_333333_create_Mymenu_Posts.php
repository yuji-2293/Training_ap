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
        Schema::create('My_menu_Posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id')->constrained('training_part');
            $table->string('name');
            $table->date('Up')->comment('開始日');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('My_menu_Posts');
    }
};
