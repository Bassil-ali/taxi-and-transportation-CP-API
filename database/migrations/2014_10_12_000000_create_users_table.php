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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('image')->nullable();
            $table->integer('type');
            $table->integer('status')->default(0);
            $table->foreignId('city_id')->nullable()->constrained('cities');

            $table->string('token_firebase')->nullable();

            $table->string('id_number')->nullable()->unique();
            $table->foreignId('parent_id')->nullable()->constrained('users');

            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_color')->nullable();

            $table->string('plate_number')->nullable();
            $table->integer('seats_numbers')->nullable();

            $table->string('password');
            $table->string('auth_code')->nullable();
            $table->string('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
