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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('register_id')->constrained();
            $table->string('investor_type');
            $table->string('khmer_trading_name');
            $table->string('english_trading_name');
            $table->string('trading_acc_number')->unique();
            $table->string('investor_id')->unique();
            $table->string('security_firm_name');
            $table->string('contact');
            $table->string('email');
            $table->string('signature_attach')->nullable();
            $table->string('status')->default('new');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('subscribers');
    }
};
