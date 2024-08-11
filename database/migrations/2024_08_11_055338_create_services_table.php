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
        Schema::create('services', function (Blueprint $table) {
            $table->id();  // This is the auto-incrementing primary key
            $table->string('title', 500)->nullable()->default(null);
            $table->text('details');
            $table->integer('category_id')->default(1);  // No auto_increment here
            $table->double('original_price', 8, 2)->default(0.00);
            $table->double('discounted_price', 8, 2)->default(0.00);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
