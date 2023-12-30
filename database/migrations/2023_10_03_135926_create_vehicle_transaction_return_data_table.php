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
        Schema::create('vehicle_transaction_return_data', function (Blueprint $table) {
            $table->increments('vtrd_id');
            $table->integer('vtrd_vrd_id')->nullable();
            $table->enum('vtrd_status', ['Y', 'N', 'D'])->default('D');
            $table->bigInteger('vtrd_payment_amount')->nullable();
            $table->bigInteger('vtrd_late_fee')->nullable();
            $table->bigInteger('vtrd_additional_cost')->nullable();
            $table->timestamp('vtrd_created_date')->useCurrent();
            $table->timestamp('vtrd_updated_date')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_transaction_return_data');
    }
};
