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

					{{-- <li class="side-item side-item-category">الاقسام</li> --}}
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-solid fa-pen-to-square  fa-xl"></i> &nbsp;  الاقسام</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('all.category') }}">اضافه قسم</a></li>
						</ul>
					</li>


					<li class="side-item side-item-category">المتاجر والاشتراكات</li>
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-solid fa-store fa-xl"></i> &nbsp;  المتاجر</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('admin/registerStore') }}"> اضافه متجر</a></li>
							<li><a class="slide-item" href="{{ url('admin/merchant') }}"> كل المتاجر</a></li>
						</ul>
					</li>


					{{-- <li class="side-item side-item-category">الاشتراكات</li> --}}
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-solid fa-user fa-xl"></i> &nbsp;  الاشتراكات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('admin/registerUserView') }}"> اضافه مشترك</a></li>

							<li><a class="slide-item" href="{{ route('all.user') }}"> المشتركين </a></li>

						</ul>
					</li>


					<li class="side-item side-item-category">المنتجات </li>

                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label">  <i class="fa-solid fa-box fa-xl"></i> &nbsp;  المنتجات</span><i class="angle fe fe-chevron-down"> </i><span class="badge badge-success side-badge">1</span></a>
						<ul class="slide-menu">
                           <li> <a class="slide-item" href="{{ route('allProducts') }}">جدول المنتجات</a> </li>
                            <li><a class="slide-item" href="{{Route('reviewAllProudcts')}}">المراجعه</a></li>
                            <li><a class="slide-item" href="{{ route('acceptedProudcts') }}">منتجات مقبوله</a></li>
                            <li><a class="slide-item" href="{{ route('rejectedProudcts') }}">منتجات مرفوضه</a></li>

						</ul>
					</li>



                    <li class="side-item side-item-category">النقاط </li>

                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><span class="side-menu__label"> <i class="fa-brands fa-pinterest-p fa-xl"></i> &nbsp;  النقاط</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('admin/pointSetting') }}"> اعدادات النقاط</a></li>
                           	<li> <a class="slide-item" href="{{ route('pointsOperations') }}">حركات النقاط</a></li>
                            <li><a class="slide-item" href="{{Route('addPoints')}}">اضافه نقاط</a></li>
						</ul>
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
