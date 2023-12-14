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
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('training_id')->constrained('trainings'); // 外部キー制約と型の制約を一度につける
            $table->integer('set_id');
            $table->foreignId('part_id')->constrained('training_part');
            $table->integer('weight');
            $table->integer('rep');
            $table->boolean('status')->default(false);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
