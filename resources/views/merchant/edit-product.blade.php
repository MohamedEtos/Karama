@extends('merchant.layout.merchant_master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto ">تعديل المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتج رقم {{$product->id}}</span>
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
													<input type='file' id="imageUpload1" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload1"></label>
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
													<input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload2"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview2" style="background-image: url(http://i.pravatar.cc/500?img=7);">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload3" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload3"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview3" style="background-image: url(http://i.pravatar.cc/500?img=7);">
													</div>
												</div>
											</div>
										</div>


									</div>
									<div class="row mt-5">
										<div class="col-12">
													<button class="btn btn-danger btn-block ">حفظ التعديلات</button>
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


