@extends('layouts.users.master')

@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/nestDropdown.css')}}">

<style>
.modal-backdrop{
    display: none

}

.modal-content{
    /* display: none !important; */
}
</style>
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header mt-3 justify-content-between mb-2 rounded ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">العروض والمنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
                {{-- <input type="hidden" id="UID" value="{{Auth::User()->id}}"> --}}

					<div class="row ">

                        @foreach ($products as $product)
							<div class="col-md-4 col-lg-3 col-xl-3  col-sm-6">
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
                                            <div class="row justify-content-center">

											<a href="{{url('product-details/'.$product->id)}}">
												<img class="w-100" src="{{asset($product->productionToImgRealtions->mainImage)}}" alt="product-image">
											</a>
											<a href="{{url('MarketProfile/'.$product->userToProduct->id)}}" class="adtocart col-auto overflow-hidden p-0  d-none d-sm-none d-md-block d-lg-block">
												 <img  class="bd bd-2 bd-success w-100 rounded-circle" src="{{URL::asset($product->userToProduct->userToDetalis->ProfileImage)}}" alt="merchant-logo"></i>
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
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<script src="{{URL::asset('assets/js/rangeliderNavbar.js')}}"></script>




<script>


</script>
@endsection
