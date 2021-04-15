<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('project_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('domain_id')->default('0');
            $table->foreignId('biolink_id')->nullable();
            $table->string('type');
            $table->string('subtype')->nullable();
            $table->string('location_url')->nullable();
            $table->string('click')->default('0');
            $table->longText('settings');
            $table->string('order');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('is_enabled')->default('1');
          
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
        Schema::dropIfExists('links');
    }
}
