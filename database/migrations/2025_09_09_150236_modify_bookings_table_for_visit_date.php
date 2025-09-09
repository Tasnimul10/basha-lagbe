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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['check_in_date', 'check_out_date', 'guests']);
            $table->date('visit_date')->after('landlord_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('visit_date');
            $table->date('check_in_date')->after('landlord_id');
            $table->date('check_out_date')->after('check_in_date');
            $table->integer('guests')->after('check_out_date');
        });
    }
};
