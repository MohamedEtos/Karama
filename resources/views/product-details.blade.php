@extends('layouts.master')
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
				{{-- <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex bg-danger title-brand">
							<h4 class="content-title  mb-0 my-auto   p-3 text-white">Adiddas</h4>
						</div>
					</div>

				</div> --}}

				<div class="row  title-brand mb-3 mt-2">
					<div class="col-12 p-3 text-white">
						<h3>Adidas</h3>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">

					
@foreach ($product_details as $item)

					<div class="col-xl-12">
						<div class="card ">
							<div class="card-body h-100 ">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img src="{{asset($item->mainImage)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-2"><img src="{{asset($item->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-3"><img src="{{asset($item->img3)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-4"><img src="{{asset($item->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-5"><img src="{{asset($item->mainImage)}}" alt="image"/></div>
										</div>
										<ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset($item->mainImage)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{asset($item->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{asset($item->img3)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{asset($item->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{asset($item->mainImage)}}" alt="image"/></a></li>
										</ul>
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<div class="merchant-logo-bg">
											<img  class="merchant-logo " src="{{ asset('assets/img/merchant/Adidas_logo.png') }}" alt="">
										</div>
										<h4 class="product-title mb-1">{{$item->productionToImgRealtions->name}}</h4>
										<p class="text-muted tx-13 mb-1">{{$item->productionToImgRealtions->category}}</p>
										<div class="rating mb-1">

											<span class="review-no"> reviews {{$productRevew}} </span>
										</div>
										<h6 class="price mt-2">خصم <span class="h3 ml-2 ">{{$item->productionToImgRealtions->discount}}</span></h6>
										<h6 class="price">السعر بعض الخصم <span class="h3 ml-2">₪{{$item->productionToImgRealtions->ThePriceAfterDiscount}}</span> <span class="prev-price">₪ {{$item->productionToImgRealtions->price}}</span></h6>
										<h6 class="price mt-3"> <span class="h3 ml-2 ">وصف المنتج </span></h6>
										<p class="price mt-3 h5">{{$item->productionToImgRealtions->productDescription}}</p>
										<p class="product-description  ">{{$item->productionToImgRealtions->productDetails}}</p>
										{{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
										{{-- <div class="sizes d-flex">sizes:
											<span class="size d-flex"  data-toggle="tooltip" title="small"><label class="rdiobox mb-0"><input checked="" name="rdio" type="radio"> <span class="font-weight-bold">s</span></label></span>
											<span class="size d-flex"  data-toggle="tooltip" title="medium"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>m</span></label></span>
											<span class="size d-flex"  data-toggle="tooltip" title="large"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>l</span></label></span>
											<span class="size d-flex"  data-toggle="tooltip" title="extra-large"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>xl</span></label></span>
										</div> --}}
										{{-- <div class="colors d-flex mr-3 mt-2">
											<span class="mt-2">colors:</span>
											<div class="row gutters-xs mr-4">
												<div class="mr-2">
													<label class="colorinput">
														<input name="color" type="radio" value="azure" class="colorinput-input" checked="">
														<span class="colorinput-color bg-danger"></span>
													</label>
												</div>
												<div class="mr-2">
													<label class="colorinput">
														<input name="color" type="radio" value="indigo" class="colorinput-input">
														<span class="colorinput-color bg-secondary"></span>
													</label>
												</div>
												<div class="mr-2">
													<label class="colorinput">
														<input name="color" type="radio" value="purple" class="colorinput-input">
														<span class="colorinput-color bg-dark"></span>
													</label>
												</div>
												<div class="mr-2">
													<label class="colorinput">
														<input name="color" type="radio" value="pink" class="colorinput-input">
														<span class="colorinput-color bg-pink"></span>
													</label>
												</div>
											</div>
										</div> --}}
										{{-- <div class="d-flex  mt-2">
											<div class="mt-2 product-title">Quantity:</div>
											<div class="d-flex ml-2">
												<ul class=" mb-0 qunatity-list">
													<li>
														<div class="form-group">
															<select name="quantity" id="select-countries17" class="form-control nice-select wd-100">
																<option value="1" selected="">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
															</select>
														</div>
													</li>
												</ul>
											</div>
										</div> --}}
										<h6 class="price mt-3 h5">تواصل معي المتجر</h6>

										<div class="row row-xs wd-xl-80p">


											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<button class="btn btn-secondary  btn-with-icon btn-block " onclick="myFunction()" id='swal-image'>نسخ الرقم<i class="la la-phone"></i></button>
												<input type="text" id="myInput" class="invisible" value="{{Auth::user()->phone_number}}">
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<a href="tel:{{Auth::user()->phone_number}}" class="btn btn-primary btn-with-icon btn-block "  id='swal-image'>اتصال<i class="la la-phone"></i></a>
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="https://wa.me/01033441143"  target="_blank" class="btn btn-success btn-with-icon btn-block"> واتس اب <i class="fa fa-whatsapp" aria-hidden="true"></i>
												</a></div>
										</div>

										<h6 class="price mt-4 h5">نبذه عن المتحر</h6>
										<p class="text-muted">لأكثر من 80 عاماً ومجموعة أديداس تلعب دوراً رئيسياً في عالم الرياضة على جميع الأصعدة بتقديمها أكثر المنتجات تطوراً من الأحذية والملابس والأكسسوارات الرياضية. واليوم، تتمتع أديداس بمكانة ريادية عالمياً في قطاع المنتجات الرياضية وتقدم مجموعة واسعة من المنتجات متوفرة في جميع أنحاء العالم.</p>
										<h6 class="price mt-3 h5">فروعنا</h6>
										<P class="text-muteD">اديداس رام الله نستقبلكم يوميا من الساعة 10 صباحا حتى الساعة 11 مساء</P>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
				<!-- /row -->

				<!-- row -->

				<div class="row">
                    @foreach ($related_products as $item)
						<a href="{{url('product-details/'.$item->productionToImgRealtions->id)}}">
							<div class="col-lg-3">

								<div class="card item-card">

									<div class="card-body pb-0 h-100">
										<div class="text-center">
											<img src="{{asset($item->mainImage)}}" alt="img" class="img-fluid">
										</div>
										<div class="card-body cardbody relative">
											<div class="cardtitle">
												<span>{{$item->productionToImgRealtions->name}}</span>
												<a>{{$item->productionToImgRealtions->category}}</a>
											</div>
											<div class="cardprice">
												<span class="type--strikethrough">${{$item->productionToImgRealtions->price}}</span>
												<span>${{$item->productionToImgRealtions->ThePriceAfterDiscount}}</span>
											</div>
										</div>
									</div>
									<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
										<a href="{{url('product-details/'.$item->productionToImgRealtions->id)}}" class="btn btn-primary"> View More</a>
										<a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
									</div>

								</div>
							</div>
						</a>

				<!-- row closed -->
                @endforeach
			</div>

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
