<style>
    nav i {
        font-size: 20px !important;
    }
</style>
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			 {{-- <a href="{{route('home')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a> --}}
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		{{-- <div class="logo-icon-wrapper"><a href="{{route('home')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div> --}}
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						{{-- <a href="{{route('home')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a> --}}
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('lang.General') }} </h6>
                     		<p class="lan-2">{{ trans('lang.general_routes') }}</p>
						</div>
					</li>
					<li class="sidebar-list">
                        {{-- start Store --}}
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/stores' ? 'active' : '' }}" href="#"><i class="fa fa-map-marker p-r-5"></i><span class="lan-6">{{ trans('lang.store') }}</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == 'stores' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/stores' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ \Illuminate\Support\Facades\Route::currentRouteName()==route('stores.index') ? 'active' : '' }}" href="{{route('stores.index')}}">{{ trans('lang.stores') }}</a></li>
                            <li><a class="lan-4 {{ \Illuminate\Support\Facades\Route::currentRouteName()==route('stores.create') ? 'active' : '' }}" href="{{route('stores.create')}}">{{ trans('lang.create_store') }}</a></li>
                        </ul>
                        {{-- end Store --}}
						{{-- start category --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/categories' ? 'active' : '' }}" href="#"><i class="fa fa-map-marker p-r-5"></i><span class="lan-6">{{ trans('lang.category') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == 'categories' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/categories' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ \Illuminate\Support\Facades\Route::currentRouteName()==route('categories.index') ? 'active' : '' }}" href="{{route('categories.index')}}">{{ trans('lang.categories') }}</a></li>
							<li><a class="lan-4 {{ \Illuminate\Support\Facades\Route::currentRouteName()==route('categories.create') ? 'active' : '' }}" href="{{route('categories.create')}}">{{ trans('lang.create_category') }}</a></li>
						</ul>
						{{-- end category --}}
					</li>
                </ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
