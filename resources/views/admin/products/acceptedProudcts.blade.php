@extends('admin.layout.admin_master')
@section('css')
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header rounded justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto   ">المنتجات المقبوله</h4><span class="   mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row m-3 mt-5">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    المنتجات التي تم القبول بها
									<h3 class="card-title mg-b-0 text-center tx-28">
                                        <i class="fa-regular fa-circle-check fa-xl  text-success"></i>
                                    </h3>
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Hoverable Rows Table.. <a href="">Learn more</a></p> --}}
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover mb-0 text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th>رقم</th>
												<th>التاجر</th>
												<th>اسم المنتج  </th>
												<th>القسم</th>
												<th>رفض !</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($products as $product )


											<tr class="text-center">
												<th scope="row">{{$product->id}}</th>
												<td>{{$product->userToProduct->name}}</td>
												<td>{{$product->name}}</td>
												<td>{{$product->productionToCategoryRealtions->name}}</td>
												<td class="text-danger">
                                                    <a class="btn btn-danger  modal-effect" data-target="#modaldemo{{$product->id}}" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo{{$product->id}}">
                                                            رفض
                                                    </a>
                                                            <!-- delete  Modal effects-->
                                                            <form action="{{Route('unappendProduct')}}" method="post">
                                                                @csrf
                                                                <div class="modal" id="modaldemo{{$product->id}}">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content modal-content-demo">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title">اكتب رساله الرفض الخاصه بالمنتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h6></h6>
                                                                                <textarea rows="5"  class="form-control" name="redjectmass"   type="text">أهلا بك يا {{$product->userToProduct->name}} &#13;&#10; ناسف علي رفض منتجك  بسبب :&#13;&#10;   </textarea>
                                                                                {{-- <input type="hidden"   name="merchantId" value="{{$product->id}}"> --}}
                                                                                <input type="hidden"   name="productsId" value="{{$product->id}}">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn ripple btn-danger" type="submit">ارسال</button>
                                                                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- End Modal effects-->
                                                </td>

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

<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script> // now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/dataTables.buttons.min.js')}}"></script>

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

@endsection
