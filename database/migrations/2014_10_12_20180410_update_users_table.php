<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            //用户头像
            // $table->string('head_image')->nullable()->comment('用户头像');
            // $table->string('bg_image')->nullable()->comment('个人中心背景图片');
            //性别
            // $table->enum('sex',['男','女'])->default('男')->comment('性别');
            // //生日,选择年月日后自动匹配星座
            // $table->date('birthday')->nullable()->comment('生日');
            // $table->string('xingzuo')->nullable()->comment('星座');
            // //兴趣爱好
            // $table->string('like')->nullable()->comment('兴趣爱好');
            // //座右铭
            // $table->string('motto')->nullable()->comment('座右铭');
            // //所在地 
            // $table->string('addresss')->nullable()->comment('所在地');
            // //职业
            // $table->string('job')->nullable()->comment('职业');
            
            $table->enum('type',['管理员','用户'])->default('用户')->comment('用户类型');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
    }
}
