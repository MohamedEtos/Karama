@extends('merchant.layout.merchant_master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header  rounded justify-content-between mb-2 mt-2">
					<div class="my-auto  ">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text">تعديل المنتجات</h4><span class=" mt-1 tx-13 mr-2 mb-0">/ المنتج رقم {{$product->id}}</span>
						</div>
					</div>


					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5 h4">
									تعدي المنتج
								</div>
								{{-- <p class="mg-b-20">المنتج رقم </p> --}}
								<form action="{{url('merchant/update_product/'.Crypt::encrypt($product->id))}}" class="needs-validation	" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row row-sm mt-2">
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">اسم المنتج: </label>
												<input class="form-control" name="name" placeholder="لا يمكنك ترك الاسم فارغ" required="" value="{{$product->name}}" type="text">
											</div>
										</div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">فئه المنتج</label>
                                            <select  class="form-control" name="subCat" id="exampleFormControlSelect1">
                                              @foreach ($subCatarr as $data)
                                                @if ($data->id == $product->subCatMerchant->id)
                                                    <option selected value="{{$data->id}}">{{$data->name}}</option>
                                                @else
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endif
                                              @endforeach
                                          </select>
                                          <div class="valid-feedback">
                                              احسنت !
                                          </div>
                                          <div class="invalid-feedback" id="categoryId_error">

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
												<input name="price" class="form-control"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
												minlength="1" maxlength="5" max="9999"  type="number" value="{{$product->price}}"   id="price" placeholder="مثال : 99 ₪"  required>
												<div class="valid-feedback">
													ممتاز !
												</div>
												<div class="invalid-feedback" id="price_error">
													يجب الا يقل سعر المنتج عن عن 1 ولا يزيد عن 5 ارقام
												</div>
											</div>
										</div>

										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label">الخصم %: </label>
												<input class="form-control" name="discount" minlength="1"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
												type="number" max="100"   id="discount" maxlength="2" max="100" value="{{$product->discount}}" placeholder="مثال : 20 %" required >
											  <div class="valid-feedback">
												ممتاز !
											</div>
											<div class="invalid-feedback" id="discount_error">
												حدد نسبه خصم بين 1% % الي 100 %
											</div>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group mg-b-0">
												<label class="form-label"> بعد الخصم ₪: </label>
												<input name="ThePriceAfterDiscount" class="form-control" minlength="1"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
												 step="any" min="1" maxlength="5" max="9999"  onkeydown="return false;"  type="number" value="{{$product->ThePriceAfterDiscount}}"   id="ThePriceAfterDiscount" placeholder="مثال : 99 ₪"  >
												<div class="valid-feedback">
													ممتاز !
												</div>
												<div class="invalid-feedback" id="ThePriceAfterDiscount_error">
												</div>
											</div>
										</div>
									</div>
									<!-- row -->
									<div class="row mt-4">

										<div class="col-md-6 col-xl-4 col-sm-12 col-xs-12">
											<div class="mx-auto  avatar-upload">
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
										<div class="col-md-6 col-xl-4 col-sm-12 col-xs-12">
											<div class=" mx-auto avatar-upload">
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
										<div class="col-md-6 col-xl-4 col-sm-12 col-xs-12">
											<div class=" mx-auto avatar-upload">
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

									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif

									@if(Session::has('success'))
									<input id="nofic" type="hidden" value="{{Session::get('success')}}">
									<script>
										window.onload = function not7() {
										notif({
											msg: $('#nofic').val(),
											type: "success"
										});
									}
									</script>
									@endif

								</form>
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
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>

<script>
// calculate discount

function calculateDiscount() {
  var price = parseFloat(document.getElementById('price').value);
  var discount = parseFloat(document.getElementById('discount').value);

  // Calculate discounted price
  var ThePriceAfterDiscount = price - (price * (discount / 100));

  // Display the discounted price
  document.getElementById('ThePriceAfterDiscount').value =  ThePriceAfterDiscount.toFixed(2);
}

// Add event listeners to input fields to trigger calculation
document.getElementById('price').addEventListener('input', calculateDiscount);
document.getElementById('discount').addEventListener('input', calculateDiscount);

// Initially calculate discount
calculateDiscount();


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


