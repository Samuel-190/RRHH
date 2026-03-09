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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('collaborator_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('contract_type');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('position');
            $table->decimal('salary', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
