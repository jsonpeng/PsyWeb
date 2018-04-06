<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Banner;
use App\Models\Page;
use Illuminate\Filesystem\Filesystem;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        DB::table('categories')->delete();

        //分类添加
        
        #默认的小小白
        $categories = Category::create([
            'name' => '小小白',
            'slug' => 'xiao-xiao-bai'
        ]);

        #大学成长
        $UniversityGrowth = Category::create([
            'name' => '大学成长',
            'slug' => 'UniversityGrowth'
        ]);

        //大学成长的子分类
        
        #学习心理
        $LearnPsychogy=Category::create([
            'name' => '学习心理',
            'slug' => 'LearnPsychogy',
            'parent_id'=>$UniversityGrowth->id
        ]);

        #恋爱心理
        $LovePsychogy=Category::create([
            'name' => '恋爱心理',
            'slug' => 'LovePsychogy',
            'parent_id'=>$UniversityGrowth->id
        ]);

        #校园社交
        $CampusAssocia=Category::create([
            'name' => '校园社交',
            'slug' => 'CampusAssocia'
        ]);

        //校园社交的子分类
        
        #舍友关系
        $RoommateRelation=Category::create([
            'name' => '舍友关系',
            'slug' => 'RoommateRelation',
            'parent_id'=>$CampusAssocia->id

        ]);

        #同学关系
        $ClassmateRelation=Category::create([
            'name' => '同学关系',
            'slug' => 'ClassmateRelation',
            'parent_id'=>$CampusAssocia->id
        ]);

        #师生关系
        $teacherRelation=Category::create([
            'name' => '师生关系',
            'slug' => 'teacherRelation',
            'parent_id'=>$CampusAssocia->id
        ]);

        #每日心理学
        $Psychology=Category::create([
            'name' => '每日心理学',
            'slug' => 'Psychology'
        ]);

        //每日心理学的子分类
        

        #心理测评
        $PsychologyTest=Category::create([
            'name' => '心理测评',
            'slug' => 'PsychologyTest',
            'parent_id'=>$Psychology->id
        ]);

        #心理指导
        $PsychologyGuide=Category::create([
            'name' => '心理指导',
            'slug' => 'PsychologyGuide',
            'parent_id'=>$Psychology->id
        ]);

        #心灵鸡汤
        $ChickenSoup=Category::create([
            'name' => '心灵鸡汤',
            'slug' => 'ChickenSoup'
        ]);

        //菜单添加
        $Menu=Menu::create([
             'name' => '顶部菜单',
             'slug' => 'main',
            ]);


        //横幅添加
        $banner=Banner::create([
            'name' => '首页轮播图',
             'slug' => 'main',
            ]);



        //默认的sql 包括banner和menu
        $fileSystem = new Filesystem();
        $database = $fileSystem->get(base_path('database/seeds/default_sql') . '/' . 'default.sql');
        DB::connection()->getPdo()->exec($database);
    }
}
