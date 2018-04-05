<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable()->comment('字段名');
            $table->string('name')->nullable()->comment('字段中文名');
            $table->string('value')->nullable()->comment('字段值');
            $table->integer('post_id')->nullable()->unsigned();
            $table->index(['id', 'created_at']);
            $table->index('post_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_items');
    }
}
