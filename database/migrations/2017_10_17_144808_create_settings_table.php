<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->default('网站名称')->comment('网站名称');
            $table->string('key_words')->nullable()->default('')->comment('网站关键字');
            $table->string('description')->nullable()->default('')->comment('网站描述');
            $table->string('contactor')->nullable()->default('')->comment('网站联系人');
            $table->string('mobile')->nullable()->default('')->comment('手机联系方式');
            $table->string('tel')->nullable()->default('')->comment('座机联系方式');
            $table->string('tel_tousu')->nullable()->default('')->comment('投诉电话');
            $table->string('email')->nullable()->default('')->comment('邮箱');
            $table->longtext('intro')->nullable()->comment('网站介绍');
            $table->string('address')->nullable()->default('')->comment('网站地址');
            $table->string('logo')->nullable()->default('')->comment('网站LOGO');
            $table->string('weixin')->nullable()->default('')->comment('微信二维码');
            $table->string('qq')->nullable()->default('')->comment('QQ联系方式');
            $table->integer('post_page')->default(15)->comment('每页展示文章数量');
            $table->longtext('js_tongji')->nullable()->comment('js统计代码');
            $table->string('beian')->nullable()->default('')->comment('备案信息');
            $table->string('banquan')->nullable()->default('')->comment('版权信息');
            $table->tinyInteger('share')->default(0)->comment('打开社会分享功能 0 不打开 1 打开');
            $table->tinyInteger('yunlai')->default(1)->comment('显示技术支持 0 不显示 1 显示');
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
        Schema::drop('settings');
    }
}
