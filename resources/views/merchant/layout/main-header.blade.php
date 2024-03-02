
<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item  shadow-none ">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('merchant/merchant') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('merchant/merchant') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('merchant/merchant') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
							<a href="{{ url('merchant/merchant') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><a class="open-toggle" href="#"><i class="tx-20 mt-2 text-secondary fa-solid fa-bars fa-2xs" ></i>
						</a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x "></i></a>
						</div>
						{{-- <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div> --}}
					</div>
					<div class="main-header-right">
						<ul class="nav">
							<li class="">
								<div class="dropdown  nav-itemd-none d-md-flex">


								</div>
							</li>
						</ul>
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs 	" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" "></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-right">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15  font-weight-semibold">الرسائل</h6>
											<span class="badge badge-pill badge-warning mr-auto my-auto float-left">تمت القرائه</span>
										</div>
										<p class="dropdown-title-text subtext mb-0  op-6 pb-0 tx-12 ">لديك 0 رسائل غير مقروئه</p>
									</div>
									<div class="main-message-list chat-scroll">

                                        <a href="#" class="p-3 d-flex border-bottom">
                                            <h6 class="text-center m-auto">لا يوجد رسائل</h6>

										</a>



										{{-- <a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/5.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Anne Fibbiyon</h5>
												</div>
												<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
												<p class="time mb-0 text-left float-right mr-2 mt-2">Jan 29 03:16 PM</p>
											</div>
										</a> --}}
									</div>
									<div class="text-center dropdown-footer">
										<a href="text-center"> كل الرسائل</a>
									</div>
								</div>
							</div>
                            <div class="dropdown p-0 nav-item main-header-notification">
                                <a class="new nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span id="messNotify" class="@if(isset($notifyId) and $notifyId->readed == 0) pulse-danger  @else '' @endif"></span></a>
                                <div class="dropdown-menu">
                                    <div class="menu-header-content bg-primary text-right">
                                        <form class="d-flex" id="form">
                                            <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الاشعارات</h6>
                                                @csrf
                                                @isset($notifyId)
                                                <input type="hidden" name="uId" value="{{$notifyId->reseverId}}">
                                                <button id="submit" type="submit"  class="badge badge-pill badge-warning mr-auto my-auto">ضع علامة  تم القراءة</button>
                                                @endisset
                                        </form>
                                        <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">لديك <b id="countNotify">{{$notifyCount}}</b> اشعار غير مقروءة</p>
                                    </div>
                                    <div class="main-notification-list Notification-scroll lastrecord">

                                        {{-- @if ($notify->isEmpty())

                                        @endif --}}

                                        @forelse ($notify as $NewData )
                                        <a href="{{Route('allNotify')}}" class="p-3 d-flex border-bottom ">
                                            <div class="  drop-img  cover-image ml-2   " data-image-src="">
                                                <img src="{{URL::asset($NewData->notifyMerchant->userToDetalis->ProfileImage)}}" alt="">
                                                <span class="avatar-status bg-teal"></span>
                                            </div>
                                            <div class="wd-90p">
                                                <div class="d-flex">
                                                    <h5 class="mb-1 name " id="notifayTitle">{{$NewData->notifyMerchant->name}}</h5>
                                                </div>
                                                <p class="mb-0 desc">{{$NewData->messages}}</p>
                                                <p class="time mb-0 text-left float-right mr-2 mt-2">{{$NewData->created_at->diffForHumans()}}</p>
                                            </div>
                                        </a>
                                        @empty
                                        <a href="#" class="p-3 d-flex border-bottom  text-center">

                                            <h6 class="text-center m-auto">لا يوجد اشعارات</h6>
                                         </a>
                                        @endforelse



                                    </div>
                                    <div class="dropdown-footer">
                                        <a href="{{Route('allNotify')}}">كل الاشعارات</a>
                                    </div>
                                </div>
                            </div>
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs
									" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user  rounded-circle p-1 d-flex" href=""><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}" class=""></div>
											<div class="mr-3 my-auto">
												<h6>{{ Auth::user()->name }}</h6>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href="{{route('/')}}"><i class="fa-solid fa-arrows-rotate pl-2"></i>زياره الموقع كمستخدم</a>
									<a class="dropdown-item" href="{{route('profileDetials')}}"><i class="fa-solid fa-user pl-2"></i>الملف الشخصي</a>
									<a class="dropdown-item" href="{{route('merchant')}}"><i class="fa fa-house pl-2"></i>الرئيسية</a>
									<a class="dropdown-item" href=""><i class="fa-regular fa-envelope pl-2"></i>الرسائل</a>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<x-dropdown-link class="dropdown-item" :href="route('logout')"
												onclick="event.preventDefault();
															this.closest('form').submit();">
															<i class="fa-solid fa-right-from-bracket"></i>
											{{ __('تسجيل خروج') }}
										</x-dropdown-link>
									</form>
								</div>
							</div>
								{{-- <div class="dropdown main-header-message right-toggle">
									<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
										<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
									</a>
								</div> --}}
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
