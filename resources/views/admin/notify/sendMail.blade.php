@extends('admin.layout.admin_master')
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header    rounded opacity-50 justify-content-between ">
					<div class="left-content">
						<div class="">
						  <h2 class=" text-light main-content-title  tx-24 mg-b-1 mg-b-lg-1"> البريد</h2>
						</div>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">ارسال بريد </h3>
							</div>
							<div class="card-body">
								<form >
									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">الي</label>
											<div class="col-sm-10">
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">الموضوع</label>
											<div class="col-sm-10">
												<input type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row ">
											<label class="col-sm-2">الرساله</label>
											<div class="col-sm-10">
												<textarea rows="10" class="form-control"></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="card-footer d-sm-flex">
								<div class="mt-2 mb-2">
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Attach"><i class="bx bx-paperclip text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Link"><i class="bx bx-link text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Photos"><i class="bx bx-image text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="bx bx-trash text-muted tx-22"></i></a>
								</div>
								<div class="btn-list mr-auto">
									{{-- <button type="button" class="btn btn-success btn-space">Discard</button> --}}
									<button type="button" class="btn btn-danger btn-space">ارسال</button>
								</div>
							</div>
						</div>
					</div>


                    @include('admin.notify.list');


				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')




@endsection
