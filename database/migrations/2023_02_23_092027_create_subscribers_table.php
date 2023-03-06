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
            $table->id();
            $table->foreignId('register_id')->constrained()->cascadeOnDelete();    
            $table->string('khmer_name');
            $table->string('english_name');
            $table->string('email');
            $table->string('dob');
            $table->string('investor_type');
            $table->string('khmer_trading_name');
            $table->string('english_trading_name');
            $table->string('investor_id')->unique();
            $table->string('trade_acc_number')->unique();
            $table->string('trading_acc_security_firm');
            $table->string('contact');
            $table->string('legal_entity_signature')->nullable();
            $table->string('subscriber_status');
            $table->text('comment')->nullable();
            $table->string('user_id')->nullable();
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
