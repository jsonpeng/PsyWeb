@extends('layouts.app')

@section('css')
    <style>
        /**
         * Nestable
         */

        .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

        .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
        .dd-list .dd-list { padding-left: 30px; }
        .dd-collapsed .dd-list { display: none; }

        .dd-item,
        .dd-empty,
        .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

        .dd-handle { display: block; height: auto; margin: 5px 0; padding: 10px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #eee;
            background: #fafafa;
            -webkit-border-radius: 3px;
                    border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd-handle:hover { color: #2ea8e5; background: #fff; }

        .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 25px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
        .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
        .dd-item > button[data-action="collapse"]:before { content: '-'; }

        .dd-placeholder,
        .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
        .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                                 -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                                      linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
        .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
                    box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        }

        /**
         * Nestable Extras
         */

        .nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

        #nestable-menu { padding: 0; margin: 20px 0; }

        #nestable-output,
        #nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background:         linear-gradient(top, #bbb 0%, #999 100%);
        }
        #nestable2 .dd-handle:hover { background: #bbb; }
        #nestable2 .dd-item > button:before { color: #fff; }

        @media only screen and (min-width: 700px) {

            .dd { float: left; width: 70%; }
            .dd + .dd { margin-left: 2%; }

        }

        .dd-hover > .dd-handle { background: #2ea8e5 !important; }

        /**
         * Nestable Draggable Handles
         */

        .dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
                    border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd3-content:hover { color: #2ea8e5; background: #fff; }

        .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

        .dd3-item > button { margin-left: 30px; }

        .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:         linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
        .dd3-handle:hover { background: #ddd; }

        .edit-button{position: absolute; right: -30px; top:15px;}
        .demo-block{
            overflow: hidden;
            float: left;
            width: 100%;
            max-width: 350px;
        }
        .menu-list{
            list-style: none; padding-left: 15px;
        }
        .menu-list li{
            padding: 10px 0;
            position: relative;
        }
        .menu-list li span{
            position: absolute;
            right: 3px;
            top: 5px;
            border: 1px solid #ddd;
            padding: 3px 15px;
            border-radius: 3px;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            菜单： {{$menu->name}}
        </h1>
    </section>
    <div class="content">
        
        <div id="menu" class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body">
                        <el-collapse v-model="activeName" accordion>
                            <el-collapse-item title="首页" name="1">
                                <el-form>
                                    <el-form-item>
                                        <el-button @click="addIndexMenu">添加首页</el-button>
                                    </el-form-item>
                                </el-form>
                            </el-collapse-item>
                            <el-collapse-item title="分类" name="2">
                                <ul class="menu-list">
                                    @foreach($cats as $cat)
                                    <li>{{ $cat->name }} <span @click="addCatMenu('{{ $cat->name }}', {{ $cat->id }})">添加</span></li>
                                    @endforeach
                                </ul>
                            </el-collapse-item>
                            <el-collapse-item title="页面" name="3">
                                <ul class="menu-list">
                                    @foreach($pages as $page)
                                    <li>{{ $page->name }} <span @click="addPageMenu('{{ $page->name }}', {{ $page->id }})">添加</span></li>
                                    @endforeach
                                </ul>
                            </el-collapse-item>
                            <el-collapse-item title="自定义" name="4">
                                <div style="overflow: hidden;">
                                    <div class="demo-block">
                                        <el-form>
                                            <div style="overflow: hidden;">
                                            <el-form-item label="菜单名称">
                                                <el-input v-model="name"></el-input>
                                            </el-form-item>
                                            <el-form-item label="链接地址">
                                                <el-input v-model="link"></el-input>
                                            </el-form-item>
                                            </div>
                                            <el-form-item>
                                                <el-button type="primary" @click="addNewMenu">立即创建</el-button>
                                                <el-button @click="cancelNewMenu">清除</el-button>
                                            </el-form-item>
                                        </el-form>
                                    </div>
                                </div>
                            </el-collapse-item>
                        </el-collapse>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body">
                        <div style="overflow: hidden;">
                            <div class="demo-block">
                                <div class="dd">
                                    <ol class="dd-list">
                                        <menu-item :menuitem='item' v-for="item in menu"></menu-item>
                                    </ol>
                                </div>
                            </div>
                            <div class="demo-block" v-if="show_eidt_menu">
                                <el-form>
                                    <div style="overflow: hidden;">
                                    <el-form-item label="链接名称" style="">
                                        <el-input v-model="edit_name"></el-input>
                                    </el-form-item>
                                    <el-form-item label="链接地址" style="">
                                        <el-input v-model="edit_link"></el-input>
                                    </el-form-item>
                                    </div>
                                    <el-form-item>
                                        <el-button type="primary" @click="saveEditMenu">保存</el-button>
                                        <el-button @click="cancelEditMenu">取消</el-button>
                                        <el-button type="danger" @click="deleteEditMenu">删除</el-button>
                                    </el-form-item>
                                </el-form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <el-button type="primary" @click="saveMenus">保存菜单</el-button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
<!-- 添加一级菜单 -->
    <template id="menu-item">
        <li class="dd-item" :data-id="menuitem.id">
            <div class="dd-handle" >@{{menuitem.name}}</div> <div class="edit-button" @click="editMenuItem">编辑</div>
            <ol class="dd-list">
                <menu-item v-if="menuitem.children" :menuitem='item' v-for="item in menuitem.children"></menu-item>
            </ol>
        </li>
    </template>

    <script type="text/javascript">

        //深度克隆
        function deepClone(obj){
            var result,oClass=isClass(obj);
                //确定result的类型
            if(oClass==="Object"){
                result={};
            }else if(oClass==="Array"){
                result=[];
            }else{
                return obj;
            }
            for(key in obj){
                var copy=obj[key];
                if(isClass(copy)=="Object"){
                    result[key]=arguments.callee(copy);//递归调用
                }else if(isClass(copy)=="Array"){
                    result[key]=arguments.callee(copy);
                }else{
                    result[key]=obj[key];
                }
            }
            return result;
        }
        //返回传递给他的任意对象的类
        function isClass(o){
            if(o===null) return "Null";
            if(o===undefined) return "Undefined";
            return Object.prototype.toString.call(o).slice(8,-1);
        }

        //菜单栏
        Vue.component('menu-item', {
            template: "#menu-item",
            props: ['menuitem'],
            data: function() {
                return {name: ''}
            },
            methods: {
                editMenuItem: function (e) {
                    //console.log(this.menuitem.id);
                    Event.$emit("edit_menuitem", this.menuitem.id);
                }
            }
        })

        var Event = new Vue();

        var app = new Vue({
            el: '#menu',
            components: {
            },
            data: {
                menu_id: {{$menu->id}},
                //show_add_menu: false,
                show_eidt_menu: false,
                name: '',
                link: '',

                //缩进菜单
                menu: [],
                //备份菜单,防止数据操作对menu造成影响
                menu_copy: [],
                //用户操作后的菜单，用户像后台更新数据
                updateMenu: [],
                //无子节点菜单
                unsortMenus: [],

                edit_name: '',
                edit_link: '',
                edit_id: null,
                activeName: '1',
            },
            mounted: function () {
                var _self=this;
                $.ajax({
                    url:'/zcjy/menu_items/{{$menu->id}}',   //获取菜单信息
                    type:'GET', //GET
                    async:true,    //或false,是否异步
                    timeout:5000,    //超时时间
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    beforeSend:function(xhr){
                    },
                    success:function(data,textStatus,jqXHR){
                        if (data.code == 0) {
                            _self.menu = data.message;
                            _self.menu_copy = deepClone(data.message);
                            _self.updateMenu = deepClone(data.message);

                            setTimeout(function(){
                                $('.dd').nestable({ maxDepth: 3 }).on('change', function(e){
                                    //return;
                                    var menu_order = $('.dd').nestable('serialize');
                                    //最多三级菜单
                                    _self.updateMenu = [];
                                    _self.unsortMenus = [];
                                    _self.unsortMenu(_self.menu_copy);

                                    for (var i = 0; i < menu_order.length; i++) {
                                        _self.resortMenu(menu_order[i], i, _self.updateMenu);
                                    }
                                });
                            }, 500);
                        }else{
                            alert(data.message);
                        }
                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                    }
                });

                Event.$on("edit_menuitem", function (id) { 
                    _self.edit_id = id;
                    _self.unsortMenu(deepClone(_self.menu));
                    //console.log(_self.unsortMenus);
                    for (var i = 0; i < _self.unsortMenus.length; i++) {
                        if(_self.unsortMenus[i].id == id){
                            _self.edit_name = _self.unsortMenus[i].name;
                            _self.edit_link = _self.unsortMenus[i].link;
                        }
                    }
                    _self.show_eidt_menu = true;
                });
            },
            methods: {
                addNewMenu : function (e) {
                    this.addMenu(this.menu_id, this.name, this.link);
                },
                addIndexMenu: function (e) {
                    this.addMenu(this.menu_id, '首页', window.location.host);
                },
                addCatMenu: function (name, index) {
                    this.addMenu(this.menu_id, name, window.location.host+'/cat/'+index);
                },
                addPageMenu: function (name, index) {
                    this.addMenu(this.menu_id, name, window.location.host+'/page/'+index);
                },
                cancelNewMenu: function (e) {
                    //this.show_add_menu = false;
                    this.name = '';
                    this.link = '';
                },
                showAddMenu: function (e) {
                    //this.show_add_menu = true;
                },
                addMenu: function (menu_id, menu_name, menu_link) {
                    var _self=this;
                    $.ajax({
                        url:'/zcjy/menu_items/add?menu_id='+menu_id+'&name='+menu_name+'&link='+menu_link,   //获取菜单信息
                        type:'GET', //GET
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                        beforeSend:function(xhr){
                        },
                        success:function(data,textStatus,jqXHR){
                            if (data.code == 0) {
                                _self.menu.push(data.message);
                                _self.updateMenu.push(data.message);
                                _self.menu_copy.push(data.message);
                                //_self.show_add_menu = false;
                                _self.name = '';
                                _self.link = '';

                                _self.$message({
                                  message: '菜单添加成功',
                                  type: 'success'
                                });
                            }else{
                                alert(data.message);
                            }
                        },
                        error:function(xhr,textStatus){
                        },
                        complete:function(){
                        }
                    });
                },
                saveEditMenu: function (e) {
                    this.updateMenuInfo(this.menu, this.edit_id, this.edit_name, this.edit_link);
                    this.updateMenuInfo(this.updateMenu, this.edit_id, this.edit_name, this.edit_link);
                    console.log(this.updateMenu);
                    this.show_eidt_menu = false;
                },
                saveMenus: function (e) {
                    var _self=this;
                    $.ajax({
                        url:'/zcjy/menu_items',   //获取菜单信息
                        type:'POST', //GET
                        data: {'menu': _self.updateMenu},
                        async:true,    //或false,是否异步
                        timeout:5000,    //超时时间
                        dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                        beforeSend:function(xhr){
                        },
                        success:function(data,textStatus,jqXHR){
                            _self.$message({
                              message: '菜单保存成功',
                              type: 'success'
                            });
                        },
                        error:function(xhr,textStatus){
                        },
                        complete:function(){
                        }
                    });
                },
                cancelEditMenu: function (e) {
                    this.show_eidt_menu = false;
                },
                deleteEditMenu: function (e) {
                    //this.deleteMenuInfo(this.menu, this.edit_id);
                    this.deleteMenuInfo(this.updateMenu, this.edit_id);
                    this.show_eidt_menu = false;
                },
                updateMenuInfo: function (menu, id, name, link) {
                    for (var i = 0; i < menu.length; i++) {
                        if(menu[i].id == id){
                            menu[i].name = name;
                            menu[i].link = link;
                            break;
                        }
                        if (menu[i].children != undefined && menu[i].children.length > 0) {
                            this.updateMenuInfo(menu[i].children, id, name, link);
                        }
                    }
                },
                deleteMenuInfo: function (menu, id) {
                    for (var i = 0; i < menu.length; i++) {
                        if (menu[i].children != undefined && menu[i].children.length > 0) {
                            this.deleteMenuInfo(menu[i].children, id);
                        }
                        if(menu[i].id == id){
                            menu.splice(i, 1);
                            //main menu的结构不一样
                            this.deleteMainMenu(this.menu, id);
                            console.log('update menu');
                            console.log(this.menu);
                            break;
                        }
                    }
                },
                deleteMainMenu: function (menus, id) {
                    for (var i = 0; i < menus.length; i++) {
                        if (menus[i].children != undefined && menus[i].children.length > 0) {
                            this.deleteMainMenu(menus[i].children, id);
                        }
                        if(menus[i].id == id){
                            menus.splice(i, 1);
                            console.log('menu');
                            console.log(this.menu);
                            break;
                        }
                    }
                },
                unsortMenu: function (menus) {
                    for (var i = 0; i < menus.length; i++) {
                        if (menus[i].children != undefined && menus[i].children.length > 0) {
                            this.unsortMenu(menus[i].children);
                            delete menus[i].children;
                        }
                        this.unsortMenus.push(menus[i]);
                    }
                },
                resortMenu: function (menu_item, index, parent) {
                    //处理当前排序
                    var mark = false;
                    for (var t1 = 0; t1 < this.unsortMenus.length; t1++) {
                        if (this.unsortMenus[t1].id == menu_item.id) {
                            //排序
                            this.unsortMenus[t1].sort = index;
                            parent[index] = this.unsortMenus[t1];
                            mark = true;
                            break;
                        }
                    }

                    //子菜单
                    if (mark && menu_item.children != undefined && menu_item.children.length > 0) {
                        parent[index].children = [];
                        for (var j = 0; j < menu_item.children.length; j++) {
                            this.resortMenu(menu_item.children[j], j, parent[index].children);
                        }
                    }
                }
            }
        });
    </script>
@endsection