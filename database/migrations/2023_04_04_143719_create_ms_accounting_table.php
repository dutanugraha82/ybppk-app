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
        Schema::create('ms_accounting', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('ms_accounting_id');
            $table->foreign('ms_accounting_id')->references('id')->on('ms_accounting');
            $table->enum('status',['credit','debit']);
            $table->string('category');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_accounting');
    }
};
