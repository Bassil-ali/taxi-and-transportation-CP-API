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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ad_id')->nullable()->constrained('ads');
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('company_id')->nullable()->constrained('users');
            $table->foreignId('driver_id')->nullable()->constrained('users');

            $table->float('price');
            $table->float('dues');
            $table->date('date');
            $table->time('go_time');

            $table->foreignId('from_city_id')->constrained('cities');
            $table->foreignId('from_region_id')->constrained('regions');

            $table->foreignId('to_city_id')->nullable()->constrained('cities');
            $table->foreignId('to_region_id')->nullable()->constrained('regions');

            $table->string('from_lat')->nullable();
            $table->string('from_long')->nullable();

            $table->string('to_lat')->nullable();
            $table->string('to_long')->nullable();

            $table->integer('status')->default(1);
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
        Schema::dropIfExists('trips');
    }
};
