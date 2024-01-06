@extends('admin.layout.admin_master')
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
							<h4 class="content-title mb-0 my-auto">المتاجر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه متجرر جديد</span>
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
								<form id="newStore" action="{{Route('createStore')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate >
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

									<div class="col-md-4 mt-4">
									  <label for="validationCustom01" class="form-label">اسم المتجر</label>
									  <input type="text" minlength="3" name="name" maxlength="15" class="form-control" placeholder="قم بكتابه اسم المتجر بشكل واضح" id="validationCustom01" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>

									  @error('name')
									  <div class="text-danger">
										  {{$message}}
									  </div>
									 @enderror
									 @foreach ($errors->all() as $error)
    {{ $error }}<br/>
@endforeach	
									  <div class="invalid-feedback" id="name_error">
										يجب الا يقل اسم المتجرر عن 3 احرف
									</div>
									</div>
									
									<div class="col-md-4 mt-4 ">
										<label for="userCode" class="form-label">كود المشترك</label>
										<input name="userCode" class="form-control randCode"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										minlength="8" maxlength="8" max="9999" onkeydown="result()" type="number"   id="userCode" placeholder=" كود المشترك "  >
										<div class="errspan">
											<i class="fa-solid fa-wand-sparkles text-info "></i>
										</div>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="userCode_error">
											اكتب رقم هاتف صالح
										</div>
									  </div>

									<div class="col-md-4 mt-4">
										<label for="validationCustom01" class="form-label">كلمه المرور</label>
										<input type="text" minlength="8" name="password" maxlength="32" class="form-control randpass" placeholder="اكتب كلمه مرور" id="validationCustom01" required>
										<div class="errspanpass">
											<i class="fa-solid fa-wand-sparkles text-info "></i>
										</div>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="password_error">
											يجب الا تقل كلمه المرور عن 8 احرف او ارقام
									  	</div>
									</div>



									<div class="col-md-4 mt-4">
										<label for="validationCustom01" class="form-label">ايميل</label>
										<input type="email" minlength="3" name="email" maxlength="20" class="form-control" placeholder="karam@karam.com" id="validationCustom01" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="email_error">
											قم بكتابه ايميل صالح	
									  	</div>
									</div>

									<div class="col-md-4 mt-4">
										<label for="validationCustom02" class="form-label">قسم المتجر</label>
										<select class="form-control" name="categoryId" id="exampleFormControlSelect1">
												@foreach ($category as $categoryes)
													<option value="{{$categoryes->id}}">{{$categoryes->name}}</option>
												@endforeach
										</select>
										<div class="valid-feedback">
											احسنت !
										</div>
										<div class="invalid-feedback" id="categoryId_error">
											قم باختيار قسم للمتجر
										</div>
									</div>



									<div class="col-md-4 mt-4 ">
										<label for="validationCustom01" class="form-label">تخصص المتجر</label>
										<input type="text" minlength="10" name="storeDescription" maxlength="100" class="form-control"  placeholder="ملابس اطفالي" id="validationCustom01" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="storeDescription_error">
										</div>
									  </div>
									  <div class="col-md-4 mt-4 ">
										<label for="phone" class="form-label">هاتف المتجر (اخياري)</label>
										<input name="phone" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										minlength="1" maxlength="10" max="9999" onkeydown="result()" type="number"   id="phone" placeholder=" هاتف المتجر"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="phone_error">
											اكتب رقم هاتف صالح
										</div>
									  </div>
									  <div class="col-md-4 mt-4 ">
										<label for="whatsapp" class="form-label">واتس اب  (اخياري)</label>
										<input name="whatsapp" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										minlength="1" maxlength="10" max="9999" onkeydown="result()" type="number"   id="whatsapp" placeholder=" هاتف المتجر"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="whatsapp_error">
											اكتب رقم هاتف صالح
										</div>
									  </div>


									  <div class="col-md-4 mt-4 ">
										<label for="facebook" class="form-label">فيس بوك (اخياري)</label>
										<input name="facebook" class="form-control"
										
										   type="text"   id="facebook" placeholder="https/facebook.com "  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="facebook_error">
											ضع لينك صفحه الفيس بوك
										</div>
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="website" class="form-label"> الموقع الالكتروني (اخياري)</label>
										<input name="website" class="form-control"
										
										 type="text"   id="website" placeholder="https//www.Karama-SC.com"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="website_error">
											ضع لينك المتجر
										</div>
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="maps" class="form-label"> موقعك علي الخريطه (اخياري)</label>
										<input name="maps" class="form-control"
										
										 type="text"   id="maps" placeholder="https://www.google.com/maps/@30.0308657,31.1111907,14z?entry=ttu"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="maps_error">
											ضع لينك المتجر
										</div>
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="location" class="form-label">  العنوان (اخياري)</label>
										<input name="location" class="form-control"
										
										 type="text"   id="location" placeholder="العنوان"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="location_error">
											ضع لينك صفحه الفيس بوك
										</div>
									  </div>
									  <div class="col-12 mt-4 ">
										<label for="bio" class="form-label">  نبذه عن المتجر (اخياري)</label>
										<textarea name="bio" class="form-control"
										 type="text"   id="bio" placeholder="نبذة عن المتجر"  ></textarea>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="bio_error">
										</div>
									  </div>


									
									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger" id="finish" type="submit">اضافه المتجر</button>
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
						// $('.invalid-feedback').css('display','none');
						// $('input').removeClass('invalid');
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

<script>
	// live validation js inputs
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('keydown', function (event) {
        if (!form.checkValidity()) {
        //   event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
	



})()

</script>


<script>
(function () {
	$('.errspan').click(function(){
		$('.randCode').val(Math.floor((Math.random() * 100000000) + 3))	
	})
	$('.errspanpass').click(function(){
		$('.randpass').val(Math.floor((Math.random() * 100000000) + 3))	
	})
})()
</script>

@endsection

