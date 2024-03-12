@extends('admin.layout.admin_master')
@section('css')
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-light "> الاعضاء</h4><span class="text-light mt-1 tx-13 mr-2 mb-0">/ قائمه الاعضاء</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">الاعضاء</h4>
									{{-- <i class="mdi mdi-dots-horizontal text-gray"></i> --}}
									<a class="h5" href="{{Route('registerUserView')}}"> اضافه اعضاء جدد </a>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">بيانات كل الاعضاء </p>
							</div>
							<div class="card-body">
								<div class="table-responsive  userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example1">
										<thead>
											<tr  class="text-right">
												<th class="wd-lg-8p text-center"><span>الاسم</span></th>
												<th class="wd-lg-20p"><span></span></th>
												<th class="wd-lg-20p"><span>كود المشترك</span></th>
												<th class="wd-lg-20p"><span>الهاتف</span></th>
												<th class="wd-lg-20p"><span>نهايه الاشتراك</span></th>
												<th class="wd-lg-20p"><span>الحاله</span></th>
												<th class="wd-lg-20p"><span>اخر ظهور</span></th>
												<th class="wd-lg-20p">تحكم</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($AllUser as $user )
											<tr class="text-right">
												<td>
													<img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset($user->userToDetalis->ProfileImage)}}">
												</td>
												<td>{{$user->name}}</td>
												<td>
													{{$user->usercode}}
												</td>
												<td>
													{{$user->userToDetalis->phone}}
												</td>
												<td>
													{{$user->endOfSubscription}}
												</td>
												<td class="text-center">
													<span class="label text-muted d-flex"><div class="dot-label bg-gray-300
                                                        @php
                                                            if ($user->status == 'active'){
                                                                echo 'bg-success';
                                                            }else {
                                                                echo 'bg-gray-300';
                                                            }

                                                        @endphp
                                                    ml-1">
                                                </div>
                                                @php
                                                    if($user->status == 'active'){
                                                        echo 'مفعل';
                                                    }else {
                                                        echo 'غير مفعل';
                                                    }
                                                @endphp
                                                </span>
												</td>
												<td>
                                                    @if (!$user->userToDetalis->last_seen == NULL)
                                                        {{$user->userToDetalis->last_seen}}
                                                    @else
                                                    {{'لم يتصل بعد'}}
                                                    @endif
												</td>
												<td>
                                                <form action="{{Route('DeleteUser')}}" method="post">
													@csrf
													<a href="#" class="btn ripple btn-sm btn-primary" data-target="#modaldemo{{$user->id}}" data-toggle="modal" href="">
                                                        <i class="fa-brands fa-searchengin"></i>
                                                    </a>

													<!-- Large Modal -->
													<div class="modal" id="modaldemo{{$user->id}}">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content modal-content-demo">
																<div class="modal-header">
																	<h6 class="modal-title">بيانات العضو</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
																</div>
																<div class="modal-body">
																	<h6>البيانات الاساسيه </h6>
																	<p class="h5 mt-1">كود المشرتك : {{$user->usercode}} </p>
																	<p class="h5 mt-1">الاسم : {{$user->name}} </p>
																	<p class="h5 mt-1">تاريخ الاشتراك : {{$user->startOfSubscription}} </p>
																	<p class="h5 mt-1">نهايه الاشتراك : {{$user->endOfSubscription}} </p>
																	<p class="h5 mt-1"> رقم الهاتف : {{$user->userToDetalis->phone}} </p>
																	<p class="h5 mt-1"> رقم الهويه : {{$user->userToDetalis->nationalId}} </p>
																</div>
																<div class="modal-footer">
																	{{-- <button class="btn ripple btn-danger btn-block " type="button">تم</button> --}}
																	<button class="btn ripple btn-danger btn-block" data-dismiss="modal" type="button">تم</button>
																</div>
															</div>
														</div>
													</div>
													<!--End Large Modal -->

													<a href="{{url('admin/editUser/'.$user->id)}}" class="btn btn-sm btn-info">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>

													<a class="btn btn-sm btn-danger modal-effect" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo9">
														<input type="hidden" name="userId"  value="{{$user->id}}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>



												<!-- delete  Modal effects-->
												<div class="modal" id="modaldemo9">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">هل انت متاكد من عمليه الحذف</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<h6>سيتم حذف المستخدم وكل بيامانته</h6>
																<p class="text-center"><i class="fa-solid fa-triangle-exclamation tx-50 mb-2 text-warning fa-xl"></i></p>
																<input type="hidden"   name="userid" value="{{$user->id}}">
															</div>
															<div class="modal-footer">
																<button class="btn ripple btn-danger" type="submit">تاكيد</button>
																<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
															</div>
														</div>
													</div>
												</div>
												<!-- End Modal effects-->

										</form>

												</td>
											</tr>
                                            @endforeach

                                        </tbody>
									</table>
								</div>
								{{-- <ul class="pagination mt-4 mb-0 float-left">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul> --}}
								{{$AllUser->links()}}

							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Sweet-alert js  -->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
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


