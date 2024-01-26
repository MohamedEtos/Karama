@extends('admin.layout.admin_master')
@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title text-light tx-24 mg-b-1 mg-b-lg-1">اهلا بك يا {{ Auth::User()->name}}</h2>
						  <p class="mg-b-0 text-light">لوحه تحكم الادمن</p>
						</div>
					</div>
					<div class="main-dashboard-header-right text-light">
						{{-- <div>
							<label class="tx-13 text-light text-center">الزوار</label>
							<div class="main-star text-light">
								 <span class="text-center">({{$visetorsUnique}})</span>
							</div>
						</div> --}}
						<div>
							<label class="tx-13 text-light text-center">التجار</label>
							<h5 class="text-light text-center">{{$merchantCount}}</h5>
						</div>
						<div>
							<label class="tx-13 text-light text-center">التجار</label>
							<h5 class="text-light text-center">{{$merchantCount}}</h5>
						</div>
						<div>
							<label class="tx-13 text-light text-center">الاعضاء</label>
							<h5 class="text-light text-center">{{$usersCount}}</h5>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">منتجات هذه الاسبوع</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">₪{{$todayOrdersPrice}}</h4>
											<p class="mb-0 tx-12 text-white op-7">المنتجات التي تم اضافتها هذه الاسبوع</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> +{{$todayOrders}}</span>
										</span>
									</div>
								</div>
							</div>
							{{-- <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span> --}}
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">نقاط الاسبوع</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$1,230.17</h4>
											<p class="mb-0 tx-12 text-white op-7">النقاط العملاء  من شراء المنتجات</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -23.09%</span>
										</span>
									</div>
								</div>
							</div>
							{{-- <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span> --}}
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عمليات تحويل النقاط</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$7,125.70</h4>
											<p class="mb-0 tx-12 text-white op-7">تم تحويل نقاط بقيمه</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 52.09%</span>
										</span>
									</div>
								</div>
							</div>
							{{-- <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span> --}}
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">$4,820.50</h4>
											<p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -152.3</span>
										</span>
									</div>
								</div>
							</div>
							{{-- <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span> --}}
						</div>
					</div>
				</div>
				<!-- row closed -->



				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-4 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">اجدد الاعضاء</h3>
								<p class="tx-12 mb-0 text-muted">الاعضاء المسجلين حديثاً في نادي الكرامه</p>
							</div>
							<div class="card-body p-0 customers mt-1">
								<div class="list-group list-lg-group list-group-flush">
									@foreach ($userdata as $users )
										<a href="{{url('admin/editUser/'.$users->id)}}">
											<div class="list-group-item list-group-item-action" >
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset($users->userToDetalis->ProfileImage)}}" alt="Image description">
													<div class="media-body">
														<div class="d-flex align-items-center">
															<div class="mt-0">
																<h5 class="mb-1 tx-15">{{$users->name}}</h5>
																<p class="mb-0 tx-13 text-muted"> <span class="text-success ml-2">متصل</span> رقم الاشتراك: #{{$users->usercode}} </p>
															</div>
															<span class="mr-auto wd-45p fs-16 mt-2">
																<div id="spark1" class="wd-100p"></div>
															</span>
														</div>
													</div>
												</div>
											</div>
										</a>	
									@endforeach

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">اجدد التجار</h3>
								<p class="tx-12 mb-0 text-muted">التجار المسجلين حديثاً في نادي الكرامه</p>
							</div>
							<div class="card-body p-0 customers mt-1">
								<div class="list-group list-lg-group list-group-flush">
									@foreach ($merchantdata as $merchant )
										<a href="{{url('admin/editStoreView/'.Crypt::encrypt($merchant->id))}}">
											<div class="list-group-item list-group-item-action" >
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset($merchant->userToDetalis->ProfileImage)}}" alt="Image description">
													<div class="media-body">
														<div class="d-flex align-items-center">
															<div class="mt-0">
																<h5 class="mb-1 tx-15">{{$merchant->name}}</h5>
																<p class="mb-0 tx-13 text-muted"> <span class="text-success ml-2">متصل</span> رقم الاشتراك: #{{$merchant->usercode}} </p>
															</div>
															<span class="mr-auto wd-45p fs-16 mt-2">
																<div id="spark1" class="wd-100p">{{$merchant->userToDetalis->phone}}</div>
															</span>
														</div>
													</div>
												</div>
											</div>
										</a>	
									@endforeach

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header pb-1">
								<h3 class="card-title mb-2">الاقسام الجديده</h3>
								<p class="tx-12 mb-0 text-muted">الاقسام المضافه حديثاً الي المتجر</p>
							</div>
							<div class="card-body p-0 customers mt-1">
								<div class="list-group list-lg-group list-group-flush">
									@foreach ($category as $categorys )
										<a href="{{url('all/category')}}">
											<div class="list-group-item list-group-item-action" >
												<div class="media mt-0">
													<div class="media-body">
														<div class="d-flex align-items-center">
															<div class="mt-0">
																<h5 class="mb-1 tx-15">{{$categorys->name}}</h5>
																<p class="mb-0 tx-13 text-muted"> <span class="text-success ml-2"></span>   {{$categorys->descrption}} </p>
															</div>
															<span class="mr-auto wd-45p fs-16 mt-2">
																{{-- <div id="spark1" class="wd-100p">{{$categorys->subCategoryRelation->name}}</div>	 --}}
															</span>
														</div>
													</div>
												</div>
											</div>
										</a>	
									@endforeach

								</div>
							</div>
						</div>
					</div>

					

				</div>
				<!-- row close -->

				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-dashboard-eight pb-2">
							<h6 class="card-title">اخر المنتجات</h6><span class="d-block mg-b-10 text-muted tx-12">اخر المنتجات المعروضه في المتجر</span>
							<div class="list-group">
								@foreach ( $lastOrders as $lastOrder )
								<div class="list-group-item border-top-0    ">
									<i class="flag-icon flag-icon-us flag-icon-squared"></i>
									<p>{{$lastOrder->name}}</p><span>{{$lastOrder->ThePriceAfterDiscount}} ₪</span>
								</div>
							@endforeach


							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">المراجعات</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">المنتجات تحت المراجعه</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">التاريخ</th>
											<th class="wd-lg-25p tx-right"> المتجر</th>
											<th class="wd-lg-25p tx-right">المنتج</th>
											<th class="wd-lg-25p tx-right">السعر</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $reviewproduct as $reviewproducts )
											<tr>

													<td class="tx-right tx-medium tx-inverse clicker"  onclick="window.location='{{url('admin/reviewProudcts/'.Crypt::encrypt($reviewproducts->id))}}'">
														{{Carbon\Carbon::parse($reviewproducts->created_at)->format('l')}} 
														<span class="text-muted tx-10">
															{{Carbon\Carbon::parse($reviewproducts->created_at)->toDateString()}}
														</span>
													</td>
													<td role="button" class="tx-right tx-medium tx-inverse clicker" onclick="window.location='{{url('admin/reviewProudcts/'.Crypt::encrypt($reviewproducts->id))}}'">{{$reviewproducts->userToProduct->name}}</td>
													<td class="tx-right tx-medium tx-inverse clicker" onclick="window.location='{{url('admin/reviewProudcts/'.Crypt::encrypt($reviewproducts->id))}}'">{{$reviewproducts->name}}</td>
													<td class="tx-right tx-medium tx-danger clicker" onclick="window.location='{{url('admin/reviewProudcts/'.Crypt::encrypt($reviewproducts->id))}}'">{{$reviewproducts->ThePriceAfterDiscount}} ₪</td>
												</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-dashboard-eight pb-2">
							<h6 class="card-title">نقاط العملاء</h6><span class="d-block mg-b-10 text-muted tx-12">نقاط لم يتم تحويلها بعد</span>
							<div class="list-group">
								@foreach ( $lastOrders as $lastOrder )
								<div class="list-group-item border-top-0    ">
									<i class="flag-icon flag-icon-us flag-icon-squared"></i>
									<p>{{$lastOrder->name}}</p><span>{{$lastOrder->ThePriceAfterDiscount}}</span>
								</div>
							@endforeach


							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">النقاط</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">عمليات تحويل النقاط</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-20p">التاريخ</th>
											<th class="wd-lg-20p tx-right"> المتجر</th>
											<th class="wd-lg-20p tx-right">المستخدم</th>
											<th class="wd-lg-20p tx-right">النقاط</th>
											<th class="wd-lg-20p tx-right">السعر</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $reviewproduct as $reviewproducts )
											<tr>

													<td>{{$reviewproducts->created_at}}</td>
													<td class="tx-right tx-medium tx-inverse">{{$reviewproducts->userToProduct->name}}</td>
													<td class="tx-right tx-medium tx-inverse">{{$reviewproducts->name}}</td>
													<td class="tx-right tx-medium tx-danger">{{$reviewproducts->ThePriceAfterDiscount}} ₪</td>
													<td class="tx-right tx-medium tx-danger">{{$reviewproducts->ThePriceAfterDiscount}} ₪</td>
												</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>	    


@endsection
