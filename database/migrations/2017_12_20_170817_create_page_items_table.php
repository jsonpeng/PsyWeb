<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePageItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable()->comment('字段名');
            $table->string('name')->nullable()->comment('字段中文名');
            $table->string('value')->nullable()->comment('字段值');
            $table->string('type')->comment('类型');
            $table->integer('page_id')->nullable()->unsigned();
            $table->integer('custom_page_types_id')->nullable();
            $table->index(['id', 'created_at']);
            $table->index('page_id');
            $table->index('custom_page_types_id');
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
        Schema::drop('page_items');
    }
}
