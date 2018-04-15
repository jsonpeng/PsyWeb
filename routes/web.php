<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//前端路由 视图
//网站首页
Route::get('/', 'FrontController@index')->name('index');
//网站分类页面 包含子分类
Route::get('cat/{id}', 'FrontController@cat')->name('category');
//网站的文章详情
Route::get('post/{id}', 'FrontController@post')->name('post');
//用户登录
Route::get('/psychology/login', 'FrontController@login')->name('login'); 
//用户注册
Route::get('psychology/reg', 'FrontController@reg')->name('reg');
//个人中心
Route::get('/usercenter/{id?}','FrontController@usercenter');
//头像替换列表
Route::get('/txlist','FrontController@txlist');


//ajax操作列表
//  ajax/collection_post/{post_id}
Route::group(['prefix'=>'ajax'],function(){
	Route::get('collection_post/{post_id}/{status?}','FrontController@collectionPost');
});

//接口请求
//这里的prefix是参数的前缀 登录和注册就用post方法吧
Route::group(['prefix' => 'auth'], function () {

	Route::get('/logout','FrontController@logout')->name('logout');

	//留言接口 
	Route::post('/messageBoard','FrontController@messageBoard');
	//登录接口
	Route::post('/login','FrontController@loginApi');
	//注册接口
	Route::post('/reg','FrontController@regApi');
	//用户上传图像接口
	Route::post('/uploads','FrontController@uploads');
	
});



//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'zcjy'], function () {
	//后台首页
	Route::get('/', 'PostController@index');
	//网站设置
	Route::patch('settings/{id}', 'SettingController@update')->name('settings.update');
	Route::get('setting/edit_pwd','SettingController@edit_pwd')->name('settings.edit_pwd');
    Route::post('setting/edit_pwd/{id}','SettingController@edit_pwd_api')->name('settings.pwd_update');
	Route::get('settings/seo', 'SettingController@seo')->name('settings.seo');
	Route::get('settings/intro', 'SettingController@intro')->name('settings.intro');
	Route::get('settings/contact', 'SettingController@contact')->name('settings.contact');
	Route::get('settings/view', 'SettingController@view')->name('settings.view');
	Route::get('settings/other', 'SettingController@other')->name('settings.other');
	//部署操作
	Route::get('helper', 'SettingController@helper')->name('settings.helper');

	//文章分类
	Route::resource('categories', 'CategoryController');
	//文章
	Route::resource('posts', 'PostController');

    //自定义文章类型
    Route::resource('customPostTypes', 'CustomPostTypeController');
    //获取所有自定义文章类型
    Route::post('getCustomType','PostController@getCustomType');
    //自定义文章详细字段
    Route::resource('{customposttype_id}/customPostTypeItems', 'CustomPostTypeItemsController');

    //自定义页面类型
    Route::resource('customPageTypes', 'CustomPageTypeController');
    //自定义页面详细字段
    Route::resource('{page_id}/pageItems', 'PageItemsController');
	//页面
	Route::resource('pages', 'PageController');
	//首页横幅
	Route::resource('banners', 'BannerController');

	Route::resource('{banner_id}/bannerItems', 'BannerItemController');

	//菜单
	Route::resource('menus', 'MenuController');
	//合作伙伴
	Route::resource('coorperators', 'CoorperatorController');
	//友情链接
	Route::resource('links', 'LinkController');
	//菜单
	Route::post('menu_items', 'MenuItemController@setMenus');
	Route::get('menu_items/add', 'MenuItemController@addItem');
	Route::get('menu_items/{menu_id}', 'MenuItemController@items');
	//留言消息
	Route::resource('messages', 'MessageController');
});




//Route::resource('postItems', 'PostItemsController');


