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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('from_city_id')->constrained('cities');
            $table->foreignId('from_region_id')->constrained('regions');

            $table->string('from_lat')->nullable();
            $table->string('from_long')->nullable();

            $table->foreignId('to_city_id')->nullable()->constrained('cities');
            $table->foreignId('to_region_id')->nullable()->constrained('regions');
            $table->string('to_lat')->nullable();
            $table->string('to_long')->nullable();

            $table->integer('people_number');
            $table->time('go_time');
            $table->time('return_time')->nullable();

            $table->integer('ad_type')->default(1);
            $table->integer('duration');
            $table->integer('communication');
            $table->integer('service_provider');
            $table->integer('gender');


            $table->float('distance')->nullable();
            $table->float('estimated_time')->nullable();
            $table->float('price')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('company_id')->nullable()->constrained('users');
            // $table->foreignId('driver_id')->nullable()->constrained('users');

            $table->foreignId('transport_type_id')->nullable()->constrained('transport_types');

            $table->integer('status');
            $table->date('start_date')->nullable();
            $table->json('days')->nullable();

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
        Schema::dropIfExists('ads');
    }
};
