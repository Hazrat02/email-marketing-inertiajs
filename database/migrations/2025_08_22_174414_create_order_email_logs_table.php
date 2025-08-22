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
        Schema::create('order_email_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();   // Order reference
            $table->unsignedBigInteger('user_id')->index();    // User reference
            $table->string('email')->index();                  // Email address
            $table->enum('status', ['pending', 'sent', 'failed'])->index(); // Track status
            $table->text('response')->nullable();             // Store error messages
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
        Schema::dropIfExists('order_email_logs');
    }
};
