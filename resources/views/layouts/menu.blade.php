<li class="">
    <a href="/" target="_blank"><i class="fa fa-home"></i><span>网站首页</span></a>
</li>

<li class="{{ Request::is('zcjy/banners*') ? 'active' : '' }}">
    <a href="{!! route('banners.index') !!}"><i class="fa fa-object-group"></i><span>横幅</span></a>
</li>

<li class="treeview @if(Request::is('zcjy/categories*') || Request::is('zcjy/posts*') || Request::is('zcjy/customPostTypes') || Request::is('zcjy/*/customPostTypeItems*')) active @endif " >
	<a href="#">
		<i class="fa fa-pie-chart"></i>
		<span>文章管理</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li class="{{ Request::is('zcjy/categories*') ? 'active' : '' }}">
		    <a href="{!! route('categories.index') !!}"><i class="fa fa-bars"></i><span>分类</span></a>
		</li>

		<li class="{{ Request::is('zcjy/posts*') ? 'active' : '' }}">
		    <a href="{!! route('posts.index') !!}"><i class="fa fa-newspaper-o"></i><span>文章</span></a>
		</li>

		</li><li class="{{ Request::is('zcjy/customPostTypes*') || Request::is('zcjy/*/customPostTypeItems*') ? 'active' : '' }}">
		    <a href="{!! route('customPostTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义文章类型</span></a>
		</li>

	</ul>
</li>

<!-- <li class="treeview @if(Request::is('zcjy/pages*') || Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')) active @endif">
    <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>页面管理</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('zcjy/pages*') ? 'active' : '' }}">
            <a href="{!! route('pages.index') !!}"><i class="fa fa-newspaper-o"></i><span>页面</span></a>
        </li>
        <li class="{{ Request::is('zcjy/customPageTypes*') ||  Request::is('zcjy/*/pageItems*')  ? 'active' : '' }}">
            <a href="{!! route('customPageTypes.index') !!}"><i class="fa fa-calendar-plus-o"></i><span>自定义页面类型</span></a>
        </li>
    </ul>
</li> -->


<li class="{{ Request::is('zcjy/menus*') ? 'active' : '' }}">
    <a href="{!! route('menus.index') !!}"><i class="fa fa-cog"></i><span>菜单设置</span></a>
</li>

<!-- <li class="treeview @if(Request::is('zcjy/settings*')) active @endif " >
	<a href="#">
		<i class="fa fa-cog"></i>
		<span>网站设置</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li class="@if(Request::is('zcjy/settings/seo')) active @endif"><a href="/zcjy/settings/seo"><i class="fa fa-circle-o"></i>SEO</a></li>
		<li class="@if(Request::is('zcjy/settings/intro')) active @endif"><a href="/zcjy/settings/intro"><i class="fa fa-circle-o"></i>网站介绍</a></li>
		<li class="@if(Request::is('zcjy/settings/contact')) active @endif"><a href="/zcjy/settings/contact"><i class="fa fa-circle-o"></i>联系方式</a></li>
		<li class="@if(Request::is('zcjy/settings/view')) active @endif"><a href="/zcjy/settings/view"><i class="fa fa-circle-o"></i>浏览设置</a></li>
		<li class="@if(Request::is('zcjy/settings/other')) active @endif"><a href="/zcjy/settings/other"><i class="fa fa-circle-o"></i>其他设置</a></li>
	</ul>
</li> -->

<!-- <li class="treeview @if(Request::is('zcjy/coorperators*') || Request::is('zcjy/links*')) active @endif " >
	<a href="#">
		<i class="fa fa-cog"></i>
		<span>其他设置</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li class="{{ Request::is('zcjy/coorperators*') ? 'active' : '' }}">
		    <a href="{!! route('coorperators.index') !!}"><i class="fa fa-circle-o"></i><span>合作伙伴</span></a>
		</li>

		<li class="{{ Request::is('zcjy/links*') ? 'active' : '' }}">
		    <a href="{!! route('links.index') !!}"><i class="fa fa-circle-o"></i><span>友情链接</span></a>
		</li>
	</ul>
</li>
 -->


<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{!! route('messages.index') !!}"><i class="fa fa-edit"></i><span>心事吐槽</span></a>
</li>

<!-- <li class="{{ Request::is('helper*') ? 'active' : '' }}">
    <a href="{!! route('settings.helper') !!}"><i class="fa fa-edit"></i><span>后台操作说明</span></a>
</li>
 -->

