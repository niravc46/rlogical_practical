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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->date('module1_start');
            $table->date('module1_end');
            $table->date('module2_start');
            $table->date('module2_end');
            $table->date('module3_start');
            $table->date('module3_end');
            $table->date('module4_start');
            $table->date('module4_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
