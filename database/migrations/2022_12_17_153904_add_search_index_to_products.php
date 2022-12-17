<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->fullText('name');
        });
        Schema::table('collections', function (Blueprint $table) {
            $table->fullText('name');
        });
        Schema::table('catalogs', function (Blueprint $table) {
            $table->fullText('name');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->fullText('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropFullText('name');
        });
        Schema::table('collections', function (Blueprint $table) {
            $table->dropFullText('name');
        });
        Schema::table('catalogs', function (Blueprint $table) {
            $table->dropFullText('name');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->dropFullText('name');
        });
    }
};
