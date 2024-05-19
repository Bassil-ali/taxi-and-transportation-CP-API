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
        Schema::create('financial_movements', function (Blueprint $table) {
            $table->id();

            $table->string('transaction_number')->unique();
            $table->float('amount');
            $table->integer('type');
            $table->string('impact');
            $table->string('description')->nullable();

            $table->foreignId('wallet_id')->constrained('wallets')->onDelete('restrict');
            $table->foreignId('ad_id')->nullable()->constrained('ads');
            $table->foreignId('trip_id')->nullable()->constrained('trips');
            $table->foreignId('admin_id')->nullable()->constrained('admins');
            $table->string('payment_id')->nullable();

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
        Schema::dropIfExists('financial_movements');
    }
};
