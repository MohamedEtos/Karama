@extends('admin.layout.admin_master')
@section('css')
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdnjs.com/libraries/Chart.js"></script>


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
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
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
											<h4 class="tx-20 font-weight-bold mb-1 text-white">₪{{$weekpoints}}</h4>
											<p class="mb-0 tx-12 text-white op-7">النقاط العملاء  من شراء المنتجات</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -23.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عمليات استبدال نقاط هذه الاسبوع</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">₪{{$weekTransPoints}}</h4>
											<p class="mb-0 tx-12 text-white op-7">تم تحويل نقاط بقيمه</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-up text-white"></i>
											<span class="text-white op-7"> 52.09%</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white"> منتجات تحت المراجعه</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">₪{{$unappendproduct}}</h4>
											<p class="mb-0 tx-12 text-white op-7">  منتجات بقيمه ₪{{$unappendproduct}} لم يتم مراجعتها بعد </p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -152.3</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
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
																{{-- <div id="spark1" class="wd-100p"></div> --}}
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
				{{-- row  --}}

				<div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="card card-table-two">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-1"></h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <span class="tx-12 tx-muted ">عمليات النقاط</span>
                            <span class="tx-12 tx-muted  ">عمليات تحويل النقاط </span>

                            <div class="table-responsive country-table">
                                <div>
                                    <canvas id="myChart7"></canvas>
                                </div>

                                <script>

                                    let pointsadd = {!! json_encode($pointsAddCount) !!};

                                    let arradd = [pointsadd[1],pointsadd[2],pointsadd[3],pointsadd[4],pointsadd[5],pointsadd[6],pointsadd[7],pointsadd[8],pointsadd[9],pointsadd[10],pointsadd[11],pointsadd[12]];

                                    for (let i = 0; i < arradd.length; i++) {
                                        if (typeof arradd[i] == 'undefined') {
                                            arradd[i] = 0;
                                        }
                                    }


                                    let pointsSub = {!! json_encode($pointsSubCount) !!};

                                    let arrSub = [pointsSub[1],pointsSub[2],pointsSub[3],pointsSub[4],pointsSub[5],pointsSub[6],pointsSub[7],pointsSub[8],pointsSub[9],pointsSub[10],pointsSub[11],pointsSub[12]];

                                    for (let i = 0; i < arrSub.length; i++) {
                                        if (typeof arrSub[i] == 'undefined') {
                                            arrSub[i] = 0;
                                        }
                                    }


                                    const ctx3 = document.getElementById('myChart7');
                                    new Chart(ctx3, {
                                        type: 'bar',
                                        data: {
                                            labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو" , "يوليو" , "اغسطس" , "سبتمبر" , "اكتوبر" , "نوفمبر","ديسمبر"],
                                            datasets: [
                                                {
                                                    label: 'عمليه بيع',
                                                    data: [arradd[0],arradd[1],arradd[2],arradd[3],arradd[4],arradd[5],arradd[6],arradd[7],arradd[8],arradd[9],arradd[10],arradd[11],arradd[11]],
                                                    borderWidth: 1
                                                },{
                                                    type: 'bar',
                                                    label: 'استبدال نقاط',
                                                    data: [arrSub[0],arrSub[1],arrSub[2],arrSub[3],arrSub[4],arrSub[5],arrSub[6],arrSub[7],arrSub[8],arrSub[9],arrSub[10],arrSub[11],arrSub[11]],
                                                    borderWidth: 1

                                                }

                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>





					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1"></h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">المنتجات</span>
							<div class="table-responsive country-table">
								<div>
									<canvas id="myChart4"></canvas>
								  </div>


								  <script>
									var MCC = {!! json_encode($MCC) !!};
									const ctx = document.getElementById('myChart4');
									new Chart(ctx, {
									  type: 'bar',
									  data: {
										labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو" , "يوليو" , "اغسطس" , "سبتمبر" , "اكتوبر" , "نوفمبر","ديسمبر"],
										datasets: [{
										  label: 'منتج',
										  data: [MCC[1],MCC[2],MCC[3],MCC[4],MCC[5],MCC[6],MCC[7],MCC[8],MCC[9],MCC[10],MCC[11],MCC[12]],
										  borderWidth: 1,
										  borderColor: '#36A2EB',
										  backgroundColor: '#36A2EB	',

										}]
									  },
									  options: {
										scales: {
										  y: {
											beginAtZero: true
										  }
										}
									  }
									});
								  </script>
								</div>
							</div>
					</div>

					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1"></h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">تسجيل الاعضاء</span>
							<div class="table-responsive country-table">
								<div>
									<canvas id="myChart3"></canvas>
								  </div>

								  <script>

									var usermcount = {!! json_encode($usermcount) !!};

									let arr = [usermcount[1],usermcount[2],usermcount[3],usermcount[4],usermcount[5],usermcount[6],usermcount[7],usermcount[8],usermcount[9],usermcount[10],usermcount[11],usermcount[12]];

										for (let i = 0; i < arr.length; i++) {
										if (typeof arr[i] == 'undefined') {
											arr[i] = 0;
										}
										}

									var mercahntCC = {!! json_encode($mercahntCC) !!};

									let marr = [mercahntCC[1],mercahntCC[2],mercahntCC[3],mercahntCC[4],mercahntCC[5],mercahntCC[6],mercahntCC[7],mercahntCC[8],mercahntCC[9],mercahntCC[10],mercahntCC[11],mercahntCC[12]];

										for (let i = 0; i < marr.length; i++) {
										if (typeof marr[i] == 'undefined') {
											marr[i] = 0;
										}
										}


									const ctx2 = document.getElementById('myChart3');
									new Chart(ctx2, {
									  type: 'line',
									  data: {
										labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو" , "يوليو" , "اغسطس" , "سبتمبر" , "اكتوبر" , "نوفمبر","ديسمبر"],
										datasets: [
											{
										  label: 'عضو',
										  data: [arr[0],arr[1],arr[2],arr[3],arr[4],arr[5],arr[6],arr[7],arr[8],arr[9],arr[10],arr[11],arr[11]],
										  borderWidth: 1
										},
										{

											label: 'متجر',
											data: [marr[0],marr[1],marr[2],marr[3],marr[4],marr[5],marr[6],marr[7],marr[8],marr[9],marr[10],marr[11],marr[11]],
											borderWidth: 1

										}
									]
									  },
									  options: {
										scales: {
										  y: {
											beginAtZero: true
										  }
										}
									  }
									});
								  </script>
								</div>
						</div>
					</div>





				</div>

				{{-- row closed  --}}
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
														{{	$reviewproducts->created_at->diffForHumans()}}
														<span class="text-muted tx-10 float-left">
														({{Carbon\Carbon::parse($reviewproducts->created_at)->toDateString()}})
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
								@foreach ( $totalpoints as $totalpoint )
								<div class="list-group-item border-top-0    ">
									<i class="flag-icon flag-icon-us flag-icon-squared"></i>
									<p>{{$totalpoint->pointToUser->name}}</p><span>{{$totalpoint->points}}</span>
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
										@foreach ( $exchangPointTable as $exchangPoints )
											<tr>

												<td class="tx-right tx-medium tx-inverse clicker"  onclick="window.location='{{url('admin/reviewProudcts/'.Crypt::encrypt($exchangPoints->id))}}'">
													{{$exchangPoints->created_at->diffForHumans()}}
													<span class="text-muted tx-10 float-left">
														({{Carbon\Carbon::parse($exchangPoints->created_at)->toDateString()}})
													</span>
												</td>
                                                <td class="tx-right tx-medium tx-inverse">{{$exchangPoints->pointsToDetails->pointTomerchant->name}}</td>
                                                <td class="tx-right tx-medium tx-inverse">{{$exchangPoints->pointsToDetails->pointToUser->name}}</td>
													<td class="tx-right tx-medium tx-success">{{$exchangPoints->points	}} </td>
													<td class="tx-right tx-medium tx-danger">{{$exchangPoints->price}} ₪</td>
												</tr>inverse
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
{{-- <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script> --}}
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
