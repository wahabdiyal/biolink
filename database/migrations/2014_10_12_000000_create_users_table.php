<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('billing')->nullable();
            $table->string('api_key')->nullable();
            $table->string('token_code')->nullable();
           
            $table->string('one_time_login_code')->nullable();
            $table->string('pending_email')->nullable();
            
            $table->string('lost_password_code')->nullable();
          
            $table->string('type')->default(0);
            $table->string('active')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('plan_expiration_date')->nullable();
            $table->string('plan_settings')->nullable();
            $table->string('plan_trial_done')->nullable();
            $table->string('payment_subscription_id')->nullable();
            $table->string('language')->default('english');
 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
