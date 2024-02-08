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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('zipcode');
            $table->string('place');
            $table->string('number');
            $table->string('district');
            $table->string('complement');
            $table->foreignId('city_id');
            $table->foreignId('state_id');
            $table->foreign('city_id')->references('id')->on('city');
            $table->foreign('state_id')->references('id')->on('state');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
