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
        Schema::create('books_service', function (Blueprint $table) {
            $table->id();
            $table->string('users_id');
            $table->string('service_id');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('amc_free_service_id');
            $table->string('description');
            $table->string('special_instructions');
            $table->string('pat');
            $table->date('available_date');
            $table->string('service_request');
            $table->string('expert_comments');
            $table->string('vendor_id');
            $table->string('service_completion');
            $table->tinyInteger('status');
            $table->date('vendor_date');
            $table->string('vendor_time');
            $table->string('vendor_description');
            $table->string('vendor_price');
            $table->tinyInteger('pay_status');
            $table->tinyInteger('modal_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_service');
    }
};
