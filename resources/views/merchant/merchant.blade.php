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
										<i class="typcn typcn-chart-line-outline text-pink tx-24"></i>
										
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
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">حاله الحساب</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-1   font-weight-bold text-success">يعمل جيدا<span class="text-success tx-13 ml-2"></span></h4>
										{{-- <p class="mb-2 tx-12 text-muted">Overview of Last month</p> --}}
									</div>
									<div class="card-chart bg-teal-transparent brround mr-auto mt-0">
										<i class="typcn typcn-chart-bar-outline text-teal tx-20"></i>
									</div>
								</div>

								<div class="progress progress-sm mt-2">
									<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-success wd-100p" role="progressbar"></div>
								</div>
								<small class="mb-0  text-muted">ممتازه <span class="float-left text-muted">100%</span></small>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body iconfont text-right">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-3">الوصول السريع</h4>
									<i class="mdi mdi-dots-vertical"></i>
								</div>
								<div class="d-flex mb-0">
									<div class="">
										<h4 class="mb-3 mt-3 font-weight-bold">اضافه منتج<span class="text-success tx-13 ml-2"></span></h4>
									</div>
									<div class="card-chart bg-purple-transparent brround mr-auto mt-1">
										<a href="{{ url('merchant/new-product') }}">
											<i class="fa-solid fa-plus  tx-24"></i>
										</a>
									</div>
								</div>

								<div class="progress progress-sm mt-2 mb-3">
									<div aria-valuemax="100" aria-val	uemin="0" aria-valuenow="100" class="progress-bar bg-purple wd-100p" role="progressbar"></div>
								</div>
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
												<td><a href="{{url('merchant/preview-product/'.$data->id)}}" class="btn btn-sm btn-outline-primary">عرض</a></td>
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
