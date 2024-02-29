<!-- main-header opened -->
<div class="main-header  sticky side-header nav nav-item" id="navbar">
	<div class="container-fluid">
		<div class="main-header-left ">
			<div class="responsive-logo">
				<a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
				<a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
				<a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
				<a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
			</div>


            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <form>
                    <input type="search" class="form-control" value="{{ request('search') }}" name="search" placeholder="ابحث عن ملابس , مطاعم , غسيل سيارات , الخ ...">
                    <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
                </form>
            </div>
		</div>
		<div class="main-header-right">

			<div class="nav nav-item  navbar-nav-right ml-auto">



				@yield('smallsearch')


                <div class="dropdown p-0 nav-item main-header-message ">
                    <a class="new nav-link" href="#"> <p class="header-icon-svgs-none-width tx-14 "> ₪  </p><span  class=" "></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">متوسط السعر</h6>
                            </div>
                        </div>
                        <div class="main-message-list chat-scroll">


                            <form href="" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-100p">
                                        <div class="multi-range-field mt-2 ">
                                            <input class="rangeslider3 " data-extra-classes="irs-outline" name="priceRange" type="text">
                                            {{-- <button type="submit" class="btn btn-block btn-primary mt-2">بحث</button> --}}
                                        </div>
                                    {{-- <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p> --}}
                                </div>

                        </div>
                        <div class="text-center dropdown-footer p-0 m-0">
                            <button type="submit" class="btn btn-block btn-primary mt-2">بحث</button>
                        </div>
                    </form>

                    </div>
                </div>

















                <div class="dropdown p-0 nav-item main-header-message ">
                    <a class="new nav-link  text-center " href="#"> <p class=" tx-14   text-center "> <i class="fa-solid fa-percent"></i>   </p><span  class=" "></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold"> خصومات</h6>
                            </div>
                            {{-- <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p> --}}
                        </div>
                        <div class="main-message-list chat-scroll">

                            <a href="{{'/?persent=10'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h6 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 10 %</h6>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=20'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 20 %</h5>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=30'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 30 %</h5>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=40'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 40 %</h5>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=50'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 50 %</h5>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=60'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 60 %</h5>
                                    </div>
                                </div>
                            </a>
                            <a href="{{'/?persent=70'}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name text-cyan" id="notifayTitle">اكثر من 70 %  <i class=" text-danger fa-solid fa-fire"></i> </h5>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="{{'/?search='}}">جميع الخصومات</a>
                        </div>
                    </div>
                </div>







                <div class="dropdown p-0 nav-item main-header-message">
                    <a class="new nav-link" href="#"> <p class="header-icon-svgs-none-width tx-14 "> <i class="fa-solid fa-shop"></i>   </p><span  class=" "></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">علامات تجاريه</h6>
                            </div>
                            {{-- <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p> --}}
                        </div>
                        <div class="main-message-list chat-scroll">

                            @foreach ($merchants as $merchant )

                            <a href="{{'/?search='.$merchant->name}}" class="p-2 d-flex border-bottom">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name " id="notifayTitle">{{$merchant->name}}</h5>
                                    </div>
                                    {{-- <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p> --}}

                                </div>
                            </a>
                            @endforeach

                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="{{'/?search='}}">كل العلامات التجاريه</a>
                        </div>
                    </div>
                </div>





                <div class="dropdown p-0 nav-item main-header-message ">
                    <a class="new nav-link" href="#"> <p class="header-icon-svgs-none-width tx-14 "> <i class="fa-solid fa-list"></i> </p><span  class=" "></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الاقسام</h6>
                            </div>
                            {{-- <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p> --}}
                        </div>
                        <div class="main-message-list chat-scroll">

                            @foreach ($category as $categorys )
                            {{-- <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-slide-in-right" data-toggle="modal" href="#modaldemo8"> --}}



                            {{-- </a> --}}

                            <a  class="p-2 d-flex border-bottom modal-effect btn" data-effect="effect-slide-in-right" data-toggle="modal" href="#modaldemo8">
                                <div class="  cover-image  ">
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name " id="notifayTitle">{{$categorys->name}}</h5>
                                    </div>
                                    {{-- <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p> --}}

                                </div>
                            </a>
                            @endforeach

                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="{{'/?search='}}">كل الاقسام</a>
                        </div>
                    </div>
                </div>

		<!-- Modal effects -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
  
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-block btn-primary" type="button">كل الفئات</button>
						{{-- <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal effects-->



                <div class="nav-link pr-0 pl-0" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <form >
                                <input type="search" class="form-control" value="{{ request('search') }}" name="search" placeholder="ابحث عن ملابس , مطاعم , غسيل سيارات , الخ ...">
                            </form>
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="button" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="dropdown p-0 nav-item main-header-message ">
                    <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span  class=" "></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الرسائل</h6>
                                {{-- <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span> --}}
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p>
                        </div>
                        <div class="main-message-list chat-scroll">

                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  " data-image-src="{{URL::asset('assets/img/faces/3.jpg')}}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name " id="notifayTitle">Petey Cruiser</h5>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  " data-image-src="{{URL::asset('assets/img/faces/3.jpg')}}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name " id="notifayTitle">Petey Cruiser</h5>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                </div>
                            </a>

                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="text-center">VIEW ALL</a>
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
                {{-- <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
                </div> --}}



				<div class="dropdown main-profile-menu p-0 nav nav-item nav-link">
					<a class="profile-user bg-success rounded-circle p-1 d-flex" href=""><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}"></a>
					<div class="dropdown-menu">
						<div class="main-header-profile bg-primary p-3">
							<div class="d-flex wd-100p">
								<div class="main-img-user "><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}" class=""></div>
								<div class="mr-3 my-auto">
									<h6>{{ Auth::user()->name }}</h6>
								</div>
							</div>
						</div>
						<a class="dropdown-item" href="{{route('profile.edit')}}"><i class="fa-solid fa-user pl-2"></i>الملف الشخصي</a>
						<a class="dropdown-item" href="{{Route('allNotify')}}"><i class="fa-regular fa-bell pl-2"></i>  الاشعارات  </a>
						<a class="dropdown-item" href=""><i class="fa-regular fa-envelope pl-2"></i> البريد</a>
						<a class="dropdown-item border-bottom" href="{{Route('myPoints')}}"><i class="fa-solid fa-star pl-2"></i> نقاطي</a>


						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<x-dropdown-link class="dropdown-item" :href="route('logout')"
									onclick="event.preventDefault();
												this.closest('form').submit();">
												<i class="fa-solid fa-right-from-bracket pl-2"></i>
								{{ __('تسجيل خروج') }}
							</x-dropdown-link>
						</form>
					</div>
				</div>
				{{-- <div class="dropdown main-header-message right-toggle">
					<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
						<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
					</a>
				</div> --}}
			</div>
		</div>
	</div>
</div>
<!-- /main-header -->


