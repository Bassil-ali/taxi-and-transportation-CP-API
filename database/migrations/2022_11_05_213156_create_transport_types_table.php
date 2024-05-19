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
        Schema::create('transport_types', function (Blueprint $table) {
            $table->id();

            $table->text('name')->nullable();
            $table->string('slug')->nullable();
            
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->boolean('status')->default(0);

            $table->foreignIdFor(\App\Models\Admin::class)->nullable();

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
        Schema::dropIfExists('transport_types');
    }
};
