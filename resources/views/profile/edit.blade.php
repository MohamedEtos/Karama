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

@extends('layouts.users.master')
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
							{{-- <h4 class="content-title mb-0 my-auto text-light">الملف الشخصي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span> --}}
						</div>
					</div>


				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-8 col-md-10 col-xl-6  col-xs-12 col-sm-12 m-auto">
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
												<input type="text" class="form-control"      value="{{Auth::user()->startOfSubscription}} " disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">ينتهي في</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control"   value="{{Auth::user()->endOfSubscription}}" disabled>
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">رقم الهاتف</label>
											</div>
											<div class="col-md-9">
												<input type="text" class="form-control" disabled  placeholder="phone number" value="{{Auth::user()->userToDetalis->phone}} ">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">العنوان</label>
											</div>
											<div class="col-md-9">
												<textarea class="form-control" name="example-textarea-input" rows="2"  placeholder="رقم البنايه / الشارع / المنطقه" disabled>{{Auth::user()->userToDetalis->location}} </textarea>
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
