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
            $table->string('investor_type');
            $table->string('khmer_trading_name');
            $table->string('english_trading_name');
            $table->string('trading_acc_number')->unique();
            $table->string('investor_id')->unique();
            $table->string('security_firm_name');
            $table->string('contact');
            $table->string('email');
            $table->string('legal_entity_signature')->nullable();
            $table->string('status')->default('new');
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
