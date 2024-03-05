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
									<table class="table text-md-nowrap" id="example1"   data-ordering="false">
										<thead>
											<tr class="text-center">
												<th class="wd-15p border-bottom-0 ">المتجر</th>
												<th class="wd-15p border-bottom-0 ">القسم</th>
												<th class="wd-15p border-bottom-0 ">كل 100 ن </th>
												<th class="wd-15p border-bottom-0 ">حد الاستبدال</th>
												<th class="wd-15p border-bottom-0 ">تاريخ الاضافه </th>
												<th class="wd-15p border-bottom-0 ">العمليه</th>
											</tr>
										</thead>
										<tbody>
                                                
                                            @foreach ($allMerchant as $data )
                                            <tr class="text-center">
                                                <td>{{ $data->pointRules->name }}</td>
                                                <td>{{ $data->pointRules->userToDetalis->userToCategory->name }}</td>
                                                <td>{{ $data->transferPoints }}</td>
                                                <td>{{ $data->exchangeLimit }}</td>
                                                <td>{{ $data->pointRules->userToDetalis->created_at->diffForHumans() }}</td>                                            </tr>
                                                <td><button class="btn btn-danger btn-sm">حفظ</button></td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse
 
										</tbody>
									</table>
								</div>
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
<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script> // now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/dataTables.buttons.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
