@extends('merchant.layout.merchant_master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header alert alert-light rounded justify-content-between mb-2 mt-2">
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
								<form action="{{url('merchant/update_product/'.$product->id)}}" class="needs-validation	" method="post" enctype="multipart/form-data">
									@csrf
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
												{{-- <input class="form-control" name="category" placeholder="لا يمكنك ترك القسم فارغ" required="" value="{{$product->category}}" type="text"> --}}
												<select class="form-control" name="categoryId" id="exampleFormControlSelect1">
													{{-- <option disabled selected>اختار</option> --}}
													<option selected value="{{$product->productionToCategoryRealtions->id}}">{{$product->productionToCategoryRealtions->name}}</option>
													@foreach ($category as $data)
														<option value="{{$data->id}}">{{$data->name}}</option>
													@endforeach
												</select>
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
												<textarea class="form-control" name="productDetalis" placeholder="لا يمكنك ترك التفاصيل فارغه" required="" type="text">{{$product->productDetalis}}</textarea>
											</div>
										</div>
									</div>

									<div class="row row-sm mt-2">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">السعر ₪:  </label>
												<input class="form-control" name="price" id="price" placeholder="لا يمكنك ترك السعر فارغ" required="" onkeyup="result()" value="{{$product->price}}" type="text">
											</div>
										</div>
									
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">الخصم %: </label>
												<input class="form-control" name="discount" id="discount" placeholder="لا يمكنك ترك السعر فارغ" required=""  onkeyup="result()"value="{{$product->discount}}" type="text">
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">السعر بعد الخصم ₪: </label>
												<input class="form-control" name="ThePriceAfterDiscount" id="ThePriceAfterDiscount" placeholder="لا يمكنك ترك السعر فارغ" required="" value="{{$product->ThePriceAfterDiscount}}" type="text">
											</div>
										</div>
									</div>
									<!-- row -->
									<div class="row mt-4">

										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload1" name="mainImage" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload1"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url({{asset($product->productionToImgRealtions->mainImage)}});">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' name="img2" id="imageUpload2" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload2"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview2" style="background-image: url({{asset($product->productionToImgRealtions->img2)}});">
														
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' name="img3" id="imageUpload3" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload3"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview3" style="background-image: url({{asset($product->productionToImgRealtions->img3)}});">
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

<script>
	// calculate discount 
function result (){
	var price =     document.getElementById("price").value;
	var discount = document.getElementById("discount").value;
	var ThePriceAfterDiscount = document.getElementById("ThePriceAfterDiscount");

	match =  price -(discount*price/100)  ;
	ThePriceAfterDiscount.value = match.toFixed(2);
};


</script>

<script>
	// live validation js inputs
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('keypress', function (event) {
        if (!form.checkValidity()) {
        //   event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
        //   event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })


})()
</script>
@endsection


