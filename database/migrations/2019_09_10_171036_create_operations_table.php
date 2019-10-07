<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('phone')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('email')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('regulate', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('operation')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
