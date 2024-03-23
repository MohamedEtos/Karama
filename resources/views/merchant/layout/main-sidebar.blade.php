<!-- main-sidebar -->
		<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ">
			<div class="main-sidebar-header active 	">
				<a class="desktop-logo logo-light active" href="{{url('merchant/merchant' ) }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{url('merchant/merchant' ) }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('merchant/merchant' ) }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('merchant/merchant' ) }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu ">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::User()->name}}</h4>
							<span class="mb-0 text-muted">
								@if (Auth::User()->subtype == 'admin')
									{{'مدير'}}
								@elseif (Auth::User()->subtype == 'merchant')
									{{'تاجر'}}
								@else
									{{'مستخدم'}}
								@endif
							</span>
						</div>
					</div>
				</div>
				<ul class="side-menu text-white">
					{{-- <li class="side-item side-item-category">Main</li> --}}
					<li class="slide">
						<a class="side-menu__item" href="{{ url('merchant/merchant') }}"><span class="side-menu__label"> <i class="fa-solid fa-house  fa-xl"></i> &nbsp; الرئيسيه</span><span class="badge badge-success side-badge">1</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('MarketProfile/'.Auth::User()->id) }}"><span class="side-menu__label"> <i class="fa-solid fa-pager fa-xl"></i> &nbsp; صفحه المتجر</span><span class="badge badge-success side-badge"></span></a>
					</li>



                    <li class="side-item side-item-category">المنتجات </li>
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label">  <i class="fa-solid fa-box fa-xl"></i> &nbsp;  المنتجات</span><i class="angle fe fe-chevron-down"> </i><span class="badge badge-success side-badge">1</span></a>
						<ul class="slide-menu">
                            <li><a class="slide-item" href="{{ url('merchant/new-product') }}">اضافه منتج</a></li>
                            <li> <a class="slide-item" href="{{ url('merchant/list-product') }}">تعديل المنتجات</a> </li>


						</ul>
					</li>

                    <li class="side-item side-item-category">النقاط </li>
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label">  <i class="fa fa-arrow-right-arrow-left  fa-xl"></i> &nbsp;  النقاط</span><i class="angle fe fe-chevron-down"> </i><span class="badge badge-success side-badge">1</span></a>
						<ul class="slide-menu">
                            <li><a class="slide-item" href="{{ url('merchant/UserPoints') }}">عمليه شراء</a></li>
                            <li> <a class="slide-item" href="{{ url('merchant/exchangePointsView') }}">استبدال نقاط</a> </li>
                            <li> <a class="slide-item" href="{{ url('merchant/settingPoints') }}"> اعدادات النقاط</a> </li>


						</ul>
					</li>


					<li class="side-item side-item-category">الملف الشخصي</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-solid fa-user fa-xl"></i> &nbsp; الملف الشخصي</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('merchant/profileDetials') }}">البينات الاساسيه</a></li>
							<li><a class="slide-item" href="{{ url('merchant/editProfile') }}">كلمه المرور</a></li>

						</ul>
                    </li>


					<li class="slide">
						<a class="side-menu__item" target="_blank" href="https://www.m.me/111740458640912"><span class="side-menu__label"> <i class="fa-solid fa-headset fa-xl"></i> &nbsp; تواصل معنا </span><span class="badge badge-success side-badge"></span></a>
					</li>


				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
