@extends('admin.layout.admin_master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">

<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/libs.bundle.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/theme.bundle.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploader/imageUploader.css')}}">


<style>
    .modal-lg{
        max-width: 75% !important
    }


</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between ">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto  ">الاعلانات</h4>
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
									اضافه اعلان
								</div>
								{{-- <p class="mg-b-20">الاعلان رقم </p> --}}
								<form action="{{Route('storeAds')}}" class="needs-validation" id="form" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row row-sm mt-2">
										<div class="col-md-4">
											<div class="form-group mg-b-0">
												<label class="form-label">رقم التاجر: </label>
												<input class="form-control" name="usercode" placeholder="لا يمكنك ترك الرقم فارغ" required="" value="" type="text">
                                                <div class="valid-feedback">
                                                    ممتاز !
                                                </div>
                                                <div class="invalid-feedback" id="startAds_error">
                                                    اختر تاريخ البدايه
                                                </div>
											</div>
										</div>

                                        <div class="col-md-4">
                                            <label for="startAds" class="form-label">تاريخ البدايه</label>
                                            <input name="startAds" class="form-control " id="startAds"
                                            onchange="setDate()"
                                            value=""
                                            min="10000000"
                                            minlength="8" maxlength="8"  type="datetime-local"   required >
                                            <div class="valid-feedback">
                                                ممتاز !
                                            </div>
                                            <div class="invalid-feedback" id="startAds_error">
                                                اختر تاريخ البدايه
                                            </div>
                                            @error('startAds')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                           @enderror
                                        </div>


                                        <div class="col-md-4 ">
                                            <label for="endAds" class="form-label">تاريخ الانتهاء</label>
                                            <input name="endAds" class="form-control " id="endAds"
                                            value=""

                                            min="10000000"
                                            minlength="8" maxlength="8"  type="datetime-local"   required >
                                            <div class="valid-feedback">
                                                ممتاز !
                                            </div>
                                            <div class="invalid-feedback" id="endAds_error">
                                                اختر تاريخ النهايه
                                            </div>
                                            @error('endAds')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                           @enderror
                                          </div>


									<div class="row row-sm mt-2">
										<div class="col-md-4">
											<div class="form-group mg-b-0">
												<label class="form-label">الجمله الاولي في الاعلان :  </label>
												<input name="text1" class="form-control"
												minlength="1" maxlength="30" max="9999"  type="text"   id="text1INP" placeholder="الحمله الاولي"  required>
												<div class="valid-feedback">
													ممتاز !
												</div>
												<div class="invalid-feedback" id="price_error">
													لايمكن ترك الجمله فارغه
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group mg-b-0">
												<label class="form-label">الجمله الثانيه: </label>
												<input class="form-control" name="text2" minlength="1"

												type="text" max="100"   id="text2INP" maxlength="20" max="100" value="" placeholder="الجمله الثانيه" required >
											  <div class="valid-feedback">
												ممتاز !
											</div>
											<div class="invalid-feedback" id="discount_error">
												حدد نسبه خصم بين 1% % الي 100 %
											</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group mg-b-0">
												<label class="form-label"> الجمله الثالثه: </label>
												<input name="text3" class="form-control" minlength="1"
												 step="any" min="1" maxlength="20" max="9999"   type="text" value=""   id="text3INP" placeholder="الجمله الثالثه في الاعلان"  >
												<div class="valid-feedback">
													ممتاز !
												</div>
												<div class="invalid-feedback" id="ThePriceAfterDiscount_error">
												</div>
											</div>
										</div>
									</div>
									<!-- row -->



									<div class="row row-sm mt-2">




										<div class="col-md-8">
											<div class="form-group mg-b-0">
												<label class="form-label">  لينك الاعلان: </label>
												<input name="adsLink" class="form-control" minlength="1"
                                                max="9999"
                                                type="text"
                                                value=""
                                                id="adsLinkINP"
                                                placeholder="رابط الاعلان"  >
												<div class="valid-feedback">
													ممتاز !
												</div>
												<div class="invalid-feedback" id="ThePriceAfterDiscount_error">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group mg-b-0">
												<label class="form-label">تكلفه اليوم: </label>
												<input name="adsLink" class="form-control" minlength="1"
												 step="any" min="1" maxlength="5" max="9999"   type="text" value=""   id="adsPrice" placeholder="اخياري"  >
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

										<div class="col-md-12 col-xl-12 col-sm-12 col-xs-12">
											<div class="mx-auto  avatar-upload" style="width:100%">
												<div class="avatar-edit">
													<input type='file' id="imageUpload1" name="mainImage" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload1"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url();">
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="row mt-5">
										<div class="col-12 mb-3">
										</div>
										<div class="col-12">
                                                <button type="submit"  class="btn btn-danger btn-block ">حفظ </button>
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


                {{-- row --}}

                                <!-- Large Modal -->
                                <div class="col-12">

                                    <div class="modal-header">
                                        <h6 class="modal-title">عرض الاعلان </h6>
                                    </div>
                                    <div class="modal-body">

                                    <!-- / Top banner -->
                                    <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
                                        <!-- Swiper Info -->
                                        <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
                                        "spaceBetween": 0,
                                        "slidesPerView": 1,
                                        "effect": "fade",
                                        "speed": 1000,
                                        "loop": true,
                                        "parallax": true,
                                        "observer": true,
                                        "observeParents": true,
                                        "lazy": {
                                            "loadPrevNext": true
                                            },
                                            "autoplay": {
                                            "delay": 5000,
                                            "disableOnInteraction": false
                                        },
                                        "pagination": {
                                            "el": ".swiper-pagination",
                                            "clickable": true
                                            }
                                        }'>
                                        <div class="swiper-wrapper">


                                                        <!--Slide-->
                                                        <div class="swiper-slide position-relative h-100 w-100">
                                                            <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                                                                <div id="adsImage" class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                                                style=" will-change: transform; ">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                                                                <p id="text1" class="title-small text-white opacity-75 mb-0" ></p>
                                                                <h2 id="text2" class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" > </h2>
                                                                <div data-swiper-parallax-y="-25">
                                                                <a id="adsLink" href="./category.html" class="btn  text-white" role="button"></a>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <!--/Slide-->

                                        </div>

                                        <div class="swiper-pagination swiper-pagination-bullet-light"></div>

                                        </div>
                                        <!-- / Swiper Info-->        </section>
                                    <!--/ Top Banner-->

                                    </div>

                                </div>

                        <!--End Large Modal -->

                {{-- end row --}}



			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
<script src="{{URL::asset('Front-Store/js/vendor.bundle.js')}}"></script>
<script src="{{URL::asset('Front-Store/js/theme.bundle.js')}}"></script>


 {{-- image uploader  --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#adsImage').css('background-image', 'url('+e.target.result +')');

                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload1").change(function() {

        readURL(this);


        });


        $('#text1INP').on('keyup', function() {
            var input1Value = $(this).val();
            $('#text1').html(input1Value);
        });

        $('#text2INP').on('keyup', function() {
                var input1Value = $(this).val();
                $('#text2').html(input1Value);
        });
        $('#text3INP').on('keyup', function() {
                var input1Value = $(this).val();
                $('#adsLink').html(input1Value);
        });



</script>


<script>
	// date auto set date
	// document.getElementById('startAds').valueAsDate = new Date();
	// document.getElementById('endAds').valueAsDate = new Date();

var now = new Date();
now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
document.getElementById('startAds').value = now.toISOString().slice(0,16);

</script>


@endsection
