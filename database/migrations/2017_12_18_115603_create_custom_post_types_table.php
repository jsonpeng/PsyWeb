<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomPostTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_post_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('自定义类型名称');
            $table->string('slug')->nullable()->comment('自定义类型别名');
            $table->string('des')->nullable()->comment('自定义类型描述');
            $table->index(['id', 'created_at']);
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
        Schema::drop('custom_post_types');
    }
}
