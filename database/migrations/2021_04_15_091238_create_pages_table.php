<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_category_id');
            $table->string('url');

            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('content')->nullable();
            $table->string('type')->nullable();
            $table->string('position')->nullable();
            $table->string('order')->nullable();
            $table->string('total_views')->default('0');
            $table->string('last_date');
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
        Schema::dropIfExists('pages');
    }
}
