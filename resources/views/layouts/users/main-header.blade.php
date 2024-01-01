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

			@yield("largesearch")
		</div>
		<div class="main-header-right">

			<div class="nav nav-item  navbar-nav-right ml-auto">
				
				
				
				@yield('smallsearch')
				@yield('navbar')
				<div class="dropdown main-profile-menu p-0 nav nav-item nav-link">
					<a class="profile-user m-0 d-flex" href=""><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}"></a>
					<div class="dropdown-menu">
						<div class="main-header-profile bg-primary p-3">
							<div class="d-flex wd-100p">
								<div class="main-img-user"><img alt="" src="{{URL::asset(Auth::User()->userToDetalis->ProfileImage)}}" class=""></div>
								<div class="mr-3 my-auto">
									<h6>{{ Auth::user()->name }}</h6>
								</div>
							</div>
						</div>
						<a class="dropdown-item" href="{{route('profile.edit')}}"><i class="bx bx-user-circle"></i>الملف الشخصي</a>
						<a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
						<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
						<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>


						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<x-dropdown-link class="dropdown-item" :href="route('logout')"
									onclick="event.preventDefault();
												this.closest('form').submit();">
												<i class="bx bx-log-out"></i>
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


<script>
	window.onscroll = function() {
	   myFunction();
	   myFunction_mobile();
	}
	
	var navbar = document.getElementById("navbar");
	var sticky = navbar.offsetTop;
	
	var navbar_mobile = document.getElementById("menuToggle");
	var sticky_mobile = navbar_mobile.offsetTop;
	
	function myFunction() {
	  if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky");
	  } else {
		navbar.classList.remove("sticky");
	  }
	}
	function myFunction_mobile() {
	  if (window.pageYOffset >= sticky_mobile) {
		navbar_mobile.classList.add("sticky_mobile");
	  } else {
		navbar_mobile.classList.remove("sticky_mobile");
	  }
	}
	</script>