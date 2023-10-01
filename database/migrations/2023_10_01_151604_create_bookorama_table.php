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
        Schema::create('bookorama', function (Blueprint $table) {
            $table->string('isbn')->primary();
            $table->string('title');
            $table->string('author');
            $table->float('price');
            $table->integer('categoryid')->unsigned();
            $table->rememberToken();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookorama');
    }

};