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
        Schema::create('booking_services', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('quantity');
            $table->decimal('total_price');
            $table->date('booking_date');
            $table->time('booking_time');

            $table->foreignId('worker_id')->nullable()->constrained('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('note')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->enum('status', ['Pending','confirm','not available','completed'])->default('Pending');


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
        Schema::dropIfExists('booking_services');
    }
};
