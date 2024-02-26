@extends('merchant.layout.merchant_master')
@section('css')
{{-- <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" /> --}}
{{-- <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" /> --}}
{{-- <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.com/libraries/Chart.js"></script>
@endsection
@section('page-header')
				<!-- breadcrumb -->
                <div class="col-12 mt-2 mb-2">
                    <h2 class=" text-light  ">مرحبا بك  <b>{{Auth::User()->name}}</b></h2>
                    <p class="pt-0 text-light">انت الان في لوحه التحكم </p>

                </div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">المنتجات المعروضه	</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0 shadow-none">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{$appendPersent}}<span class="text-success tx-13 ml-2"> </span></h4>
										<p class="mb-2 tx-12 text-muted"> منتجلت تحت المراجعه ({{$unappendPersent}})</p>
									</div>
									<div class="card-chart bg-primary-transparent brround mr-auto mt-0">
										<i class="fa-solid fa-box text-primary tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$persent}}" style="width: {{$persent}}%" class="progress-bar bg-primary " role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted"><span class="float-left text-muted">% {{$persent}} </span></small>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">عدد الزوار لمتجرك</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">
											{{$storeViews}}
                                            <span class="text-danger tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">تاجر مميز</p>
									</div>
									<div class="card-chart bg-pink-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-line-outline text-pink tx-24 fa-solid fa-users"></i>

									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div  style="width: {{$storeViews}}%" aria-valuenow="{{$storeViews}}" aria-valuemin="0" aria-valuemax="100"  class="progress-bar bg-pink " role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">استمر لتحصل علي مميزات اكثر<span class="float-left text-muted">{{$storeViews}}%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<a href="{{url('merchant/exchangePointsView')}}">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3"> 	عمليات استبدال</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1   font-weight-bold text-success">استبدال نقاط<span class="text-success tx-13 ml-2"></span></h4>
										{{-- <p class="mb-2 tx-12 text-muted">Overview of Last month</p> --}}
									</div>
									<div class="card-chart bg-teal-transparent brround mr-auto mt-0">
										{{-- <i class="typcn typcn-chart-bar-outline text-teal tx-20 fa-solid fa-signal"></i> --}}
										<i class="fa-solid fa-arrow-right-arrow-left"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-success wd-100p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">ممتازه <span class="float-left text-muted">100%</span></small>
							</div>
						</a>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<a href="{{ url('merchant/UserPoints') }}">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">عمليه شراء</h4>
									<i class="mdi mdi-dots-vertical"></i>

								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-3 mt-3 font-weight-bold">تسجيل نقاط<span class="text-success tx-13 ml-2"></span></h4>
									</div>
									<div class="card-chart bg-purple-transparent brround mr-auto mt-1">
											<i class="fa-solid fa-cart-shopping"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2 ">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-purple wd-100p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">قم بتسجيل قميه مشتريات العميل<span class="float-left text-muted"></span></small>
							</div>
							</a>
						</div>
					</div>
				</div>
				<!-- /row -->

				{{-- row --}}
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h3 class="card-title mg-b-0">جدول المنتجات</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th class="wd-15p border-bottom-0 ">اسم المنتج</th>
												<th class="wd-15p border-bottom-0 ">القسم</th>
												<th class="wd-15p border-bottom-0 ">السعر</th>
												<th class="wd-15p border-bottom-0 ">الخصم</th>
												<th class="wd-15p border-bottom-0 ">السعر بعد الخصم</th>
												<th class="wd-15p border-bottom-0 ">الحاله</th>
												<th class="wd-15p border-bottom-0 ">تحكم</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products_data as $data )

												<tr class="text-center">
													<td>{{$data->name}}</td>
													<td>{{$data->productionToCategoryRealtions->name}}</td>
													<td>{{$data->price}}</td>
													<td>{{$data->discount}}</td>
													<td>{{$data->ThePriceAfterDiscount}}</td>
														@if ($data->append == 1)
														<td class="text-success">تمت الموافقه <i class="far fa-check-circle"></i></td>
														@elseif ($data->append == 0)
														<td class="text-info">قيد المراجعة <i class="far fa-file-alt"></i></td>
														@elseif ($data->append == 2)
														<td class="text-danger">تم الرفض <i class="fas fa-ban"></i></td>
														@endif

                                                        @if ($data->append == 2)
                                                            <td><a href="{{url('merchant/preview-product/'.$data->id)}}" class="btn btn-sm btn-outline-danger">عرض</a>
                                                        @elseif ($data->append == 1)
                                                            <td><a href="{{url('merchant/preview-product/'.$data->id)}}" class="btn btn-sm btn-outline-success">عرض</a>
                                                        @else
                                                            <td><a href="{{url('merchant/preview-product/'.$data->id)}}" class="btn btn-sm btn-outline-info">عرض</a>
                                                        @endif
                                                </td>
												</tr>


											@endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- /row --}}

				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1"></h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-14 tx-muted  ">عمليات البيع</span>
							<span class="tx-12 tx-muted  ">الخاصه بكل عميل</span>
							<div class="table-responsive country-table">
								<div>
									<canvas id="myChart3"></canvas>
								  </div>

								  <script>

									let pointsCount = {!! json_encode($pointsCount) !!};

									let arr = [pointsCount[1],pointsCount[2],pointsCount[3],pointsCount[4],pointsCount[5],pointsCount[6],pointsCount[7],pointsCount[8],pointsCount[9],pointsCount[10],pointsCount[11],pointsCount[12]];

										for (let i = 0; i < arr.length; i++) {
											if (typeof arr[i] == 'undefined') {
												arr[i] = 0;
											}
										}


									const ctx2 = document.getElementById('myChart3');
									new Chart(ctx2, {
									  type: 'line',
									  data: {
										labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو" , "يوليو" , "اغسطس" , "سبتمبر" , "اكتوبر" , "نوفمبر","ديسمبر"],
										datasets: [
											{
										  label: 'عمليات شراء',
										  data: [arr[0],arr[1],arr[2],arr[3],arr[4],arr[5],arr[6],arr[7],arr[8],arr[9],arr[10],arr[11],arr[11]],
										  borderWidth: 1
										},

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
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">

							<span class="tx-14 tx-muted mb-3 ">نقاط الخاصه بالعملاء</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">تاريخ اخر عمليه</th>
											<th class="wd-lg-25p tx-right"> اسم المستخدم</th>
											<th class="wd-lg-25p tx-right">قمه الشراء</th>
											<th class="wd-lg-25p tx-right">النقاط</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($userPoint as $userPoints)

											<tr>
												<td class="tx-right tx-medium tx-inverse "  >
													{{$userPoints->created_at->diffForHumans()}}
													<span class="text-muted tx-10 float-left">
														({{Carbon\Carbon::parse($userPoints->created_at)->toDateString()}})
													</span>
												</td>
												<td role="button" class="tx-right tx-medium tx-inverse " >{{$userPoints->pointToUser->name}}</td>
												<td class="tx-right tx-medium tx-inverse " >{{$userPoints->price}} ₪</td>
												<td class="tx-right tx-medium tx-success " >{{$userPoints->points}}</td>
											</tr>
										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

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
                                    <canvas id="myChart4"></canvas>
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


                                    const ctx3 = document.getElementById('myChart4');
                                    new Chart(ctx3, {
                                        type: 'bar',
                                        data: {
                                            labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو" , "يوليو" , "اغسطس" , "سبتمبر" , "اكتوبر" , "نوفمبر","ديسمبر"],
                                            datasets: [
                                                {
                                                    label: 'اضافه نقاط',
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

                    <div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">


							<span class="tx-12 tx-muted mb-3 ">سجل النقاط</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">التاريخ</th>
											{{-- <th class="wd-lg-25p tx-right"> اسم المستخدم</th> --}}
											<th class="wd-lg-25p tx-right">قمه الشراء</th>
											<th class="wd-lg-25p tx-right">النقاط</th>
											<th class="wd-lg-25p tx-right">الحاله</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($userPointDetails as $userPoints)

											<tr>
												<td class="tx-right tx-medium tx-inverse "  >
													{{$userPoints->created_at->diffForHumans()}}
													<span class="text-muted tx-10 float-left">
														({{Carbon\Carbon::parse($userPoints->created_at)->toDateString()}})
													</span>
												</td>
												{{-- <td role="button" class="tx-right tx-medium tx-inverse " >{{$userPoints->pointsToDetails->pointToUser->name}}</td> --}}
												<td class="tx-right tx-medium tx-inverse " >{{$userPoints->price}} ₪</td>
												@if ($userPoints->type == 'add')
												<td class="tx-right tx-medium tx-success " >{{$userPoints->points}}</td>

													<td class="tx-right tx-medium tx-success " >
														اضافه +
													</tr>
												@else
												<td class="tx-right tx-medium tx-danger " >{{$userPoints->points}}</td>

												<td class="tx-right tx-medium tx-danger " >
													خصم -
												</tr>
												@endif
											</td>
										@endforeach

									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script> --}}
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
