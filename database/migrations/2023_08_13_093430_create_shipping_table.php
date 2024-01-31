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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('origin');
            $table->string('destination');
            $table->longText('transport_type');
            $table->string('origin_country');
            $table->string('destination_country');
            $table->integer('origin_city');
            $table->integer('destination_city');
            $table->boolean('included_all_city');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_special');
            $table->foreignId('cost_id')->references('id')->on('costs');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
