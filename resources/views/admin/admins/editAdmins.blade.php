@extends('admin.layout.admin_master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css')}}">
<style>
    .bootstrap-tagsinput .tag {
  background: #D72427;
  /* border: 1px solid black; */
  padding: 0 6px;
  margin: 2px;
  color: white;
  border-radius: 4px;
}

.bootstrap-tagsinput{
    display: block;
    width: 100%;
    height: 40px;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4d5875;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e1e5ef;
    border-radius: 3px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header  rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title  mb-0 my-auto">المديرين</h4><span class=" mt-1 tx-13 mr-2 mb-0">/ تعديل مدير  ({{$manger->name}}) </span>
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
								<form id="newStore" action="{{Route('updateManger')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate >
									@csrf
									<input type="hidden" name="userId" value="{{Crypt::encrypt($manger->id)}}">
									<input type="hidden" name="userDetailsId" value="{{Crypt::encrypt($manger->userToDetalis->id)}}">
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
									  <label for="validationCustom01" class="form-label">اسم المدير</label>
									  <input type="text" minlength="3" name="name" value="{{$manger->name}}" maxlength="15" class="form-control" placeholder="قم بكتابه اسم المدير بشكل واضح" id="validationCustom01" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
									  <div class="invalid-feedback" id="name_error">
										يجب الا يقل اسم المدير عن 3 احرف
									</div>
									@error('name')
									<div class="text-danger">
										{{$message}}
									</div>
								   @enderror
									</div>

									<div class="col-md-4 mt-4 ">
										<label for="userCode" class="form-label">كود المدير</label>
										<input name="userCode" class="form-control randCode"
										value="{{$manger->usercode}}"
										min="10000000"
										minlength="8" maxlength="8"  type="number" id="userCode"  placeholder=" كود المشترك " required >
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
										<input type="text" minlength="8" name="password" maxlength="32" value="{{$manger->password}}" class="form-control randpass" placeholder="اكتب كلمه مرور" id="validationCustom01" required>
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
										<label for="validationCustom01" class="form-label">ايميل</label>
										<input type="email" minlength="3" name="email" maxlength="20" value="{{$manger->email}}" class="form-control" placeholder="karam@karam.com" id="validationCustom01" required>
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
										<label for="phone" class="form-label">هاتف المدير (اخياري)</label>
										<input name="phone" class="form-control"
										minlength="10" maxlength="10" min="100000000"   type="number" value="{{$manger->userToDetalis->phone}}"   id="phone" placeholder=" هاتف المدير"   >
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
										<input name="whatsapp" class="form-control"
										minlength="10" maxlength="10"  min="100000000"  type="number"  value="{{$manger->userToDetalis->whatsapp}}"  id="whatsapp" placeholder=" هاتف المدير"  >
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
										<label for="nationalId" class="form-label">  الرقم القومي (اخياري)</label>
										<input name="nationalId" class="form-control"
										value="{{$manger->userToDetalis->nationalId}}"
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

                                      <div class="col-md-4 mt-4 ">
                                        <div class="form-group">
                                            <label class="form-label"> صلاحية المستخدم</label>
                                            {{-- {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                                            <select name="roles_name" class="form-control multiple" id="">
                                              @forelse ($roles as $role )

                                                @if ($role == $manger->roles_name)
                                                    <option selected value="{{$role}}">{{$role}}</option>
                                                @else
                                                    <option  value="{{$role}}">{{$role}}</option>
                                                @endif

                                              @empty
                                                <option  value="">لا يوجد صلاحيات</option>
                                              @endforelse
                                          </select>
                                      </div>
                                    </div>


                                    <div class="col-md-4 mt-4 ">
                                    <div class="form-group">
                                        <label class="form-label">حاله الحساب</label>
                                        <select name="status" class="form-control " id="">
                                            @if ($manger->status == 'inactive')
                                                <option selected value="inactive" class="text-danger">تم الايقاف</option>
                                                <option class="text-primary" value="active">مفعل</option>
                                            @else
                                            <option class="text-primary" value="active">مفعل</option>
                                            <option value="inactive" class="text-danger">ايقاف الحساب</option>
                                            @endif


                                        </select>
                                    </div>
                                </div>





									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger" id="finish" type="submit">تحديث المدير</button>
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
<script src="{{URL::asset('https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js')}}"></script>



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
