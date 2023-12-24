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
						<img class="w-100 h-30" src="{{asset("test/Adidas-Facebook-Covers-1368.jpeg")}}" alt="MarkitProfile">
					</div>
				</div>

				<div class="container-fluid">
					<div class="row row-sm">
						<div class="col-1"></div>
						<div class="col-10 ">
							<div class="card mainimageprofile card-success">
								<div class="card-header pb-0">
									<div class="img-circle">
										<img src="{{asset("test/download.png")}}" alt="">
									</div>
									<h1 class="prandName mr-xl-5">Addidas</h1>
								</div>
								<div class="card-body m-0  text-success">
									<div class="row anlisis">
										<div class="col-md-4 col text-center ">
											<h5>666</h5>
											<h6 class="text-small text-muted mb-0"> زوار المتجر</h6>
										</div>
										<div class="col-md-4 col text-center ">
											<h5>583</h5>
											<h6 class="text-small text-muted mb-0">نقاط العملاء</h6>
										</div>
										<div class="col-md-4 col text-center ">
											<h5>583</h5>
											<h6 class="text-small text-muted mb-0">المنتجات</h6>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-1"></div>
					</div>


					<div class="row row-sm">
                        @foreach ($products as $product)
							<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">

								<div class="card shadow-none">

									<div class="card-body">



										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">عروض المتجر</div>
												{{-- <i class="mdi mdi-heart-outline ml-auto wishlist"></i> --}}
											</div>
											<a href="{{url('product-details/'.$product->id)}}">
												<img class="w-100" src="{{asset($product->productionToImgRealtions->mainImage)}}" alt="product-image">
											</a>
											<a href="#" class="adtocart overflow-hidden "> <img class="" src="{{URL::asset('assets/img/merchant/Adidas_logo.png')}}" alt="merchant-logo"></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$product->name}}</h3>
											<span class="tx-15 ml-auto">
												% الخصم <b>{{$product->discount}}</b>
				

											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">₪{{$product->ThePriceAfterDiscount}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">₪{{$product->price}}</span></h4>
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
