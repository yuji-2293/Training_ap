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
        Schema::rename('part_events','Part_Events');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::rename('part_events','Part_Events');
    }
};
