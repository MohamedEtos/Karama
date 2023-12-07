@extends('merchant.layout.merchant_master')
@section('css')

<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل المنتجات</span>
						</div>
					</div>
					{{-- <div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				 <div class="row">
					<div class="col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<!-- Shopping Cart-->
								<div class="product-details table-responsive text-nowrap">
									<table class="table table-bordered table-hover mb-0 text-nowrap">
										<thead>
											<tr>
												<th class="text-right"><h4>المنتجات</h4></th>
												<th class="w-150"><h4>السعر</h4></th>
												<th> <h4>الخصم %</h4> </th>
												<th><h4>السعر بعد الخصم</h4></th>
												<th><h4>التحكم</h4></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products_data as $data )
											<tr id="row{{$data->id}}">
													<td>
														<div class="media">
															<div class="card-aside-img">
																<img src="{{URL::asset($data->img)}}" alt="img" class="h-80 w-80">
															</div>
															<div class="media-body">
																<div class="card-item-desc mt-0">
																	<h6 class="font-weight-semibold mt-0 text-uppercase">{{$data->name}}</h6>
																	<dl class="card-item-desc-1">
																	<dt>القسم: </dt>
																	<dd>{{$data->category}}</dd>
																	</dl>
																	<dl class="card-item-desc-1">
																	<dt>وصف المنتج: </dt>
																	<dd>{{$data->productDescription}}</dd>
																	</dl>
																</div>
															</div>
														</div>
													</td>
													<td class="text-center text-lg text-medium">{{$data->price}} <b>₪</b></td>
	
													<td class="text-center text-lg text-medium">{{$data->discount}} <b>%</b></td>
													<td class="text-center text-lg text-medium">{{$data->ThePriceAfterDiscount}} <b>₪</b></td>

													<td class="text-center">

														<a class="remove-from-cart m-3" href="{{url('merchant/edit-product/'.$data->id)}}" data-toggle="tooltip" title="" data-original-title="تعديل المنتج"><i style="color:#213B74" class="fa-solid fa-pen-to-square  fa-lg"></i>
														</a>
														<a class="remove-from-cart m-3 swal-ajax"  href="#" proId='{{$data->id}}' data-toggle="tooltip" title="" data-original-title="حذف المنتج"><i class="fa fa-trash fa-lg"></i>
														</a>
														<form>
															<input type="hidden" name="proId" value="{{$data->id}}" >
														</form>
														
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="shopping-cart-footer  border-top-0">
									<div class="column">
										<form class="coupon-form" method="post">
											<input class="form-control" type="text" placeholder="Coupon code" required="">
											<button class="btn btn-outline-primary" type="submit">Apply Coupon</button>
										</form>
									</div>
									<div class="column text-lg">Subtotal: <span class="tx-20 font-weight-bold mr-2">$112</span></div>
								</div>
								<div class="shopping-cart-footer">
									<div class="column"><a class="btn btn-secondary" href="#">Back to Shopping</a></div>
									<div class="column"><a class="btn btn-primary" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a><a class="btn btn-success" href="#">Checkout</a></div>

								</div>
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
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
<!--Internal   Notify -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>


<script>

// copytext

$( document ).ready(function() {

	$('.swal-ajax').click(function (event) {
			swal({
			title: "هل انت متاكد !",
			text: "المنتجات المحذوفه لن تتمكن من استرجاعها",
			type: "info",
			showCancelButton: true,
			cancelButtonText: 'الغاء',
			confirmButtonText: 'تاكيد',
			closeOnConfirm: false,
			showLoaderOnConfirm: true
			}, function () {

				$.ajax({
                type: "POST",
                url: "{{route('destroy')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'id':$(event.target).parent().parent().attr('proId') // this line to git product id each
                },
                success: function (data) {
					$('#row' + data.id).slideUp(400);

					setTimeout(function () {
						swal("تم حذف المنتج");
					}, 500);

				},complete : function(data){
					console.log(data.test);
					 

				},errors:function(){
					setTimeout(function () {
						swal("يوجد مشكله برجاء التاوصل معي الاداره");
					}, 500);
                }
            });

			});
		});



});
	

</script>




@endsection