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
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه منتج جديد</span>
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
					<div class="col-lg-12 col-md-12 ">
						<div class="card ">
						<form id="product_data" enctype="multipart/form-data" >
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
							<div class="card-body  ">
									<div class="text-success smoth mt-3 =" id="Success" ></div>
								</div>
									<div class="main-content-label m-3 mg-b-5">
										<h4>اضافه منتج</h4>

									<p class="mt-3 mg-b-20">قم بملئ كل البيانات </p>

									<div id="wizard3" class="loader">

										<h3>المعلمومات الاساسيه</h3>
										<section>
											<div class="control-group form-group">
												<label class="form-label m-3">اسم المنتج</label>
												<input type="text" name="name" class="form-control" id="name" placeholder="قم بكتابه اسم للمنتج بشكل واضح">
												<small id="name_error" class="mt-2 text-danger"></small>
											</div>
											
											<div class="form-group control-group form-group">
												<label class="form-label">القسم</label>
												<select class="form-control" name="categoryId" id="exampleFormControlSelect1">
													<option selected>اختار</option>
													@foreach ($category as $data)
														<option value="{{$data->id}}">{{$data->name}}</option>
													@endforeach
												</select>
											</div>
												<small id="category_error" class="mt-2 text-danger"></small>

											<div class="control-group form-group mb-0">
												<label class="form-label">وصف المنتج</label>
												<input type="text" name="productDescription" class="form-control " placeholder="مثال : قميص من طيراز ABC">
												<small id="productDescription_error" class="mt-2 text-danger"></small>

											</div>
											<div class="control-group form-group mb-0">
												<label class="form-label m-2">تفاصيل المنتج</label>
												<textarea name="productDetalis"  class="form-control " placeholder="قميص لأرض الملعب يتخلص من العرق، مصنوع من مواد مُعاد تدويرها."></textarea>
												<small id="productDetalis_error" class="mt-2 text-danger"></small>

										</section>
										<h3 id="price_and_des">السعر والخصومات</h3>
										<section>
											<div class="table-responsive mg-t-20">
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td>السعر الاساسي</td>
															<td class="text-right">
																<h4>
																	<input name="price" class="input-none-outline price" onkeyup="result()" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;"  id="price" placeholder="مثال : 99 ₪" >
																</h4>
																<small id="price_error" class="mt-2 text-danger"></small>
															</td>
														</tr>
														<tr>
															<td>
																<span>نسبه الخصم</span>
															</td>
															<td>
																<h4><b>%</b>
																	<input class="input-none-outline price" name="discount" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" type="number" onkeyup="result()" id="discount" maxlength="2" max="100" placeholder="مثال : 20 %" >

																</h4>
																<small id="discount_error" class="mt-2 text-danger"></small>
															</td>
														</tr>
														<tr>
															<td><span>الاجمالي</span></td>
															<td>
																<h2 class="price text-right mb-0">₪<b id="price"><input class="input-none-outline" type="number"
																	id="ThePriceAfterDiscount" maxlength="4" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;"  onkeydown="return false;" name="ThePriceAfterDiscount" ></b>
																</h2>
															<small id="ThePriceAfterDiscount_error" class="mt-2 text-danger"></small>

															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</section>
										<h3>صور المنتج</h3>
										<section>
											<div class="row ">
												<div class="col-md-4">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload3" name="mainImage" accept=".png, .jpg, .jpeg" />
															<label for="imageUpload3"></label>
														</div>
														<div class="avatar-preview">
															<div id="imagePreview3" style="background-image: url({{asset('assets/img/imageUploader.svg')}});">
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload2" name="img2" accept=".png, .jpg, .jpeg" />
															<label for="imageUpload2"></label>
														</div>
														<div class="avatar-preview">
															<div id="imagePreview2" style="background-image: url({{asset('assets/img/imageUploader.svg')}});">
																
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload3" name="image_3" accept=".png, .jpg, .jpeg" />
															<label for="imageUpload3"></label>
														</div>
														<div class="avatar-preview">
															<div id="imagePreview3" style="background-image: url({{asset('assets/img/imageUploader.svg')}});">
																
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>

								</div>
							</form>
						</div>
					</div>



					<script>

					   </script>


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

<script src="{{asset('assets/plugins/imageUploader/imageUploader.js')}}"></script>
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>



<script>


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


		$("#finish").click(function(e){
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

                },complete: function(){
					$('.loader_cu').css('display','none')
					$('.loading').css('display','none')

				},error: function(reject){

						
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").text(val[0]);
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

