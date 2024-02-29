<!-- main-sidebar -->
		<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ">
			<div class="main-sidebar-header active 	">
				<a class="desktop-logo logo-light active" href="{{ url('admin/dashboard') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('admin/dashboard') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('admin/dashboard') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('admin/dashboard') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu ">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}" class="avatar avatar-xl brround" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}"><span class="avatar-status profile-status bg-green"></span>
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
						<a class="side-menu__item" href="{{ url('admin/dashboard') }}"><span class="side-menu__label"> <i class="fa-solid fa-house  fa-xl"></i> &nbsp; الرئيسيه</span><span class="badge badge-success side-badge">1</span></a>
					</li>
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-solid fa-pen-to-square  fa-xl"></i> &nbsp;  الاقسام</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('all.category') }}">اضافه قسم</a></li>

						</ul>
					</li>

					<li class="side-item side-item-category">المتاجر</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('admin/registerStore') }}"><span class="side-menu__label"> <i class="fa-solid fa-store fa-xl"></i> &nbsp; اضافه متجر</span><span class="badge badge-danger side-badge"></span></a>
						<a class="side-menu__item" href="{{ url('admin/merchant') }}"><span class="side-menu__label"> <i class="fa-solid fa-store "></i> &nbsp; عرض المتاجر</span><span class="badge badge-danger side-badge"></span></a>

					</li>
					<li class="side-item side-item-category">الاشتراكات</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('admin/registerUserView') }}"><span class="side-menu__label"> <i class="fa-solid fa-user fa-xl"></i> &nbsp; اضافه عضو</span><span class="badge badge-danger side-badge"></span></a>
						<a class="side-menu__item" href="{{ route('all.user') }}"><span class="side-menu__label"> <i class="fa-solid fa-user "></i> &nbsp; الاعضاء</span><span class="badge badge-danger side-badge"></span></a>

					</li>
					<li class="side-item side-item-category">المنتجات </li>
					<li class="slide">
						<a class="side-menu__item" href="{{ route('allProducts') }}"><span class="side-menu__label"> <i class="fa-solid fa-box fa-xl"></i> &nbsp; جدول المنتجات</span><span class="badge badge-danger side-badge"></span></a>
						<a class="side-menu__item" href="{{Route('reviewAllProudcts')}}"><span class="side-menu__label"> <i class="fa-solid fa-receipt"></i> &nbsp; المراجعه</span><span class="badge badge-danger side-badge"></span>
                                @if(!empty($reviewproduct))
                                <span class="badge badge-success side-badge"> {{ count($reviewproduct) }} </span>
                            @else
                            @endif
                        </a>
						<a class="side-menu__item" href="{{ route('acceptedProudcts') }}"><span class="side-menu__label"> <i class="fa-regular fa-circle-check"></i> &nbsp; منتجات مقبوله</span><span class="badge badge-danger side-badge"></span></a>
						<a class="side-menu__item" href="{{ route('rejectedProudcts') }}"><span class="side-menu__label"> <i class="fa-regular fa-circle-xmark"></i> &nbsp; منتجات مرفوضه</span><span class="badge badge-danger side-badge"></span></a>

					</li>
					<li class="side-item side-item-category">النقاط</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ route('pointsOperations') }}"><span class="side-menu__label"> <i class="fa-brands fa-pinterest-p fa-xl"></i> &nbsp;سجل النقاط</span><span class="badge badge-danger side-badge"></span></a>
						<a class="side-menu__item" href="{{Route('addPoints')}}"><span class="side-menu__label"> <i class="fa-brands fa-pinterest-p fa-xl"></i> &nbsp; اضافه نقاط</span><span class="badge badge-danger side-badge"></span></a>

					</li>
					<li class="side-item side-item-category">الاشعارات والرسائل</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ route('notifyList') }}"><span class="side-menu__label"> <i class="fa-regular fa-bell fa-xl"></i> &nbsp; الاشعارات والرسائل</span><span class="badge badge-danger side-badge"></span>
                            @if(!empty($notifyCount))
                            <span class="badge badge-success side-badge"> {{ $notifyCount }} </span>
                        @else
                        @endif
                        </a>

					</li>

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
