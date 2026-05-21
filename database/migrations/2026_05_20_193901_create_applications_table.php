<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('address');

            $table->string('phone');

            $table->date('test_drive_date');

            $table->time('test_drive_time');

            $table->string('license_series');

            $table->string('license_number');

            $table->date('license_date');

            $table->string('car_brand');

            $table->string('car_model');

            $table->string('payment_type');

            $table->string('status')->default('Новая');

            $table->text('reject_reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};