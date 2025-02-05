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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string("brand_en",200)->nullable();
            $table->string("brand_fa",200)->nullable();
            $table->string("name",200)->nullable();
            $table->string("generic",200)->nullable();
            $table->timestamps();
        });

        Schema::create('drug_user', function (Blueprint $table) {
            $table->unsignedBigInteger('drugid');
            $table->unsignedBigInteger('user_id');
            $table->string('year');
            $table->string('dose');
            $table->string('count');
            $table->string('info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
        Schema::dropIfExists('drug_user');
    }
};
