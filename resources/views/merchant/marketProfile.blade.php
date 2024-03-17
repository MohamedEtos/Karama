
@extends( (Auth::User()->subtype == 'merchant') ? 'merchant.layout.merchant_master' : 'layouts.users.master')



@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css-rtl/MarketProfile.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/nestDropdown.css')}}">
<!-- Internal Ion.rangeSlider css -->
<link href="{{URL::asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
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
    {{-- <input type="hidden" id="UID" value="{{Auth::User()->id}}"> --}}

	<div class="row row-sm">
		<div class="mainCover col-12 text-center">
			<img class="w-100 h-30" src="{{asset($marketData->userToDetalis->coverImage)}}" alt="MarkitProfile">
			<div class=" markit-image">
				<div class="demo-avatar-group">
					<img alt="Responsive image" class="img-thumbnail wd-xs-100  wd-sm-100 wd-md-150 wd-lg-200  wd-xl-270  wd-30p " src="{{asset($marketData->userToDetalis->ProfileImage)}}">
				</div>
			</div>
		</div>
	</div>

	<div class="marketData ">
		<div class="container-fluid">
			<div class="row" >
				<div class=" col-12  text-md-right text-sm-center mt-2">
					<h1  class="tx-md-62 pb-0 mb-0">{{$marketData->name}}</h1>



					<a href="{{$marketData->userToDetalis->website}}" class="text-info">{{$marketData->userToDetalis->website}}</a	>
				</div>
			</div>
				<div class="row mt-3">
					<div class="col-3  text-center ">
						<h6 class="text-small text-muted mb-0">كل 100 ₪ تساوي </h6>
						<h5 class="text-info">{{$pointlimit->transferPoints}} نقطه</h5>
					</div>
					<div class="col-3  text-center ">
						<h6 class="text-small text-muted mb-0">نقاط العملاء</h6>
						<h5 class="text-info">{{$usersPoints}}</h5>
					</div>
					<div class="col-3  text-center ">
						<h6 class="text-small text-muted mb-0"> زوار المتجر</h6>
						<h5 class="text-info">{{$visetorCounter}}</h5>
					</div>

					<div class="col-3  text-center ">
						<h6 class="text-small text-muted mb-0">المنتجات</h6>
						<h5 class="text-info">{{$productsCounter}}</h5>
					</div>

				</div>


			<div class="row pb-3">

				<div class="btn-icon-list col-12 d-flex justify-content-md-end  justify-content-sm-center mt-2">
					<a href="tel:{{$marketData->userToDetalis->phone}}" class="   btn btn-icon btn-primary   "  id='swal-image'><i class="fa-solid fa-phone"></i></a>
					<a href="https://wa.me/{{$marketData->userToDetalis->whatsapp}}"  target="_blank" class="   btn btn-icon btn-success  "><i class="fa-brands fa-whatsapp fa-xl"> </i></a>
					<a href="{{$marketData->userToDetalis->facebook}}"  target="_blank" class="   btn btn-icon btn-info  ">    <i class="fa-brands fa-facebook fa-xl"> </i></a>
					<a href="{{$marketData->userToDetalis->website}}" target="_blank"  class="   btn btn-icon btn-danger  ">   <i class="fa-solid fa-link"></i></a>
					<a href="{{$marketData->userToDetalis->website}}" target="_blank"  class="   btn btn-icon btn-info  ">  <i class="fa-solid fa-location-dot"></i></a>
				</div>
			</div>
			<div class="text-center text-muted pb-2">
				الحد الادني لستبدال النقاط <b>{{$pointlimit->exchangeLimit}}</b>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-3">


					<div class="row row-sm">
                        @foreach ($productt as $product)
							<div class="col-md-6 col-lg-4 col-xl-3  col-sm-12">
								<div class="card shadow-none">
									<div class="card-title mt-2  d-block d-sm-block d-md-none d-lg-none">
										<div class="row">
											<div class="demo-avatar-group col-3">
												<div class="main-img-user  avatar-md  mr-3">
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
											</div>
                                            <div class="row justify-content-center">

                                                <a href="{{url('product-details/'.$product->id)}}">
                                                    <img class="w-100 col-auto p-0" src="{{asset($product->productionToImgRealtions->mainImage)}}" alt="product-image">
                                                </a>
                                                <a href="{{url('MarketProfile/'.$product->userToProduct->id)}}" class="adtocart overflow-hidden  d-none d-sm-none d-md-block d-lg-block">
                                                    <img class="bd bd-2 bd-success rounded-circle" src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="merchant-logo"></i>
                                                </a>
                                            </div>

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
