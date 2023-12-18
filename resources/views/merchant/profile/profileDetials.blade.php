@extends('merchant.layout.merchant_master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
{{-- imageuploader --}}
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploaderProfile/imageUploader.css')}}">

<style>



</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between m-2">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-danger">الملف الشخصي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>


				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">

										<div class="col-12 text-center d-flex p-2">
											
											<div class="avatar-upload ">
												<form id="imageUploadform" enctype="multipart/form-data">
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

												<div class="avatar-edit">
													<input type='file' id="imageUpload1" name="ProfileImage" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload1"></label>
												</div>
												<div class="avatar-preview avatar-preview-animate">
													<div id="imagePreview" style="background-image: url('{{asset($userDetalis->ProfileImage)}}');">
													</div>
												</div>
											</form>	
											</div>	

										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{Auth::user()->name}}</h5>
												<p class="main-profile-name-text">
													@if ($MainUserTable->subtype == 'admin')
														مدير 
													@elseif($MainUserTable->subtype == 'merchant')
														تاجر
													@elseif($MainUserTable->subtype == 'user')
														مستخدم
													@endif
												</p>
											</div>
										</div>
										<h6>نبذه تعريفيه</h6>
										<div class="main-profile-bio">
											متجر ايداس متخصص في الملابس الرياضيه وكل ما هو جديد في عالم الملابس والاحذية
										</div><!-- main-profile-bio -->
										<div class="row">
											<div class="col-md-4 col text-center mb20">
												<h5>947</h5>
												<h6 class="text-small text-muted mb-0"> زوار المتجر</h6>
											</div>
											<div class="col-md-4 col text-center mb20">
												<h5>583</h5>
												<h6 class="text-small text-muted mb-0">نقاط العملاء</h6>
											</div>
											<div class="col-md-4 col text-center mb20">
												<h5>48</h5>
												<h6 class="text-small text-muted mb-0">المنتجات</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">التواصل</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fa-solid fa-phone"></i>									</div>
												<div class="media-body">
													<span>رقم الهاتف</span> <a href="">twitter.com/spruko.me</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													
													<i class="fa-brands fa-whatsapp "></i>
												</div>
												<div class="media-body">
													<span>واتس اب</span> <a href="">github.com/spruko</a>
												</div>
											</div>

											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="fa-brands fa-facebook"></i>
												</div>
												<div class="media-body">
													<span>فيس بوك</span> <a href="">linkedin.com/in/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>موقع الويب</span> <a href="">spruko.com/</a>
												</div>
											</div>
										</div>
										{{-- <hr class="mg-y-30"> --}}
										{{-- <h6>Skills</h6>
										<div class="skill-bar mb-4 clearfix mt-3">
											<span>HTML5 / CSS3</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
											</div>
										</div>
										<!--skill bar-->
										<div class="skill-bar mb-4 clearfix">
											<span>Javascript</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 89%"></div>
											</div>
										</div>
										<!--skill bar-->
										<div class="skill-bar mb-4 clearfix">
											<span>Bootstrap</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
											</div>
										</div>
										<!--skill bar-->
										<div class="skill-bar clearfix">
											<span>Coffee</span>
											<div class="progress mt-2">
												<div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
											</div>
										</div>
										<!--skill bar--> --}}
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto text-center">
												<h5 class="tx-13">كل المنتجات</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">{{$countProuduct}}</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent text-center">
												<i class="icon-user"></i>
											</div>
											<div class="mr-auto text-center">
												<h5 class="tx-13">زوار المتجر</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">{{$storeViews}}</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto text-center">
												<h5 class="tx-13">حاله الحساب</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">100 %</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">من نحن	 </span> </a>
										</li>
										<li class="">
											<a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">المنتجات</span> </a>
										</li>
										<li class="">
											<a href="#social" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa-solid fa-hashtag"></i></span> <span class="hidden-xs">التواصل الاجتماعي</span> </a>
										</li>	
										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">البيانات الاساسيه</span> </a>
										</li>	
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase text-primary mb-3">نبذه تعريفيه</h4>
										<p class="m-b-5">
										{{$userDetalis->bio}}
										</p>
										<hr>
										<div class="m-t-30">
											<h4 class="tx-15 text-uppercase text-primary mt-3">العنوان</h4>
											<div class=" p-t-10">
												<h5 class=" m-b-5 tx-14"></h5>
												{{-- <p><b>2010-2015</b></p> --}}
												<p class="text-muted tx-13 m-b-0">
													{{$userDetalis->location}}
												</p>
											</div>
											<hr>
											<div class="">
												<h5 class="text-primary m-b-5 tx-14">نوع الاشتراك</h5>
												<p><b>
													@if (Auth::user()->subtype == 'admin')
													مشرف
													@elseif (Auth::user()->subtype == 'merchant')
													تاجر
													@elseif (Auth::user()->subtype == 'user')
													مستخدم
													@endif	
												
												</b></p>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="profile">
										<div class="row">
											@foreach ($productData as $productDataa )
												<div class="col-sm-4">
													<div class=" border p-1 card thumb  mb-xl-0">
														<a href="#" class="image-popup" title="Screenshot-2"> <img src="{{asset($productDataa->productionToImgRealtions->mainImage)}}" class="thumb-img" alt="work-thumbnail"> </a>
														<h4 class="text-center tx-14 mt-3 mb-0">{{$productDataa->name}}</h4>
														<div class="ga-border"></div>
														<p class="text-muted text-center"><small>{{$productDataa->productionToCategoryRealtions->name}}</small></p>
													</div>
												</div>
											@endforeach

										</div>
									</div>
									<div class="tab-pane" id="social">
										<form role="form" class="needs-validation">
											<div class="form-group">
												<label for="FullName">رقم الهاتف</label>
												<i class="fa-solid fa-phone text-primary"></i>								

												<input name="phone" value="{{$userDetalis->phone}}" class="form-control" min="9" minlength="9" maxlength="9" max="999999999"  type="text"   id="phone" placeholder="0927X XXXX"  required>
											</div>
											<div class="form-group">
												<label for="whatsapp">واتس اب</label>
												<i class="fa-brands fa-whatsapp text-success "></i>
												<input name="whatsapp" class="form-control" value="{{$userDetalis->whatsapp}}" min="9" minlength="9" maxlength="9" max="999999999"  type="text"   id="whatsapp" placeholder="0927X XXXX"  required>
											</div>
											<div class="form-group">
												<label for="facebook">فيس بوك</label>
												<i class="fa-brands fa-facebook text-info"></i>
												<input name="facebook" class="form-control" min="9" value="{{$userDetalis->facebook}}"value="{{$userDetalis->phone}}" minlength="9" maxlength="60" max="60"  type="text"   id="facebook" placeholder="fb.com/mohamed.etos"  required>

											</div>
											<div class="form-group">
												<label for="website">الموقع الالكتروني</label>
												<i class="icon ion-md-link text-danger"></i>
												<input name="facebook" class="form-control" min="9" minlength="9" value="{{$userDetalis->website}}"maxlength="60" max="60"  type="text"   id="facebook" placeholder="fb.com/mohamed.etos"  required>

											</div>

											<button class="btn btn-danger btn-block waves-effect waves-light w-md" type="submit">حفظ</button>
										</form>
									</div>
									<div class="tab-pane" id="settings">
										<form role="form" class="needs-validation">
											<div class="form-group">
												<label for="name">الاسم</label>
												<input type="text" name="name" value="{{Auth::User()->name}}" minlength="3" maxlength="20" id="name" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="bio">نبذه عن المتجر</label>
												<textarea type="text"  placeholder="نبذه عن المتجر" id="bio" class="form-control" required>{{$userDetalis->bio}} </textarea>
											</div>
											<div class="form-group">
												<label for="location">العنوان</label>
												<textarea type="text" placeholder="العنوان"  id="location" class="form-control" required>{{$userDetalis->location}} </textarea>
											</div>

											<button class="btn btn-danger btn-block waves-effect waves-light w-md" type="submit">حفظ</button>
										</form>
									</div>
								</div>
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
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<script src="{{URL::asset('assets/plugins/imageUploaderProfile/imageUploader.js')}}"></script>


<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>



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

// image uploader 

$("#imageUpload1").change(function(e) {


	e.preventDefault();
	let formData = new FormData($('#imageUploadform')[0]);
	// $("#name").text('');
	$.ajax({

		beforeSend: function() {
			$('.loader_cu').css('display','flex');
			$('.avatar-preview').css('border-color','red').delay(500);

		},
		type: "post",
		url: "{{route('ProfileImage')}}",
		data : formData,
		processData:false,
		contentType:false,
		cache:false,
		success: function (data) {
			$('form').append('<input id="nofic" type="hidden" value="">');
			$('#nofic').val(data.MSG);	
			function not7() {
					notif({
						msg: $('#nofic').val(),
						type: "success"
					});
				};
				not7();
			$('.loader_cu').css('display','none');
			$('.avatar-preview').css('border-color','green').delay(500);


		},complete: function(){
			$('.loader_cu').css('display','none')
		},error: function(reject){
			$('.avatar-preview').addClass('avatar-preview-animate-danger');
			$('form').append('<input id="errors" type="hidden" value="يوجد مشكله برجاء التواصل معي الاداره">');
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

</script>
@endsection