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
        Schema::create('expense_values', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('expense_type_id');
            $table->string('expense_type');
            $table->integer('expense_value');
            $table->string('special_note')->nullable();
            $table->string('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_values');
    }
};
