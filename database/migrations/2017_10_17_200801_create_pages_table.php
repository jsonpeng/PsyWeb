<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('name')->default('')->comment('文章标题');
            $table->string('slug')->default('')->comment('别名');
            $table->longtext('content')->nullable()->comment('正文');
            $table->integer('view')->default(1)->comment('浏览量');
            $table->string('seo_title')->nullable()->default('')->comment('seo标题');
            $table->string('seo_keyword')->nullable()->default('')->comment('SEO关键词');
            $table->string('seo_des')->nullable()->default('')->comment('SEO描述');
            $table->tinyInteger('status')->default(0)->comment('文章状态 0 草稿 1 发布');
            $table->string('image')->nullable()->default('')->comment('封面图片');
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
        Schema::drop('pages');
    }
}
