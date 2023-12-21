@extends('merchant.layout.merchant_master')
@section('css')
<!---Internal Fileupload css-->
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header alert alert-light rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه منتج جديد</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">

					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<form id="product_data" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate >
									@csrf
									<div class="loader_cu">
										<div class="loading">
											<div class="loading-bar"></div>
											<div class="loading-bar"></div>
											<div class="loading-bar"></div>
											<div class="loading-bar"></div>
											<div class="loading-bar"></div>
										</div>
									</div>
									<div class="col-md-6">
									  <label for="validationCustom01" class="form-label">اسم المنتج</label>
									  <input type="text" minlength="3" name="name" maxlength="15" class="form-control" placeholder="قم بكتابه اسم للمنتج بشكل واضح" id="validationCustom01" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
									  <div class="invalid-feedback" id="name_error">
										يجب الا يقل اسم المنتج عن 3 احرف
								  	</div>
									</div>
									<div class="col-md-6">
									  <label for="validationCustom02" class="form-label">القسم</label>
									  <select class="form-control" name="categoryId" id="exampleFormControlSelect1">
										{{-- <option disabled selected>اختار</option> --}}
										@foreach ($category as $data)
											<option value="{{$data->id}}">{{$data->name}}</option>
										@endforeach
									</select>
									<div class="valid-feedback">
										احسنت !
									</div>
									<div class="invalid-feedback" id="categoryId_error">

								  	</div>

									</div>


									<div class="col-md-4 mt-4">
										<label for="validationCustom01" class="form-label">وصف المنتج</label>
										<input type="text" minlength="10" name="productDescription" maxlength="100" class="form-control"  placeholder="مثال : قميص من طيراز ABC" id="validationCustom01" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="productDescription_error">
											يجب الا يقل وصف المنتج عن 10 احرف ولا يزيد عن 100 حرف
										</div>
									  </div>
									<div class="col-md-8 mt-4">
									  <label for="validationCustom03" class="form-label">تفاصيل المنتج</label>
									  <textarea type="text" minlength="30" name="productDetalis" maxlength="300" class="form-control" id="validationCustom03" placeholder="قميص لأرض الملعب يتخلص من العرق، مصنوع من مواد مُعاد تدويرها." required></textarea>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
									  <div class="invalid-feedback" id="productDetalis_error">
										يجب الا يقل تفاصيل المنتج عن 30 احرف ولا يزيد عن 300 حرف
									</div>
									</div>
									<div class="col-md-4 mt-4">
										<label for="price" class="form-label">السعر الاساسي</label>
										<input name="price" class="form-control" minlength="1" maxlength="5" max="9999" onkeyup="result()" type="number"   id="price" placeholder="مثال : 99 ₪"  required>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="price_error">
											يجب الا يقل سعر المنتج عن عن 1 ولا يزيد عن 5 ارقام
										</div>
									  </div>
									<div class="col-md-4 mt-4">
									  <label for="discount" class="form-label">الخصم %</label>
									  <input class="form-control" name="discount" minlength="1"   type="number" max="100" onkeyup="result()"  id="discount" maxlength="2" max="100" placeholder="مثال : 20 %" required >
									  <div class="valid-feedback">
										ممتاز !
									</div>
									<div class="invalid-feedback" id="discount_error">
										حدد نسبه خصم بين 1% % الي 100 %
									</div>
									</div>
									<div class="col-md-4 mt-4">
										<label for="ThePriceAfterDiscount" class="form-label">الاجمالي</label>
										<input name="ThePriceAfterDiscount" class="form-control" minlength="1" step="any" min="1" maxlength="5" max="9999"  onkeydown="return false;" onkeyup="result()" type="number"   id="ThePriceAfterDiscount" placeholder="مثال : 99 ₪"  required>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="ThePriceAfterDiscount_error">
										</div>
									</div>
									<div class="col-sm-12 col-md-4 mt-4">
										<input type="file" name="mainImage"  class="dropify" data-height="200" />
									</div>
									<small id="mainImage_error" class="mt-2 text-danger"></small>

									<div class="col-sm-12 col-md-4 mt-4">
										<input type="file" name="img2" class="dropify" data-height="200" />
									</div>
									<small id="img2_error" class="mt-2 text-danger"></small>

									<div class="col-sm-12 col-md-4 mt-4">
										<input type="file" name='img3' required class="dropify" data-height="200" />
									</div>
									<small id="img3_error" class="mt-2 text-danger"></small>

									
									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger" id="finish" type="submit">اضافه المنتج</button>
									</div>
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


<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->

<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

{{-- <script src="{{asset('assets/plugins/imageUploader/imageUploader.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script> --}}

<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

<script>

// calculate discount 
function result (){
	var price =     document.getElementById("price").value;
	var discount = document.getElementById("discount").value;
	var ThePriceAfterDiscount = document.getElementById("ThePriceAfterDiscount");

	match =  price -(discount*price/100)  ;
	ThePriceAfterDiscount.value = match.toFixed(2);
};




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





// $('#getDataBtn').click(function() {

// 					   $.ajax({
// 						   type: "GET",
// 						   url: "https://forbes400.herokuapp.com/api/forbes400?limit=400",
// 						   dataType: 'json',
// 						   beforeSend: function() {
// 							   $('#loader').removeClass('hidden')
// 						   },
// 						   success: function(data){
// 							   console.log(data);
// 							   let richList = "<ol>";
// 							   for (let i = 0; i < data.length; i++) {
// 								 console.log(data[i].uri);
// 								 richList += "<li>"+data[i].uri+"</li>";
// 							   }
// 							 richList += "</ol>"
// 							 $('#richList').html(richList);
// 						   },
// 						 complete: function(){
// 							   $('#loader').addClass('hidden')
// 						   },
// 					   });

// 					   });

</script>

<script>

	$(function() {
		$("a").prop( "disabled", true );	

		$('#product_data').on('submit', function(e) {
		//remove all old errors

            e.preventDefault();
            let formData = new FormData($('#product_data')[0]);

            // $("#name").text('');
            $.ajax({

				beforeSend: function() {
					$('.loading').css('display','flex')
					$('.loader_cu').css('display','flex')
					$('small').html('');

				},
                type: "post",
                url: "{{route('store_product')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    // $("#Success").html(data.MSG).slideDown("fast").delay(5000).slideUp("fast");
					// window.location.replace('/merchant/new-product');
					$('form').append('<input id="nofic" type="hidden" value="">');
					$('#nofic').val(data.MSG);	
					function not7() {
							notif({
								msg: $('#nofic').val(),
								type: "success"
							});
						};
						not7();
						// setTimeout("location.href = '/merchant/new-product';", 4000)
						// $('#product_data').trigger('reset');
						$("#product_data")[0].reset();
                },complete: function(){
					$('.loader_cu').css('display','none')
					$('.loading').css('display','none')
					$('#product_data').reset();

				},error: function(reject){

						
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").html(val[0]);
					});
					
					$('form').append('<input id="errors" type="hidden" value="يوجد بعض المشكلا برجاء مرجعه الحقول ">');
					$('#errors').val();	
					function not7() {
							notif({
								msg: $('#errors').val(),
								type: "error"
							});
					};
					not7();

                   


                }
            });

        });



	});



</script>


@endsection

