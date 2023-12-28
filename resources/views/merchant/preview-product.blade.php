@extends('merchant.layout.merchant_master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
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
				<!-- /breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row row-sm">

					

					<div class="col-xl-12">
						<div class="card ">
							<div class="card-body h-100 ">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img src="{{asset($previewProduct->productionToImgRealtions->mainImage)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-2"><img src="{{asset($previewProduct->productionToImgRealtions->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-3"><img src="{{asset($previewProduct->productionToImgRealtions->img3)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-4"><img src="{{asset($previewProduct->productionToImgRealtions->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-5"><img src="{{asset($previewProduct->productionToImgRealtions->mainImage)}}" alt="image"/></div>
										</div>
										<ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset($previewProduct->productionToImgRealtions->mainImage)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{asset($previewProduct->productionToImgRealtions->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{asset($previewProduct->productionToImgRealtions->img3)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{asset($previewProduct->productionToImgRealtions->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{asset($previewProduct->productionToImgRealtions->mainImage)}}" alt="image"/></a></li>
										</ul>
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
											<a href="{{url('MarketProfile/'.$userDetails->userDetails->id)}}" class="merchant-logo-bg">
												<img  class="merchant-logo " src="{{ asset($userDetails->ProfileImage) }}" alt="">
											</a>
										<h4 class="product-title mb-1">{{$previewProduct->name}}</h4>
										<p class="text-muted tx-13 mb-1">{{$previewProduct->category}}</p>
										<div class="rating mb-1">

											<span class="review-no"> reviews {{$productRevew}} </span>
										</div>
										<h6 class="price mt-2">خصم <span class="h3 ml-2 ">{{$previewProduct->discount}}</span>%</h6>
										<h6 class="price">السعر بعض الخصم <span class="h3 ml-2">₪{{$previewProduct->ThePriceAfterDiscount}}</span> <span class="prev-price">₪ {{$previewProduct->price}}</span></h6>
										<h6 class="price mt-3"> <span class="h3 ml-2 ">وصف المنتج </span></h6>
										<p class="price mt-3 h5">{{$previewProduct->productDescription}}</p>
										<p class="product-description  ">{{$previewProduct->productDetails}}</p>

										<h6 class="price mt-3 h5">تواصل معي المتجر</h6>

										<div class="row  ">


											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<a href="tel:{{$userDetails->phone}}" class="btn btn-primary btn-with-icon btn-block "  id='swal-image'>اتصال<i class="la la-phone"></i></a>
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="https://wa.me/{{$userDetails->whatsapp}}"  target="_blank" class="btn btn-success btn-with-icon btn-block">  واتس اب  &nbsp;<i class="fa-brands fa-whatsapp fa-xl"> </i></i>
												</a>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="{{$userDetails->facebook}}"  target="_blank" class="btn btn-info btn-with-icon btn-block">   فيس بوك  &nbsp;<i class="fa-brands fa-facebook fa-xl"> </i></i>
												</a>
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="{{$userDetails->website}}" target="_blank"  class="btn btn-danger btn-with-icon btn-block">  الموقع   &nbsp;<i class="icon ion-md-link  fa-xl"> </i></i>
												</a>
											</div>
										</div>

										<h6 class="price mt-4 h5">نبذه عن المتحر</h6>
										<p class="text-muted">{{$userDetails->bio}}</p>
										<h6 class="price mt-3 h5">فروعنا</h6>
										<p class="text-muted">{{$userDetails->location}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
{{-- 
				<div class="row">
                    @foreach ($related_products as $item)
						<a href="{{url('product-details/'.$itempreviewProduct->id)}}">
							<div class="col-lg-3">

								<div class="card item-card">

									<div class="card-body pb-0 h-100">
										<div class="text-center">
											<img src="{{asset($item->mainImage)}}" alt="img" class="img-fluid">
										</div>
										<div class="card-body cardbody relative">
											<div class="cardtitle">
												<span>{{$itempreviewProduct->name}}</span>
												<a>{{$itempreviewProduct->category}}</a>
											</div>
											<div class="cardprice">
												<span class="type--strikethrough">${{$itempreviewProduct->price}}</span>
												<span>${{$itempreviewProduct->ThePriceAfterDiscount}}</span>
											</div>
										</div>
									</div>
									<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
										<a href="{{url('product-details/'.$itempreviewProduct->id)}}" class="btn btn-primary"> View More</a>
										<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
									</div>

								</div>
							</div>
						</a>

						@endforeach
					</div> --}}
				<!-- row closed -->

			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
<!-- Sweet-alert js  -->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
<script>

function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

}

$(function(e) {
	$('#swal-image').click(function () {
			swal({
				title: '01033441143',
				text: 'شكرا علي زيارتك',
				imageUrl: 'assets/img/brand/logo.png',
				animation: true,
			})
		});
});



</script>

@endsection
