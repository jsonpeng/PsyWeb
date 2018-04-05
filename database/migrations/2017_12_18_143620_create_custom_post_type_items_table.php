<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomPostTypeItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_post_type_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('字段名');
            $table->string('des')->comment('字段中文');
            $table->string('type')->comment('字段类型');
            $table->integer('custom_post_type_id')->unsigned();
            $table->index(['id', 'created_at']);
            $table->index('custom_post_type_id');
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
        Schema::drop('custom_post_type_items');
    }
}
