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
        Schema::create('option_values', function (Blueprint $table) {
            $table->id();
            $table->string('value_admin');
            $table->string('value');
            $table->string('image');
        });

        Schema::create('option_value_to_options', function (Blueprint $table) {
            $table->foreignId('option_id')->constrained('options')->onDelete('CASCADE');
            $table->foreignId('option_value_id')->constrained('option_values')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_value_to_options');
        Schema::dropIfExists('option_values');
    }
};
