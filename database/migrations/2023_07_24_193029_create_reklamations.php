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
        Schema::create('reklamations', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->string('description');
            $table->timestamp('created_date');
            $table->enum('status', ['new', 'in work', 'closed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
