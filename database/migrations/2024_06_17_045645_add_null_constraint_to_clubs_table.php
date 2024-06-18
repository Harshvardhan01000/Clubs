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
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('club_logo',65)->nullable('true')->change();
            $table->string('club_banner',65)->nullable('true')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('club_logo',65)->nullable('false')->change();
            $table->string('club_banner',65)->nullable('false')->change();
        });
    }
};
