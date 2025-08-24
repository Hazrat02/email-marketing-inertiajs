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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            // User reference
            $table->integer('total_mail')->default(0);
            $table->decimal('total_cost', 12, 2)->default(0.00);
            $table->integer('try')->default(0);
            $table->integer('success')->default(0);

            $table->string('to_email')->nullable();
            $table->string('template')->default(0);
            $table->string('from_email')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('sub')->nullable();
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
