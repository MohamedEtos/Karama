@extends('merchant.layout.merchant_master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
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
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5 h4">
									تعدي المنتج
								</div>
								{{-- <p class="mg-b-20">المنتج رقم </p> --}}
								<form action="">

									<div class="row row-sm mt-2">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم المنتج: </label>
												<input class="form-control" name="name" placeholder="لا يمكنك ترك الاسم فارغ" required="" value="{{$product->name}}" type="text">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">القسم: </label>
												<input class="form-control" name="category" placeholder="لا يمكنك ترك القسم فارغ" required="" value="{{$product->category}}" type="text">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">وصف المنتج: </label>
												<input class="form-control" name="productDescription" placeholder="لا يمكنك ترك الوصف فارغ" required="" value="{{$product->productDescription}}" type="text">
											</div>
										</div>
									</div>


									<div class="row row-sm mt-2">
										<div class="col-12">
											<div class="form-group mg-b-0">
												<label class="form-label">تفاصيل المنتج: </label>
												<textarea class="form-control" name="name" placeholder="لا يمكنك ترك التفاصيل فارغه" required="" type="text">{{$product->productDetalis}}</textarea>
											</div>
										</div>
									</div>

									<div class="row row-sm mt-2">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">السعر ₪:  </label>
												<input class="form-control" name="name" placeholder="لا يمكنك ترك السعر فارغ" required="" value="{{$product->price}}" type="text">
											</div>
										</div>
									
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">الخصم %: </label>
												<input class="form-control" name="name" placeholder="لا يمكنك ترك السعر فارغ" required="" value="{{$product->discount}}" type="text">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">السعر بعد الخصم ₪: </label>
												<input class="form-control" name="name" placeholder="لا يمكنك ترك السعر فارغ" required="" value="{{$product->ThePriceAfterDiscount}}" type="text">
											</div>
										</div>
									</div>
									<!-- row -->
									<div class="row mt-4">

										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- row closed -->


								</form>
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

<script src="{{asset('assets/plugins/imageUploader/imageUploader.js')}}"></script>

@endsection


