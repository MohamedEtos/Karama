@extends('layouts.users.master')
@section('css')

<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between m-2">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto p-2 rounded-4  alert aler-danger">العروض والمنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm ">

					<div class="col-xl-10 col-lg-10 col-md-12">

						<div class="card shadow-none">
							<div class="card-body p-2">
								<div class="input-group">
									<input type="text" class="form-control " placeholder="بحث ...">
									<span class="input-group-append">
										<button class="btn btn-primary" type="button">بحث</button>
									</span>
								</div>
							</div>
						</div>
@php
// $products = App\Models\merchant::latest()->paginate(15);
$products = App\Models\merchant::latest()->paginate(15);
@endphp



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
					<div class="col-xl-2 col-lg-2 col-md-12 mb-3 mb-md-0">
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
@endsection
