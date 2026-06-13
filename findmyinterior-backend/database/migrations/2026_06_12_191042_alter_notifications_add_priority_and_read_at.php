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
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropIndex(['is_read']);
            $table->dropColumn('is_read');
            $table->enum('priority', ['low', 'normal', 'high', 'critical'])->default('normal')->after('data');
            $table->timestamp('read_at')->nullable()->after('priority');
            $table->index('read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropIndex(['read_at']);
            $table->dropColumn('read_at');
            $table->dropColumn('priority');
            $table->boolean('is_read')->default(false);
            $table->index('is_read');
        });
    }
};
