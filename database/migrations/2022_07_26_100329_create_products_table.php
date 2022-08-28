<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('SET NULL');
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('SET NULL');
            $table->string('name');
            $table->string('sku')->default('');
            $table->json('images')->nullable();
            $table->integer('height')->default(0);
            $table->integer('depth')->default(0);
            $table->integer('width')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('viewed')->default(0);
            $table->boolean('status')->default(false)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
