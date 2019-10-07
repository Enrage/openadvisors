<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->charset('utf8')->collation('utf8_general_ci');
            $table->string('alias', 150)->charset('utf8')->collation('utf8_general_ci');
            $table->string('author', 200)->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->string('source')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->text('content')->charset('utf8')->collation('utf8_general_ci');
            $table->string('keywords')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->string('description')->nullable()->charset('utf8')->collation('utf8_general_ci');
            $table->string('img_src')->charset('utf8')->collation('utf8_general_ci');
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
        Schema::dropIfExists('posts');
    }
}
