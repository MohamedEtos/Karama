@extends('admin.layout.admin_master')
@section('css')
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

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
				<div class="breadcrumb-header rounded justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-light ">المنتجات المقبوله</h4><span class=" text-light mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row m-3">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">المنتجات التي تم القبول بها</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Hoverable Rows Table.. <a href="">Learn more</a></p> --}}
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover mb-0 text-md-nowrap">
										<thead>
											<tr>
												<th>رقم</th>
												<th>التاجر</th>
												<th>اسم المنتج  </th>
												<th>القسم</th>
												<th>سبب الرفض</th>
												<th>الحاله</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($products as $product )
                                                
                                            
											<tr>
												<th scope="row">{{$product->id}}</th>
												<td>{{$product->userToProduct->name}}</td>
												<td>{{$product->name}}</td>
												<td>{{$product->productionToCategoryRealtions->name}}</td>
												<td class="text-danger">{{$product->rejectMess->rejectMessage}}</td>
												<td class="text-success"><i class="fa-regular fa-circle-xmark text-danger"></i></td>
											</tr>
                                            @endforeach
										</tbody>

									</table>
						                

								</div>
							</div>
                            <div class="col-12 mt-2">
                                {{$products->links()}}
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
<!---Internal  Multislider js-->
<script src="{{URL::asset('assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{URL::asset('assets/js/carousel.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>



@endsection