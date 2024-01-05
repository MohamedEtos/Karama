@extends('merchant.layout.merchant_master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css-rtl/MarketProfile.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				{{-- <!-- breadcrumb -->
				<div class="breadcrumb-header alert alert-light rounded justify-content-between ">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك  <b>{{Auth::User()->name}}</b></h2>
						  <p class="mg-b-0">انت الان تري المنتج كما يراه الاخرون</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- /breadcrumb --> --}}
@endsection
@section('contentWithOutContiner')
				<!-- row -->
				<div class="row row-sm">
					<div class="mainCover col-12">
							<img class="w-100 h-30" src="{{asset($marketData->userToDetalis->coverImage)}}" alt="MarkitProfile">
					</div>
				</div>

				<div class="container-fluid">
					<div class="row row-sm">
						<div class="col-1"></div>
						<div class="col-10 ">
							<div class="card mainimageprofile card-success">
								<div class="card-header pb-0">
									<div class="img-circle">
										<img src="{{asset($marketData->userToDetalis->ProfileImage)}}" alt="">
									</div>
									<h1 class="prandName mr-xl-5">{{$marketData->name}}</h1>
								</div>
								<div class="card-body m-0 p-1  text-success">
									<div class="row anlisis">
										<div class="col-md-4 col text-center ">
											<h5>{{$visetorCounter}}</h5>
											<h6 class="text-small text-muted mb-0"> زوار المتجر</h6>
										</div>
										<div class="col-md-4 col text-center ">
											<h5>583</h5>
											<h6 class="text-small text-muted mb-0">نقاط العملاء</h6>
										</div>
										<div class="col-md-4 col text-center ">
											<h5>{{$productsCounter}}</h5>
											<h6 class="text-small text-muted mb-0">المنتجات</h6>
										</div>
											{{-- <div class="btn-icon-list">
												<button class="col btn btn-indigo btn-icon"><i class="typcn typcn-folder"></i></button>
												<button class="col btn btn-primary btn-icon"><i class="typcn typcn-calendar-outline"></i></button>
												<button class="col btn btn-success btn-icon"><i class="typcn typcn-document-add"></i></button>
												<button class="col btn btn-info btn-icon"><i class="typcn typcn-arrow-back-outline"></i></button>
											</div> --}}
									</div>
								</div>
									<div class="btn-icon-list m-2 ">
										<a href="tel:{{$marketData->userToDetalis->phone}}" class=" btn btn-icon btn-primary   "  id='swal-image'><i class="la la-phone"></i></a>
										<a href="https://wa.me/{{$marketData->userToDetalis->whatsapp}}"  target="_blank" class=" btn btn-icon btn-success  "><i class="fa-brands fa-whatsapp fa-xl"> </i></a>
										<a href="{{$marketData->userToDetalis->facebook}}"  target="_blank" class=" btn btn-icon btn-info  ">    <i class="fa-brands fa-facebook fa-xl"> </i></a>
										<a href="{{$marketData->userToDetalis->website}}" target="_blank"  class=" btn btn-icon btn-danger  ">   <i class="icon ion-md-link  fa-xl"> </i></a>
										<a href="{{$marketData->userToDetalis->website}}" target="_blank"  class=" btn btn-icon btn-info  ">  <i class="fa-solid fa-location-dot"></i></a>
									</div>

								</div>

							</div>
					</div>
						<div class="col-1"></div>
					</div>
				</div>


					<div class="row row-sm">
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
                </div>

				</div>
				<!-- row closed -->


				</div>

@endsection
@section('content')
				<!-- row -->

				<!-- row closed -->
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection
