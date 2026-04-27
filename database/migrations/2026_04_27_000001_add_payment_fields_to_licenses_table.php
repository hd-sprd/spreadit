<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->string('payment_type', 191)->nullable()->after('min_amt');
            $table->string('payment_frequency', 191)->nullable()->after('payment_type');
            $table->unsignedBigInteger('owner_id')->nullable()->after('payment_frequency');
            $table->string('jira_ticket', 191)->nullable()->after('owner_id');
        });
    }

    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropColumn(['payment_type', 'payment_frequency', 'owner_id', 'jira_ticket']);
        });
    }
};
