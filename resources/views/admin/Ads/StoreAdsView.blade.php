@extends('admin.layout.admin_master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/football-loader.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 {{-- Toggle Button  --}}
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 {{-- Toggle Button  --}}
 <!-- Internal Data table css -->

<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/libs.bundle.css')}}" rel="stylesheet">
<link href="{{URL::asset('Front-Store/css/theme.bundle.css')}}" rel="stylesheet">

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


{{-- row --}}
@section('content')

				<!-- row -->
				<div class="row">

					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<form id="newuser" action="{{Route('registerUser')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data"  >
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
									  <label for="validationCustom01" class="form-label">اسم المشترك</label>
									  <input type="text" minlength="3" name="name" value="{{old('name')}}" maxlength="30" class="form-control" placeholder="قم بكتابه اسم المتجر بشكل واضح" id="validationCustom01" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>


									  <div class="invalid-feedback" id="name_error">
										يجب الا يقل اسم المشترك عن 3 احرف
									</div>
									@error('name')
									<div class="text-danger">
										{{$message}}
									</div>
								   @enderror
									</div>

									<div class="col-md-4 mt-4 ">
										<label for="userCode" class="form-label">كود المشترك</label>
										<input name="userCode" class="form-control randCode"
										min="10000000"
										minlength="8" maxlength="8"  type="number" id="userCode" value="{{old('userCode')}}"  placeholder=" كود المشترك " required >
										<div class="errspan">
											<i class="fa-solid fa-wand-sparkles text-info "></i>
										</div>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="userCode_error">
											اكتب رقم مشترك مكون من 8 ارقام
										</div>
										@error('userCode')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>



									<div class="col-md-4 mt-4">
										<label for="validationCustom01" class="form-label">كلمه المرور</label>
										<input type="text" minlength="8" name="password" maxlength="32"  value="{{old('password')}}" class="form-control randpass" placeholder="اكتب كلمه مرور" id="validationCustom01" required>
										<div class="errspanpass">
											<i class="fa-solid fa-wand-sparkles text-info "></i>
										</div>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="password_error">
											يجب الا تقل كلمه المرور عن 8 احرف او ارقام
									  	</div>
										  @error('password')
										  <div class="text-danger">
											  {{$message}}
										  </div>
										 @enderror
									</div>


									<div class="col-md-4 mt-4">
										<label for="validationCustom01" class="form-label"> ايميل (اخياري)</label>
										<input type="email" minlength="3" name="email" maxlength="20" value="{{old('email')}}" class="form-control" placeholder="karam@karam.com" id="validationCustom01" >
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="email_error">
											قم بكتابه ايميل صالح
									  	</div>
										  @error('email')
										  <div class="text-danger">
											  {{$message}}
										  </div>
										 @enderror
									</div>


									  <div class="col-md-4 mt-4 ">
										<label for="phone" class="form-label">هاتف المشترك (اخياري)</label>
										<input name="phone" class="form-control"
										minlength="1" maxlength="20"   type="number" value="{{old('phone')}}"   id="phone" placeholder=" هاتف المشترك"   >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="phone_error">
											اكتب رقم هاتف صالح
										</div>
										@error('phone')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="whatsapp" class="form-label">واتس اب  (اخياري)</label>
										<input name="whatsapp" class="form-control" value="{{old('whatsapp')}}"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										minlength="1" maxlength="20"   type="number"   id="whatsapp" placeholder=" واتس اب المشترك"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="whatsapp_error">
											اكتب رقم هاتف صالح
										</div>
										@error('whatsapp')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>


									  <div class="col-md-4 mt-4 ">
										<label for="startOfSubscription" class="form-label"> بدايه  الاشتراك </label>
										<input name="startOfSubscription" pattern="\d{4}-\d{2}-\d{2}" onchange="setDate()" class="form-control"
										value="{{old('startOfSubscription')}}"
										 type="date"   id="startOfSubscription" placeholder="نهايه  تاريخ االاشتراك"  >

										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="startOfSubscription_error">
											ضع تاريخ اشتراك صالح
										</div>
										@error('startOfSubscription')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="endOfSubscription" class="form-label"> نهايه الاشتراك </label>
										<input name="endOfSubscription" class="form-control" value="{{old('endOfSubscription')}}"
										 type="date"   id="endOfSubscription" placeholder="بدايه تاريخ االاشتراك"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="endOfSubscription_error">
											ضع تاريخ اشتراك صالح
										</div>
										@error('endOfSubscription')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>


									  <div class="col-md-4 mt-4 ">
										<label for="nationalId" class="form-label">  الرقم القومي </label>
										<input name="nationalId" class="form-control"
										value="{{old('nationalId')}}"
										 type="text"   id="nationalId" placeholder="الرقم القومي"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="nationalId_error">
											ضع لينك صفحه الفيس بوك
										</div>
										@error('nationalId')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>

									  {{-- <div class="col-md-4 mt-4 ">
                                            <div class="form-group">
                                                <label class="form-label"> صلاحية المستخدم</label>
                                                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                            </div>
                                        </div> --}}


									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger" id="finish" type="submit">اضافه المشترك</button>
									</div>
										{{-- @foreach ($errors->all() as $error)
										{{ $error }}<br/>
									@endforeach --}}

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
@endsection
{{-- /row --}}


<!-- Button trigger modal -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
<div class="modal-content modal-content-demo">
    <div class="modal-header">
        <h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">

</div>
</div>
</div>

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

@endsection

@section('js')
<!-- Internal Data tables -->
<!-- Internal Data tables -->
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script> // now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> now cdn --}}
<script src="{{URL::asset('https://cdn.jsdelivr.net/gh/MohamedEtos/CDN@main/dataTables.buttons.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
<script src="{{URL::asset('Front-Store/js/vendor.bundle.js')}}"></script>

<!-- Theme JS -->
<script src="{{URL::asset('Front-Store/js/theme.bundle.js')}}"></script>


<script>
	// date auto set date
	// document.getElementById('startAds').valueAsDate = new Date();
	// document.getElementById('endAds').valueAsDate = new Date();

var now = new Date();
now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
document.getElementById('startAds').value = now.toISOString().slice(0,16);

</script>

@endsection
