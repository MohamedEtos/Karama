@extends('admin.layout.admin_master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header    rounded opacity-50 justify-content-between ">
					<div class="left-content">
						<div class="">
						  <h2 class="   main-content-title  tx-24 mg-b-1 mg-b-lg-1">سجل النقاط</h2>
						</div>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')

				{{-- row --}}
				<div class="row">
					<div class="col-lg-8 col-xl-9 col-md-12 col-sm-12">
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
									<table class="table text-md-nowrap" id="example1" data-ordering="false">
										<thead>
											<tr class="">
												<th class=" border-bottom-0 ">#</th>
												<th class=" border-bottom-0 ">الراسل</th>
												<th class=" border-bottom-0 ">المستلم</th>
												<th class=" border-bottom-0 ">OTP</th>
												<th class="border-bottom-0 ">تاريخ</th>
												<th class="border-bottom-0 ">متبقي</th>
												<th class="border-bottom-0 ">الحاله</th>

											</tr>
										</thead>
										<tbody>
											@foreach ($validOTP as $data )

												<tr class="">
													<td>{{$data->id}}</td>
													<td>{{$data->notifyMerchant->name}}</td>
													<td>{{$data->notifyUser->name}}</td>
													<td>{{$data->OTP}}</td>
													<td>{{$data->created_at->diffForHumans()}}</td>
                                                    <td>{{$data->created_at->addMinutes(10)->diffForHumans()}}</td>
                                                    <td>{{$data->succeed == 0 ?  'لم يستخدم' :  'تم الاستخدام'}}</td>
												</tr>

											@endforeach

										</tbody>
									</table>
                                    {{-- {{ $notify->links() }} --}}
								</div>
							</div>
						</div>
					</div>

                    @include('admin.notify.list');



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
