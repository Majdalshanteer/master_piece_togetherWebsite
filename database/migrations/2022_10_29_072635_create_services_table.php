<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('image');
            $table->string('image2')->default('_');
            $table->string('image3')->default('_');
            $table->string('image4')->default('_');

            $table->enum('type', ['book_unit', 'book_hr','book_m2', 'cart'])->default('book_unit');
            $table->decimal('price')->default('0');
            $table->string('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
