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
									<h3 class="card-title mg-b-0">جدول النقاط</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Karama SC  Simple Table. <a href="">Learn more</a></p> --}}
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1"   >
										<thead>
											<tr class="text-center">
												<th class="wd-15p border-bottom-0 ">المتجر</th>
												<th class="wd-15p border-bottom-0 ">رقم المتجر</th>
												<th class="wd-15p border-bottom-0 ">حد استبدال النقاط</th>
												<th class="wd-15p border-bottom-0 ">علي كل 100 شيكل</th>
												<th class="wd-15p border-bottom-0 ">تاريخ الاضافه </th>
												<th class="wd-15p border-bottom-0 ">العمليه</th>

											</tr>
										</thead>
										<tbody>
											@forelse ($allMerchant as $data )
                                                <tr class="text-center">
                                                    <td>{{ $data->ToPointRules->name }}</td>
                                                    <td>{{ $data->ToPointRules->usercode }}</td>
                                                    <td>{{ $data->transferPoints}}</td>
                                                    <td>{{ $data->exchangeLimit }}</td>
                                                    <td>{{ $data->ToPointRules->created_at->diffForHumans()  }}</td>
                                                    <td><a class="btn ripple btn-danger btn-sm" data-target="#modaldemo3x{{$data->ToPointRules->id}}" data-toggle="modal" href="">تعديل </a></td>

                                                    <!-- Button trigger modal -->
                                                    <div class="modal" id="modaldemo3x{{$data->ToPointRules->id}}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">تعديل النقاط</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                                                    <form method="post" action="{{route('updatePointRules')}}" >
                                                                </div>
                                                                    <div class="modal-body">
                                                                            @csrf
                                                                            {{-- <input type="hidden" name="categoryId" value=""> --}}

                                                                        <div class="mb-3">
                                                                            <label for="name">علي كل نقطه </label>
                                                                            <input type="text" class="form-control" value="{{ $data->transferPoints}}" name="transferPoints" id="{{ $data->transferPoints}}">
                                                                            <input type="hidden" name="MID" value="{{$data->ToPointRules->id}}"  id="{{$data->ToPointRules->id}}">

                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="name">الحد الادني للاستبدال</label>
                                                                            <input type="text" class="form-control" value="{{ $data->exchangeLimit}}" name="exchangeLimit" id="">
                                                                        </div>


                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button class="btn ripple btn-danger" type="submit"  >حفظ التعديلات</button>
                                                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Button trigger modal -->


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
