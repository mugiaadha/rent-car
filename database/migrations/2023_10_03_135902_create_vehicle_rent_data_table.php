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
        Schema::create('vehicle_rent_data', function (Blueprint $table) {
            $table->increments('vrd_id');
            $table->string('vrd_transaction_number');
            $table->integer('vrd_ud_id');
            $table->integer('vrd_vd_id');
            $table->integer('vrd_total_hari_sewa')->nullable();
            $table->enum('vrd_status', ['Y', 'N', 'D'])->default('D');
            $table->timestamp('vrd_rent_date')->nullable();
            $table->timestamp('vrd_estimated_until_date')->nullable();
            $table->timestamp('vrd_created_date')->useCurrent();
            $table->timestamp('vrd_updated_date')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_rent_data');
    }
};
