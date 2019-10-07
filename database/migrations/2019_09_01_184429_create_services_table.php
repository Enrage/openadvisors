<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id');
            $table->string('title', 200)->charset('utf8')->collation('utf8_general_ci');
            $table->string('link')->charset('utf8')->collation('utf8_general_ci');
            $table->string('alias')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->text('content')->charset('utf8')->collation('utf8_general_ci');
            $table->string('keywords')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->string('description')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->tinyInteger('order')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
