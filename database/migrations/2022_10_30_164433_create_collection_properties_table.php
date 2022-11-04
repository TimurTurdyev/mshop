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
        Schema::create('collection_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Collection::class);
            $table->foreignId('option_value_id')->nullable()->constrained('option_values')->onDelete('SET NULL');
            $table->json('images')->nullable();
            $table->string('name')->default('');
            $table->integer('price')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_prices');
    }
};
