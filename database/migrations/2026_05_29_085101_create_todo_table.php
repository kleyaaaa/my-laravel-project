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
        Schema::create('todo', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('user_id');
           $table->string('product_name');
            $table->string('category');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            // set it as FK -> id from other table -> from table
            // -> onDelete will delete all records
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
