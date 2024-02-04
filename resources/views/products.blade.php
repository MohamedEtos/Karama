{{-- @if (Auth::User()->subtype == 'admin') --}}
{{-- @extends('merchant.layout.merchant_master') --}}
{{-- @else --}}
@extends('layouts.users.master')
{{-- @endif --}}


@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/nestDropdown.css')}}">
<!-- Internal Ion.rangeSlider css -->
<link href="{{URL::asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

<style>

</style>
@endsection

@section('largesearch')
	<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
		<form>
			<input type="search" class="form-control" value="{{ request('search') }}" name="search" placeholder="ابحث عن ملابس , مطاعم , غسيل سيارات , الخ ...">
			<button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
		</form>
	</div>
@endsection





@section('navbar')
<div class="nav-item p-0 m-auto ">
	<li class="nav-item dropdown ">
        <a class="dropdownWithOutArrow nav-link  p-lg-2 p-1 text-secondary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			₪
						{{-- <i class="  fa-solid fa-fire"></i>	 --}}
			
			<span class="d-none d-sm-none d-md-none d-lg-inline">السعر</span>
			{{-- <span class=" pulse-danger"></span> --}}
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
			<form class="multi-range-field mt-2 ">
				<input class="rangeslider3 " data-extra-classes="irs-outline" name="priceRange" type="text">
				<button type="submit" class="btn btn-block btn-primary mt-2">بحث</button>
			</form>

        </div>
      </li>
</div>
<div class="nav-item p-0 m-auto ">
	<li class="nav-item dropdown ">
        <a class="dropdownWithOutArrow nav-link p-lg-2 p-1 text-secondary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-percent "></i>		
			{{-- <i class="  fa-solid fa-fire"></i>	 --}}
			
			<span class="d-none d-sm-none d-md-none d-lg-inline">خصومات</span>
			{{-- <span class=" pulse-danger"></span> --}}
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
			<form class="">
				
				
				<a  href="{{'/?persent='}}" class="text-cyan dropdown-item">جميع الخصومات</a>
				<div class="dropdown-divider"></div>
				<a  href="{{'/?persent=10'}}" class="text-cyan dropdown-item">اكثر من 10 %</a>
				<a  href="{{'/?persent=20'}}" class="text-teal dropdown-item">اكثر من 20 %</a>
				<a  href="{{'/?persent=30'}}" class="text-green dropdown-item">اكثر من 30 %</a>
				<a  href="{{'/?persent=40'}}" class="text-lime dropdown-item">اكثر من 40 %</a>
				<a  href="{{'/?persent=50'}}" class="text-success dropdown-item">اكثر من 50 %</a>
				<a  href="{{'/?persent=60'}}" class="text-warning dropdown-item">اكثر من 60 %</a>
				<a  href="{{'/?persent=70'}}" class="text-danger dropdown-item">اكثر من  70% <i class="  fa-solid fa-fire"></i></a>
			</form>
        </div>
      </li>
</div>

<div class="nav-item p-0 m-auto">
	<li class="nav-item dropdown">
        <a class=" nav-link  p-lg-3 p-1  text-secondary  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-shop"></i>										
			<span class="d-none d-sm-none d-md-none d-lg-inline">علامات تجاريه</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<form>
				<a type="button" href="{{'/?search='}}" class="dropdown-item">الكل</a>
				<div class="dropdown-divider"></div>

				@foreach ($merchants as $merchant )
				<a type="button" href="{{'/?search='.$merchant->name}}" class="dropdown-item">{{$merchant->name}}</a>
				
				@endforeach
				
			</form>
        </div>
      </li>
</div>

<div class="nav-item p-0p-0 m-auto ">
	<li class="nav-item dropdown">
        <a class=" nav-link p-lg-3 p-1 text-secondary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="mdi mdi-filter-variant"></i>
			<span class="d-none d-sm-none d-md-none d-lg-inline">الاقسام</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<form>
				<a type="button" href="{{'/?search='}}" class="dropdown-item">جميع الاقسام</a>
				<div class="dropdown-divider"></div>
				@foreach ($category as $categorys )
				<a type="button" href="{{'/?search='.$categorys->name}}" class="dropdown-item">{{$categorys->name}}</a>
				
				@endforeach
				
			</form>
        </div>
      </li>
</div>

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
	<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
	<div class="dropdown-menu">
		<div class="menu-header-content bg-primary text-right">
			<div class="d-flex">
				<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
				<span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
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
						<h5 class="mb-1 name">Petey Cruiser</h5>
					</div>
					<p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
					<p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
				</div>
			</a>
			<a href="#" class="p-3 d-flex border-bottom">
				<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/2.jpg')}}">
					<span class="avatar-status bg-teal"></span>
				</div>
				<div class="wd-90p">
					<div class="d-flex">
						<h5 class="mb-1 name">Jimmy Changa</h5>
					</div>
					<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
					<p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
				</div>
			</a>
			<a href="#" class="p-3 d-flex border-bottom">
				<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/defultUserImg/defultUserImg.webp')}}">
					<span class="avatar-status bg-teal"></span>
				</div>
				<div class="wd-90p">
					<div class="d-flex">
						<h5 class="mb-1 name">Graham Cracker</h5>
					</div>
					<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
					<p class="time mb-0 text-left float-right mr-2 mt-2">Feb 25 10:35 AM</p>
				</div>
			</a>
			<a href="#" class="p-3 d-flex border-bottom">
				<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/12.jpg')}}">
					<span class="avatar-status bg-teal"></span>
				</div>
				<div class="wd-90p">
					<div class="d-flex">
						<h5 class="mb-1 name">Donatella Nobatti</h5>
					</div>
					<p class="mb-0 desc">Here are some products ...</p>
					<p class="time mb-0 text-left float-right mr-2 mt-2">Feb 12 05:12 PM</p>
				</div>
			</a>
			<a href="#" class="p-3 d-flex border-bottom">
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
			</a>
		</div>
		<div class="text-center dropdown-footer">
			<a href="text-center">VIEW ALL</a>
		</div>
	</div>
</div>


<div class="dropdown p-0 nav-item main-header-notification">
	<a class="new nav-link" href="#">
	<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
	<div class="dropdown-menu">
		<div class="menu-header-content bg-primary text-right">
			<div class="d-flex">
				<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications</h6>
				<span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All Read</span>
			</div>
			<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread Notifications</p>
		</div>
		<div class="main-notification-list Notification-scroll">
			<a class="d-flex p-3 border-bottom" href="#">
				<div class="notifyimg bg-pink">
					<i class="la la-file-alt text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">New files available</h5>
					<div class="notification-subtext">10 hour ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
			<a class="d-flex p-3" href="#">
				<div class="notifyimg bg-purple">
					<i class="la la-gem text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">Updates Available</h5>
					<div class="notification-subtext">2 days ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
			<a class="d-flex p-3 border-bottom" href="#">
				<div class="notifyimg bg-success">
					<i class="la la-shopping-basket text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">New Order Received</h5>
					<div class="notification-subtext">1 hour ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
			<a class="d-flex p-3 border-bottom" href="#">
				<div class="notifyimg bg-warning">
					<i class="la la-envelope-open text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">New review received</h5>
					<div class="notification-subtext">1 day ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
			<a class="d-flex p-3 border-bottom" href="#">
				<div class="notifyimg bg-danger">
					<i class="la la-user-check text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">22 verified registrations</h5>
					<div class="notification-subtext">2 hour ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
			<a class="d-flex p-3 border-bottom" href="#">
				<div class="notifyimg bg-primary">
					<i class="la la-check-circle text-white"></i>
				</div>
				<div class="mr-3">
					<h5 class="notification-label mb-1">Project has been approved</h5>
					<div class="notification-subtext">4 hour ago</div>
				</div>
				<div class="mr-auto" >
					<i class="las la-angle-left text-left text-muted"></i>
				</div>
			</a>
		</div>
		<div class="dropdown-footer">
			<a href="">VIEW ALL</a>
		</div>
	</div>
</div>
{{-- <div class="nav-item full-screen fullscreen-button">
	<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
</div> --}}


@endsection

@section('smallsearch')
{{-- <div class="nav-link" id="bs-example-navbar-collapse-1">
	<form class="navbar-form" role="search">
		<div class="input-group">
			<input type="search" class="form-control" value="{{ request('search') }}" name="search" placeholder="ابحث عن ملابس , مطاعم , غسيل سيارات , الخ ...">
			<span class="input-group-btn">
				<button type="reset" class="btn btn-default">
					<i class="fas fa-times"></i>
				</button>
				<button type="submit" class="btn btn-default nav-link resp-btn">
					<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
				</button>
			</span>
		</div>
	</form>
</div> --}}
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header mt-2 justify-content-between mb-2 rounded alert alert-light">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">العروض والمنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>
					{{-- <div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{url('/')}}" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></a>
						</div>

					</div> --}}
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
				<div class="row row-sm ">

					{{-- <div class="col-12 ">
						<div class="card shadow-none">
							<div class="card-body p-2">
								<form>
								<div class="input-group">
										<span class="input-group-append">
											<button class="btn btn-primary" type="submit">بحث</button>
										</span>
										<input type="search" class="form-control" value="{{ request('search') }}" name="search" placeholder="ابحث عن ملابس , مطاعم , غسيل سيارات , الخ ...">
									</div>
								</form>
								<form>
									<div class="row row-sm m-2	">
										@foreach ($category as $categorys)
										<div class="tags">
											<a type="button" href="{{'/?search='.$categorys->name}}" class="btn btn-sm btn-danger text-white">{{$categorys->name}}</a>
										</div>
										@endforeach
									</div>
								</form>
							</div>
						</div>
					</div>	 --}}
                </div>

					<div class="row ">
						
                        @foreach ($products as $product)
							<div class="col-md-4 col-lg-2 col-xl-2  col-sm-6">
								<div class="card shadow-none">
									<div class="card-title mt-2  d-block d-sm-block d-md-none d-lg-none">
										<div class="row">
											<div class="demo-avatar-group col-3">
												<div class="main-img-user  avatar-md  mr-3">
													{{-- <img alt="avatar" class="rounded-circle" src="http://127.0.0.1:8080/assets/img/faces/4.jpg"> --}}
													<a href="{{url('MarketProfile/'.$product->userToProduct->id)}}" class="">
														<img alt="avatar" class="bd bd-2 bd-success rounded-circle"src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}">
												   </a>
												</div>
											</div>
											<div class="market-data col-9 m-auto">
												<h6 class="tx-12 mb-0 mt-2 font-weight-bold text-uppercase">{{$product->name}}</h6>
												<span class=" tx-12 ml-auto">
													 خصم % <b>{{$product->discount}}</b>
													</span>											
													<h4 class="tx-12 mb-0 mt-1   font-weight-bold  text-danger">₪{{$product->ThePriceAfterDiscount}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">₪{{$product->price}}</span></h4>
											</div>
										</div>


									</div>
									<div class="card-body pt-1 pt-md-3  ">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">عروض المتجر</div>
												{{-- <i class="mdi mdi-heart-outline ml-auto wishlist"></i> --}}
											</div>
											<a href="{{url('product-details/'.$product->id)}}">
												<img class="w-100" src="{{asset($product->productionToImgRealtions->mainImage)}}" alt="product-image">
											</a>
											<a href="{{url('MarketProfile/'.$product->userToProduct->id)}}" class="adtocart overflow-hidden  d-none d-sm-none d-md-block d-lg-block">
												 <img class="bd bd-2 bd-success rounded-circle" src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="merchant-logo"></i>
											</a>

										</div>
										<div class="text-center pt-3 d-none d-sm-none d-md-block d-lg-block">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$product->name}}</h3>
											<span class="tx-15 ml-auto">
												% الخصم <b>{{$product->discount}}</b>

											</span>
											<h4 class="h5 mb-0 mt-2 text-center d-block font-weight-bold text-danger">₪{{$product->ThePriceAfterDiscount}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">₪{{$product->price}}</span></h4>
										</div>

									</div>

								</div>

							</div>
                            @endforeach

					</div>
					<div class="col-12 w-100 pagination ">
						{{$products->links()}}
					</div>
				{{-- fliters  --}}
					{{-- <div class="col-xl-2 col-lg-2 col-md-12 mb-3 mb-md-0">
						<div class="card 	">
							<div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الفلاتر</div>
							<div class="card-body pb-0">
								<div class="form-group">
									<label class="form-label">الفئات</label>
									<select name="beast" id="select-beast" class="form-control  nice-select  custom-select">
										<option value="0">--اختار--</option>
										<option value="1">ملابس رياضيه</option>
										<option value="2">احذية</option>
										<option value="3">ملابس</option>
										<option value="4">اجهزه منزليه</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Women</label>
									<select name="beast" id="select-beast1" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										<option value="1">Western wear</option>
										<option value="2">Foot wear</option>
										<option value="3">Top wear</option>
										<option value="4">Bootom wear</option>
										<option value="5">Beuty Groming</option>
										<option value="6">Accessories</option>
										<option value="7">jewellery</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Baby & Kids</label>
									<select name="beast" id="select-beast2" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										<option value="1">Boys clothing</option>
										<option value="2">girls Clothing</option>
										<option value="3">Toys</option>
										<option value="4">Baby Care</option>
										<option value="5">Kids footwear</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Electronics</label>
									<select name="beast" id="select-beast3" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										<option value="1">Mobiles</option>
										<option value="2">Laptops</option>
										<option value="3">Gaming & Accessories</option>
										<option value="4">Health care Appliances</option>
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">Sport,Books & More </label>
									<select name="beast" id="select-beast4" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										<option value="1">Stationery</option>
										<option value="2">Books</option>
										<option value="3">Gaming</option>
										<option value="4">Music</option>
										<option value="5">Exercise & fitness</option>
									</select>
								</div>
							</div>
							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter</div>
							<div class="card-body">
								<form role="form product-form">
									<div class="form-group">
										<label>Brand</label>
										<select class="form-control nice-select">
											<option>Wallmart</option>
											<option>Catseye</option>
											<option>Moonsoon</option>
											<option>Textmart</option>
										</select>
									</div>
									<div class="form-group">
										<label>Type</label>
										<select class="form-control nice-select">
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
											<option>Extra Large</option>
										</select>
									</div>
								</form>
							</div>
							<div class="py-2 px-3">

								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<script src="{{URL::asset('assets/js/nestDropdown.js')}}"></script>

<script>
	// price range 
		$('.rangeslider3').ionRangeSlider({
			type: 'double',
			grid: true,
			min: 0,
			max: 1000,
			from: 200,
			to: 800,
			prefix: '₪'
		});
</script>

<script>
if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
} else {
    window.onbeforeunload = function () {
        window.scrollTo(0, 0);
    }
}
</script>
@endsection
