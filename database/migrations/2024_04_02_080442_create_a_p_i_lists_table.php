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
        Schema::create('a_p_i_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('url');
            $table->string('title');
            $table->string('header')->nullable();
            $table->string('body')->nullable();
            $table->string('result')->nullable();
            $table->string('method');
            $table->string('description')->nullable();
            $table->string('authorization')->nullable();
            $table->string('projectId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_p_i_lists');
    }
};
