@extends('merchant.layout.merchant_master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between ">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك  <b>{{Auth::User()->name}}</b></h2>
						  <p class="mg-b-0">انت الان في لوحه التحكم </p>
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
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">المنتجات المعروضه	</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">{{$products_count}}<span class="text-success tx-13 ml-2"> </span></h4>
										<p class="mb-2 tx-12 text-muted">المنتجات اللتي تم الموافقه عليها</p>
									</div>
									<div class="card-chart bg-primary-transparent brround mr-auto mt-0">
										<i class="typcn typcn-group-outline text-primary tx-24"></i>
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
                                            @foreach ($visitors as $visitor)
                                                {{$visitor->views}}
                                            @endforeach
                                            <span class="text-danger tx-13 ml-2"></span></h4>
										<p class="mb-2 tx-12 text-muted">Overview of Last month</p>
									</div>
									<div class="card-chart bg-pink-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-line-outline text-pink tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-pink wd-50p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">Monthly<span class="float-left text-muted">50%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">Bounce Rate</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1   font-weight-bold">76.3%<span class="text-success tx-13 ml-2">(+13.52%)</span></h4>
										<p class="mb-2 tx-12 text-muted">Overview of Last month</p>
									</div>
									<div class="card-chart bg-teal-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-bar-outline text-teal tx-20"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-teal wd-60p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">Monthly<span class="float-left text-muted">60%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">Visits Duration</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1 font-weight-bold">5m 24s<span class="text-success tx-13 ml-2">(+19.5%)</span></h4>
										<p class="mb-2 tx-12 text-muted">Overview of Last month</p>
									</div>
									<div class="card-chart bg-purple-transparent brround mr-auto mt-0">
										<i class="typcn typcn-time  text-purple tx-24"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-purple wd-40p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">Monthly<span class="float-left text-muted">40%</span></small>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				{{-- row --}}
				<div class="col-xl-12">
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
											<th class="wd-20p border-bottom-0 ">السعر</th>
											<th class="wd-15p border-bottom-0 ">الخصم</th>
											<th class="wd-10p border-bottom-0 ">السعر بعد الخصم</th>
											<th class="wd-25p border-bottom-0 ">الحاله</th>
											<th class="wd-25p border-bottom-0 ">تحكم</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($products_data as $data )

											<tr class="text-center">
												<td>{{$data->name}}</td>
												<td>{{$data->category}}</td>
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
												<td><a href="	" class="btn btn-sm btn-outline-primary">تفاصيل</a></td>
											</tr>


										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				{{-- /row --}}
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
