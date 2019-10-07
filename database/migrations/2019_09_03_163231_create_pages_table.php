<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 200)->charset('utf8')->collation('utf8_general_ci');
            $table->string('alias')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->text('content')->charset('utf8')->collation('utf8_general_ci');
            $table->string('keywords')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->string('description')->nullable()->charset('utf8')->collation('utf8_general_ci');
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
        Schema::dropIfExists('pages');
    }
}
