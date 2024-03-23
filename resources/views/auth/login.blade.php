{{-- <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ml-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form> --}}

@extends('layouts.master3')
@section('css')

<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
<link rel="icon" href="{{asset('assets/img/brand/logos-07-01.svg')}}">

@endsection

@section('metaGoogle')
<meta name="description" content="نادي الكرامه - نادي نابلسي حديث التأسيس بأيدي شبابية
يهدف لنشر الوعي والتثقيف الرياضي والوطني وتعزيز روح الانتماء والعمل التطوعي من خلال تقديم الأنشطة.
الثقافية والرياضية والمجتمعية بجودة عالية وبالتعاون مع كوادر مؤهلة، وبهمة شباب متطوعين">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Form-Elements</span>
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
<div class=" d-flex  justify-content-center pt-5">

<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 align-items-center ">

	<div class="h-25"></div>
						<div class="card  box-shadow-1 ">
							<div class="card-header row m-0">
								<div class="col-6">
								<h1 class="login_title mt-2">تسجيل الدخول</h1>
								</div>
								<div class="col-6 text-left pl-5">
								<img src="{{asset('/assets/img/brand/favicon.png')}}" class="" style="width: 60px;" alt="krama-logo">
								</div>

							</div>
						<div class="card-body pt-0">
                                <form method="POST" action="{{ route('login') }}">

									@csrf
									<div class="">
										<div class="form-group">
											<label for="email" :value="__('usercode')">رقم الاشتراك</label>
											<input type="number" name="usercode" value="{{old('usercode')}}"  class="form-control" id="usercode" placeholder="رقم الاشتراك">

											@error('usercode')
												<span class="text-danger">{{$message}}</span>
											@enderror
										</div>




										<div class="form-group">
											<label  for="password" :value="__('password')">كلمه المرور</label>
											<input type="password" id="password" class="form-control" id="password" :value="old('password')" required autofocus autocomplete="password" name="password" placeholder="كلمه المرور">
											@error('password')
											    <span class="text-danger">{{$message}}</span>
                                            @enderror
										</div>




										<div class="checkbox">
											<div class="custom-checkbox custom-control">
												<input type="checkbox" name="remember" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
												<label for="checkbox-1" class="custom-control-label mt-1">احفظ بيناتي</label>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-block btn-danger mt-3 mb-0">دخول </button>
								</form>
							</div>
						</div>
					</div>
</div>

@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection
