@if ($page == 'index')
	<style type="text/css">
		.nav>li>a{padding-left: 0; padding-right: 0;}
		.nav>li{margin: 0 15px;}
	</style>
@else
	<style type="text/css">
		.navbar{margin-bottom: 0;}
		@media (min-width: 768px){
			.navbar-nav>li>a {
			    padding-top: 30px;
			    padding-bottom: 30px;
			}
		}
		
	</style>
@endif


<nav class="navbar navbar-default" id="header-nav">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">@if($page == 'index')<img src="{{ asset('images/index/logo.png') }}"> @else <img src="{{ asset('images/index/logo2.png') }}"> @endif</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@foreach ($menus as $menu)
					@if ($menu->children->count())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->name}}<span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach ($menu->children as $child)
									@if ($child->children->count())
										<li class="dropdown-submenu dropdown">
											<a href="#">{{$child->name}}</a>
											<ul class="dropdown-menu">
												@foreach ($child->children as $grandchild)
													<li><a href="{{$grandchild->link}}">{{$grandchild->name}}</a></li>
												@endforeach
											</ul>
										</li>
									@else
										<li><a href="{{$child->link}}">{{$child->name}}</a></li>
									@endif
								@endforeach
							</ul>
						</li>
					@else
						<li><a href="{{$menu->link}}">{{$menu->name}}</a></li>
					@endif
				@endforeach
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>