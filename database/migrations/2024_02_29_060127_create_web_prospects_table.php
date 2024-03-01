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
        Schema::create('web_prospects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('state');
            $table->string('brand_name');
            $table->string('business_type');
            $table->string('role');
            $table->string('last_30days_sales');
            $table->string('website_type');
            $table->foreignId('web_sales_rep_id') ->nullable();
            $table->string('status')->default('New');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_prospects');
    }
};
