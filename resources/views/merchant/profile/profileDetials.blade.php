@extends('merchant.layout.merchant_master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
{{-- imageuploader --}}
<link rel="stylesheet" href="{{asset('assets/plugins/imageUploaderProfile/imageUploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/css-rtl/profileDetials.css')}}">
<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css')}}">




<meta name="token" content="{{ csrf_token() }}">
@endsection
@section('page-header')
				<!-- breadcrumb -->

					<div class="breadcrumb-header  rounded  justify-content-between  ">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto ">الملف الشخصي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>

							</div>
						</div>

					</div>
					<!-- breadcrumb -->
@endsection
@section('content')



				<!-- row -->
				<div class="row row-sm ">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">

										<div class="col-12 ">

											<div class="row ">


												{{-- merchant cover  --}}

												<div class="avatar-upload  cover-upload  col-12 ">
													<form id="coverUploadform" class="text-center" enctype="multipart/form-data">
														@csrf


                                                        <div class="avatar-edit">
                                                            <input type='file' id="imagesCover" name="coverImage" accept=".png, .jpg, .jpeg" />
                                                            <label for="imagesCover" data-target="#modaldemo4" data-toggle="modal"></label>

                                                        </div>
                                                        <div class="avatar-preview cover-preview" id="imagePreview">
                                                            <div  data-placement="bottom" data-toggle="tooltip" title="يفضل ان تكون الصورره  1600*400 بكسل" class="coverPorfile" style="background-image: url('{{asset($userDetalis->coverImage)}}'); ">
                                                            </div>
                                                        </div>

                                                        <!--start Large Modal cover image -->
                                                        <div class="modal" id="modaldemo4">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content modal-content-demo">

                                                                    <div class="loader_cu">
                                                                        <div class="loading">
                                                                            <div class="loading-bar"></div>
                                                                            <div class="loading-bar"></div>
                                                                            <div class="loading-bar"></div>
                                                                            <div class="loading-bar"></div>
                                                                            <div class="loading-bar"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">تغير صوره الغلاف </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 text-center">
                                                                                <div id="upload-demoCover"></div>
                                                                            </div>
                                                                            <div class="col-md-12 pt-3" >
                                                                                <label for="imagesCover" class="btn btn-danger btn-block">اختر صوره</label>
                                                                                <input class="d-none" type="file" id="imagesCover" name="imagesCover">
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn ripple btn-danger image-uploadCover" type="button">حفظ الصوره</button>
                                                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--End Large Modal -->




												    </form>
												</div>


												{{-- /mechant image  --}}

												<form id="imageUploadform" class="merchant_image" enctype="multipart/form-data">
                                                    <div class="avatar-upload  col-12">
                                                            @csrf
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload2"   name="ProfileImage" accept=".png, .jpg, .jpeg" />
                                                            <label for="images" data-target="#modaldemo3" data-toggle="modal"></label>
                                                        </div>
                                                        <div class="avatar-preview rounded merchant-preview ">
                                                            <div id="imagePreview2" class="rounded" data-placement="bottom" data-toggle="tooltip" title="يفضل ان تكون صوره اقل من 1024 بكسل" style="background-image: url('{{asset($userDetalis->ProfileImage)}}');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                            <!--start Large Modal profile image -->
                                                            <div class="modal" id="modaldemo3">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content modal-content-demo">

                                                                        <div class="loader_cu">
                                                                            <div class="loading">
                                                                                <div class="loading-bar"></div>
                                                                                <div class="loading-bar"></div>
                                                                                <div class="loading-bar"></div>
                                                                                <div class="loading-bar"></div>
                                                                                <div class="loading-bar"></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">تغير صوره الملف الشخصي</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12 text-center">
                                                                                    <div id="upload-demo"></div>
                                                                                </div>
                                                                                <div class="col-md-12 pt-3" >
                                                                                    <label for="images" class="btn btn-danger btn-block">اختر صوره</label>
                                                                                    <input class="d-none" type="file" id="images" name="image">
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn ripple btn-danger image-upload" type="button">حفظ الصوره</button>
                                                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End Large Modal -->
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
												<h5>{{$storeViews}}</h5>
												<h6 class="text-small text-muted mb-0"> زوار المتجر</h6>
											</div>
											<div class="col-md-4 col text-center mb20">
												<h5>{{$points}}</h5>
												<h6 class="text-small text-muted mb-0">نقاط العملاء</h6>
											</div>
											<div class="col-md-4 col text-center mb20">
												<h5>{{$countProuduct}}</h5>
												<h6 class="text-small text-muted mb-0">المنتجات</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">التواصل</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="fa-solid fa-phone"></i>
												</div>
												<div class="media-body">
													<span>رقم الهاتف</span> <a href="tel:{{$userDetalis->phone}}">{{$userDetalis->phone}}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">

													<i class="fa-brands fa-whatsapp "></i>
												</div>
												<div class="media-body">
													<span>واتس اب</span> <a href="https://wa.me/{{$userDetalis->whatsapp}}">{{$userDetalis->whatsapp}}</a>
												</div>
											</div>

											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="fa-brands fa-facebook"></i>
												</div>
												<div class="media-body">
													<span>فيس بوك</span> <a href="{{$userDetalis->facebook}}">{{$userDetalis->facebook}}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>موقع الويب</span> <a href="{{$userDetalis->website}}">{{$userDetalis->website}}</a>
												</div>
											</div>
										</div>

									</div>
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
											<a href="#social" data-toggle="tab" class="" aria-expanded="false"> <span class="visible-xs"><i class="fa-solid fa-hashtag "></i></span> <span class="hidden-xs">التواصل الاجتماعي</span> </a>
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
														<a href="{{url('merchant/preview-product/'.$productDataa->id)}}" class="image-popup" title="Screenshot-2"> <img src="{{asset($productDataa->productionToImgRealtions->mainImage)}}" class="thumb-img" alt="work-thumbnail"> </a>
														<h4 class="text-center tx-14 mt-3 mb-0">{{$productDataa->name}}</h4>
														<div class="ga-border"></div>
														<p class="text-muted text-center"><small>{{$productDataa->productionToCategoryRealtions->name}}</small></p>
													</div>
												</div>
											@endforeach

										</div>
									</div>
									<div class="tab-pane" id="social">
										<form id="formSochial" method="POST" action="{{Route('updateSochial')}}" class="needs-validation">

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
												<input name="website" class="form-control" min="9" minlength="9" value="{{$userDetalis->website}}"maxlength="60" max="60"  type="text"   id="facebook" placeholder="fb.com/mohamed.etos"  required>

											</div>

											<!--  Modal effects-->
											<div class="modal" id="modaldemo8">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title">تحديث بينات</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">
															<h6>اجراء امني</h6>
															<p>قم بكتابه كلمه المرور لتاكيد الاجراء</p>
															<input type="password" class="form-control"  name="password" required>
														</div>
														<div class="modal-footer">
															<button class="btn ripple btn-danger" type="submit">تاكيد</button>
															<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
														</div>
													</div>
												</div>
											</div>
											<!-- End Modal effects-->

											{{-- <input id="submitBTN" data-target="#select2modal" data-effect="effect-rotate-left" data-toggle="modal" class="btn btn-danger btn-block waves-effect waves-light w-md" value="تحديث" type="button" type=""> --}}
										<a class="modal-effect btn btn-danger btn-block" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo8">تاكيد</a>


										</form>
									</div>
									<div class="tab-pane" id="settings">
										<form  method="POST" action="{{Route('updateBasicProfile')}}" class="needs-validation">
											@csrf
											<div class="form-group">
												<label for="name">الاسم</label>
												<input type="text" name="name" value="{{Auth::User()->name}}" minlength="3" maxlength="20" id="name" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="bio">نبذه عن المتجر</label>
												<textarea type="text" name="bio"  placeholder="نبذه عن المتجر" id="bio" class="form-control" required>{{$userDetalis->bio}} </textarea>
											</div>
											<div class="form-group">
												<label for="location">العنوان</label>
												<textarea type="text" name="location" placeholder="العنوان"  id="location" class="form-control" required>{{$userDetalis->location}} </textarea>
											</div>

												<!--  Modal effects-->
												<div class="modal" id="modaldemo9">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">تحديث بينات</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<h6>اجراء امني</h6>
																<p>قم بكتابه كلمه المرور لتاكيد الاجراء</p>
																<input type="password" class="form-control"  name="password" required>
															</div>
															<div class="modal-footer">
																<button class="btn ripple btn-danger" type="submit">تاكيد</button>
																<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
															</div>
														</div>
													</div>
												</div>
												<!-- End Modal effects-->

												{{-- <input id="submitBTN" data-target="#select2modal" data-effect="effect-rotate-left" data-toggle="modal" class="btn btn-danger btn-block waves-effect waves-light w-md" value="تحديث" type="button" type=""> --}}
											<a class="modal-effect btn btn-danger btn-block" data-effect="effect-rotate-left" data-toggle="modal" href="#modaldemo9">تاكيد</a>

										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>






        <!--start Large Modal profile image -->
        <div class="modal" id="modaldemo3">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">

                    <div class="loader_cu">
                        <div class="loading">
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                        </div>
                    </div>

					<div class="modal-header">
						<h6 class="modal-title">تغير صوره الملف الشخصي</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div id="upload-demo"></div>
                            </div>
                            <div class="col-md-12 pt-3" >
                                <label for="images" class="btn btn-danger btn-block">اختر صوره</label>
                                <input class="d-none" type="file" id="images" name="image">
                            </div>

                        </div>

					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-danger image-upload" type="button">حفظ الصوره</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
					</div>
				</div>
			</div>
		</div>
		<!--End Large Modal -->



				<!-- row closed -->




				{{-- nofications  --}}
					@if(Session::has('success'))
					<input id="success" type="hidden" value="{{Session::get('success')}}">
					<script>
						window.onload = function not7() {
							notif({
								msg: $('#success').val(),
								type: "success"
							});
						}
						</script>
					@endif
					@if(Session::has('faild'))
					<input id="faild" type="hidden" value="{{Session::get('faild')}}">
					<script>
						window.onload = function not7() {
							notif({
								msg: $('#faild').val(),
								type: "error"
							});
						}
						</script>
					@endif
				{{-- nofications  --}}




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

<script src="{{URL::asset('assets/js/modal.js')}}"></script>


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





</script>




<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js')}}"></script>




<script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });

    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'square'
        },

        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#images').on('change', function () {
      var reader = new FileReader();
        reader.onload = function (e) {
          resize.croppie('bind',{
            url: e.target.result
          }).then(function(){
            console.log('success bind image');
          });

        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.image-upload').on('click', function (ev) {
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'

      }).then(function (img) {
        $.ajax({
          url: '{{ route('ProfileImage') }}',
          type: "POST",
          data: {"image":img},
          success: function (data) {
            html = '<img src="' + img + '" />';
            $("#imagePreview2").html(html);

			// nofication
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

			// image uploader animated
				$('.merchant-preview').removeClass('avatar-preview-animate-danger');
				$('.merchant-preview').addClass('avatar-preview-animate');
                $('.modal-content-demo').addClass('avatar-preview-animate');
				setTimeout(function() {
					$('.merchant-preview').removeClass('avatar-preview-animate');
				}, 3000);

				setTimeout(function() {
					$('#modaldemo3').modal('hide');
				}, 500);
          },error: function(reject){
			$('.merchant-preview').addClass('avatar-preview-animate-danger');
			$('form').append('<input id="errors" type="hidden" value="يوجد مشكله برجاء التواصل معي الاداره">');
			$('#errors').val();
			function not7() {
					notif({
						msg: $('#errors').val(),
						type: "error"
					});
			};
			not7();

		},beforeSend: function() {
			$('.loader_cu').css('display','flex');
			$('.loading').css('display','flex');
			// $('.avatar-preview').css('border-color','red').delay(500);

		}
        });
      });
    });
 </script>




<script type="text/javascript">

// cover uploader

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });

    var resize2 = $('#upload-demoCover').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 700,
            height: 300,
            type: 'square'
        },

        boundary: {
            width: 700,
            height: 300,
        }
    });

    $('#imagesCover').on('change', function () {
      var reader2 = new FileReader();
        reader2.onload = function (e) {
          resize2.croppie('bind',{
            url: e.target.result
          }).then(function(){
            console.log('success bind image');
          });

        }
        reader2.readAsDataURL(this.files[0]);
    });

    $('.image-uploadCover').on('click', function (ev) {
      resize2.croppie('result', {
        type: 'canvas',
        size: 'viewport'

      }).then(function (img2) {
        $.ajax({
          url: '{{ route('CoverImage') }}',
          type: "POST",
          data: {"image2":img2},
          success: function (data) {
            html2 = '<img src="' + img2 + '" />';
            $("#imagePreview").html(html2);

			// nofication
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

			// image uploader animated
				$('.merchant-preview').removeClass('avatar-preview-animate-danger');
				$('.merchant-preview').addClass('avatar-preview-animate');
                $('.modal-content-demo').addClass('avatar-preview-animate');
				setTimeout(function() {
					$('.merchant-preview').removeClass('avatar-preview-animate');
				}, 3000);

				setTimeout(function() {
					$('#modaldemo4').modal('hide');
				}, 500);
          },error: function(reject){
			$('.merchant-preview').addClass('avatar-preview-animate-danger');
			$('form').append('<input id="errors" type="hidden" value="يوجد مشكله برجاء التواصل معي الاداره">');
			$('#errors').val();
			function not7() {
					notif({
						msg: $('#errors').val(),
						type: "error"
					});
			};
			not7();

		},beforeSend: function() {
			$('.loader_cu').css('display','flex');
			$('.loading').css('display','flex');
			// $('.avatar-preview').css('border-color','red').delay(500);

		}
        });
      });
    });
 </script>




@endsection
