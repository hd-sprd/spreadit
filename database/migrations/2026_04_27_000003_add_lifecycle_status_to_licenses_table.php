<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->string('lifecycle_status', 191)->nullable()->after('jira_ticket');
        });

        Schema::table('licenses', function (Blueprint $table) {
            $table->text('jira_ticket')->nullable()->change();
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->text('jira_ticket')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropColumn('lifecycle_status');
            $table->string('jira_ticket', 191)->nullable()->change();
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->string('jira_ticket', 191)->nullable()->change();
        });
    }
};
