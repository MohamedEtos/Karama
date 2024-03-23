@extends('admin.layout.admin_master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header  rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto text-light">الاشتراكات</h4><span class="text-light mt-1 tx-13 mr-2 mb-0">/ اضافه مشترك جديد</span>
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
										<input type="email" minlength="3" name="email" maxlength="60" value="{{old('email')}}" class="form-control" placeholder="karam@karam.com" id="validationCustom01" >
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
@section('js')


<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>


<script>
	// date auto set date
	document.getElementById('startOfSubscription').valueAsDate = new Date();

	let now = new Date();
	let nextYear = new Date(now.getFullYear() + 1, now.getMonth(), now.getDate());
	let dateString = nextYear.toISOString().slice(0, 10);
	document.getElementById("endOfSubscription").value = dateString;

	function setDate(){
		let now = document.getElementById('startOfSubscription').valueAsDate ;
		let nextYear = new Date(now.getFullYear() + 1, now.getMonth(), now.getDate());
		let dateString = nextYear.toISOString().slice(0, 10);
		document.getElementById("endOfSubscription").value = dateString;
	}

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
	// magic codeuser fill
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
