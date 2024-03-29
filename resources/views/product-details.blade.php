@extends( (Auth::User()->subtype == 'merchant') ? 'merchant.layout.merchant_master' : 'layouts.users.master')
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
					<div class="col-12 p-2 mr-4">
						<h3><a href="{{url('MarketProfile/'.$merchantData->id)}}" class="">{{$merchantData->name}}</a></h3>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
                    {{-- <input type="hidden" id="UID" value="{{Auth::User()->id}}"> --}}


@foreach ($product_details as $item)

					<div class="col-xl-12">
						<div class="card ">
							<div class="card-body h-100 ">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-1"><img src="{{asset($item->productionToImgRealtions->mainImage)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-2"><img src="{{asset($item->productionToImgRealtions->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-3"><img src="{{asset($item->productionToImgRealtions->img3)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-4"><img src="{{asset($item->productionToImgRealtions->img2)}}" alt="image"/></div>
										  <div class="tab-pane" id="pic-5"><img src="{{asset($item->productionToImgRealtions->mainImage)}}" alt="image"/></div>
										</div>
										<ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset($item->productionToImgRealtions->mainImage)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{asset($item->productionToImgRealtions->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{asset($item->productionToImgRealtions->img3)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{asset($item->productionToImgRealtions->img2)}}" alt="image"/></a></li>
										  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{asset($item->productionToImgRealtions->mainImage)}}" alt="image"/></a></li>
										</ul>
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0 ">
                                        <div class=" testttt">

											<a href="{{url('MarketProfile/'.$merchantData->id)}}" class="merchant-logo-bg col-auto ">
												<img  class="merchant-logo bg-success rounded-circle " src="{{asset($merchantData->userToDetalis->ProfileImage)}}" alt="">
											</a>
                                        </div>

										<h4 class="product-title mb-1">{{$item->name}}</h4>
										<p class="text-muted tx-13 mb-1">{{$item->category}}</p>
										<div class="rating mb-1">

											<span class="review-no"> reviews {{$productRevew}} </span>
										</div>
										<h6 class="price mt-2">خصم <span class="h3 ml-2 ">{{$item->discount}}</span></h6>
										<h6 class="price">السعر بعض الخصم <span class="h3 ml-2">₪{{$item->ThePriceAfterDiscount}}</span> <span class="prev-price">₪ {{$item->price}}</span></h6>
										<h6 class="price mt-3"> <span class="h3 ml-2 ">وصف المنتج </span></h6>
										<p class="price mt-3 h5">{{$item->productDescription}}</p>
										<p class="product-description  ">{{$item->productDetails}}</p>

										<h6 class="price mt-3 h5">تواصل معي المتجر</h6>

										<div class="row  ">


											<div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
												<a href="tel:{{$merchantData->userToDetalis->phone}}" class="btn btn-primary btn-with-icon btn-block "  id='swal-image'>اتصال<i class="la la-phone"></i></a>
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="https://wa.me/{{$merchantData->userToDetalis->whatsapp}}"  target="_blank" class="btn btn-success btn-with-icon btn-block">  واتس اب  &nbsp;<i class="fa-brands fa-whatsapp fa-xl"> </i></i>
												</a>
											</div>
											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="{{$merchantData->userToDetalis->facebook}}"  target="_blank" class="btn btn-info btn-with-icon btn-block">   فيس بوك  &nbsp;<i class="fa-brands fa-facebook fa-xl"> </i></i>
												</a>
											</div>

											<div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
												<a href="{{$merchantData->userToDetalis->website}}" target="_blank"  class="btn btn-danger btn-with-icon btn-block">  الموقع   &nbsp;<i class="icon ion-md-link  fa-xl"> </i></i>
												</a>
											</div>
										</div>

										<h6 class="price mt-4 h5">نبذه عن المتحر</h6>
										<p class="text-muted">{{$merchantData->userToDetalis->bio}}</p>
										<h6 class="price mt-3 h5">فروعنا</h6>
										<p class="text-muted">{{$merchantData->userToDetalis->location}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
				<!-- /row -->

                @if (count($related_products) > 0)
                <div class="row">
                    <div class="col-12 text-center">

                        <span class="text-center  h4 ">
                            منتجات ذات صله
									<div class="d-block col-12  text-danger border-bottom mb-3 mt-2"> </div>

                        </span>

                    </div>
                </div>
                @endif



				<!-- row -->

				<div class="row">
                    @foreach ($related_products as $item)
						<a href="{{url('product-details/'.$item->id)}}">
							<div class="col-md-4 col-lg-3 col-xl-3  col-sm-6">
								<div class="card shadow-none">
									<div class="card-title mt-2  d-block d-sm-block d-md-none d-lg-none">
										<div class="row">
											<div class="demo-avatar-group col-3">
												<div class="main-img-user  avatar-md  mr-3">
													{{-- <img alt="avatar" class="rounded-circle" src="http://127.0.0.1:8080/assets/img/faces/4.jpg"> --}}
													<a href="{{url('MarketProfile/'.$item->userToProduct->id)}}" class="">
														<img alt="avatar" class="bd bd-2 bd-success rounded-circle"src="{{URL::asset($item->userToProduct->userToDetalis->ProfileImage)}}">
												   </a>
												</div>
											</div>
											<div class="market-data col-9 m-auto">
												<h6 class="tx-12 mb-0 mt-2 font-weight-bold text-uppercase">{{$item->name}}</h6>
												<h3 class="  ml-auto">
													 خصم % <b>{{$item->discount}}</b>
                                                </h3>
													<h4 class="tx-12 mb-0 mt-1   font-weight-bold  text-danger">₪{{$item->ThePriceAfterDiscount}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">₪{{$item->price}}</span></h4>
											</div>
										</div>


									</div>
									<div class="card-body pt-1 pt-md-3  ">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												{{-- <div class="badge bg-success">عروض المتجر</div> --}}
												{{-- <i class="mdi mdi-heart-outline ml-auto wishlist"></i> --}}
											</div>
                                            <div class="row justify-content-center">

											<a href="{{url('product-details/'.$item->id)}}">
												<img class="w-100" src="{{asset($item->productionToImgRealtions->mainImage)}}" alt="product-image">
											</a>
											<a href="{{url('MarketProfile/'.$item->userToProduct->id)}}" class="adtocart col-auto p-0 overflow-hidden  d-none d-sm-none d-md-block d-lg-block">
												 <img  class="bd bd-2 bd-success w-100 rounded-circle" src="{{URL::asset($item->userToProduct->userToDetalis->ProfileImage)}}" alt="merchant-logo"></i>
											</a>
                                        </div>

										</div>
										<div class="text-center pt-3 d-none d-sm-none d-md-block d-lg-block">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$item->name}}</h3>
											<span class="tx-15 ml-auto">
												% الخصم <b>{{$item->discount}}</b>

											</span>
											<h4 class="h5 mb-0 mt-2 text-center d-block font-weight-bold text-danger">₪{{$item->ThePriceAfterDiscount}}<span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">₪{{$item->price}}</span></h4>
										</div>

									</div>

								</div>

							</div>
						</a>

				<!-- row closed -->
                @endforeach
			</div>
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
