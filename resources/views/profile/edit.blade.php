{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
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
					<!-- Col -->
					{{-- <div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">Petey Cruiser</h5>
												<p class="main-profile-name-text">Web Designer</p>
											</div>
										</div>
										<h6>Bio</h6>
										<div class="main-profile-bio">
											pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure.. <a href="">More</a>
										</div><!-- main-profile-bio -->
										<div class="row">
											<div class="col-md-4 col mb20">
												<h5>947</h5>
												<h6 class="text-small text-muted mb-0">Followers</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>583</h5>
												<h6 class="text-small text-muted mb-0">Tweets</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>48</h5>
												<h6 class="text-small text-muted mb-0">Posts</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Social</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>Github</span> <a href="">github.com/MohamedMahrous</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>Twitter</span> <a href="">twitter.com/MohamedMahrous.me</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>Linkedin</span> <a href="">linkedin.com/in/MohamedMahrous</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>My Portfolio</span> <a href="">fb.com/mohamed.etos/</a>
												</div>
											</div>
										</div>
										<hr class="mg-y-30">
										<h6>Skills</h6>
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
										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label tx-13 mg-b-25">
									Conatct
								</div>
								<div class="main-profile-contact-list">
									<div class="media">
										<div class="media-icon bg-primary-transparent text-primary">
											<i class="icon ion-md-phone-portrait"></i>
										</div>
										<div class="media-body">
											<span>Mobile</span>
											<div>
												+245 354 654
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-success-transparent text-success">
											<i class="icon ion-logo-slack"></i>
										</div>
										<div class="media-body">
											<span>Slack</span>
											<div>
												@MohamedMahrous.w
											</div>
										</div>
									</div>
									<div class="media">
										<div class="media-icon bg-info-transparent text-info">
											<i class="icon ion-md-locate"></i>
										</div>
										<div class="media-body">
											<span>Current Address</span>
											<div>
												San Francisco, CA
											</div>
										</div>
									</div>
								</div><!-- main-profile-contact-list -->
							</div>
						</div>
					</div> --}}

					<!-- Col -->
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">المعلومات الشخصيه والاشتراكات </div>
                                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" class="form-horizontal">
                                        @csrf
                                        @method('put')
									<div class="form-group ">

									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">الاسم</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"  placeholder="User Name" value="{{Auth::user()->name}}" disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">

									</div>
									<div class="form-group ">

									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم المستخدم</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"  placeholder="Nick Name" value="{{Auth::user()->usercode}}"disabled>
											</div>
										</div>
									</div>

									<div class="mb-4 main-content-label">بيانات الاشتراك</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">نوع الاشتراك</label>
											</div>
											<div class="col-md-9">



                                                
                                            <input type="text" class="form-control"  placeholder="Designation" value="
	@if (Auth::user()->subtype == 'admin')
	مشرف
	@elseif (Auth::user()->subtype == 'merchant')
	تاجر
	@elseif (Auth::user()->subtype == 'user')
	مستخدم
	@endif
                                            " disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">تاريخ الاشتراك</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"  placeholder="01/01/2023" value="01/01/2023" disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">ينتهي في</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"  placeholder="01/01/2025" value="01/01/2025" disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم الهاتف</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" disabled  placeholder="phone number" value="{{Auth::user()->phone_number}} ">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">العنوان</label>
											</div>
											<div class="col-md-9">
												<textarea class="form-control" name="example-textarea-input" rows="2"  placeholder="رقم البنايه / الشارع / المنطقه" disabled></textarea>
											</div>
										</div>
									</div>
                                    
									<div class="mb-4 main-content-label">الرقم السري</div>


                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">كلمه المرور الحاليه</label>
                                                </div>
                                                <div class="col-md-9">
                                                    

                                                    <input class="form-control" id="current_password" name="current_password" type="password" autocomplete="current-password" >
                                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">كلمه المرور الجديده</label>
                                                </div>
                                                <div class="col-md-9">

                                                    <input  class="form-control" id="password" name="password" type="password"  utocomplete="new-password">
                                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger" />
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">تاكيد كلمه المرور</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input  class="form-control" id="password_confirmation" name="password_confirmation" type="password"  utocomplete="new-password">
                                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger" />
                                                </div>
                                            </div>
                                        </div>


							</div>
							<div class="card-footer text-left">




                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif




								<button type="submit" class="btn btn-danger waves-effect waves-light">حفظ التعديلات</button>

								@if(Session::has('status'))
                                <input id="nofic" type="hidden" value="{{Session::get('status')}}">
                                <script>
                                    window.onload = function not7() {
                                      notif({
                                           msg: $('#nofic').val(),
                                           type: "success"
                                       });
                                   }
                                   </script>
								@endif

							</div>
								</form>

						</div>
					</div>
					<!-- /Col -->
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


<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection