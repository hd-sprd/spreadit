<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->string('cc_last_four', 4)->nullable()->after('lifecycle_status');
            $table->string('cc_name', 191)->nullable()->after('cc_last_four');
        });
    }

    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropColumn(['cc_last_four', 'cc_name']);
        });
    }
};
