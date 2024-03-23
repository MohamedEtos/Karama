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
							<h4 class="content-title mb-0 my-auto ">المتاجر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه متجرر جديد</span>
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
								<form id="newStore" action="{{Route('createStore')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate >
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
                                    <div class="erros col-12">
                                        @if ($errors->any())
                                        <div class="text-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    </div>

									<div class="col-md-4 mt-4">
									  <label for="validationCustom01" class="form-label">اسم المتجر</label>
									  <input type="text" minlength="3" name="name" value="{{old('name')}}" maxlength="30" class="form-control" placeholder="قم بكتابه اسم المتجر بشكل واضح" id="validationCustom01" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
									  <div class="invalid-feedback" id="name_error">
										يجب الا يقل اسم المتجرر عن 3 احرف
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
										value="{{old('userCode')}}"
										min="10000000"
										minlength="8" maxlength="8"  type="number" id="userCode" value="{{old('userCode')}}" placeholder=" كود المشترك " required >
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
										<input type="text" minlength="8" name="password" maxlength="32" value="{{old('password')}}" class="form-control randpass" placeholder="اكتب كلمه مرور" id="validationCustom01" required>
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
										<input type="email" minlength="3" name="email" maxlength="60" value="{{old('email')}}" class="form-control" placeholder="karam@karam.com" id="validationCustom01" required>
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
									<div class="col-md-4 mt-4">
										<label for="validationCustom02" class="form-label">قسم المتجر</label>
										<select class="form-control" id="allCategory" name="category"  >
                                            <option value="" disabled selected>اختر قسم --</option>
												@foreach ($categoryData as $categoryes)
													<option  value="{{$categoryes->id}}">{{$categoryes->name}}</option>
												@endforeach
										</select>
										<div class="valid-feedback">
											احسنت !
										</div>
										<div class="invalid-feedback" id="categoryId_error">
											قم باختيار قسم للمتجر
										</div>
										@error('category')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									</div>

									<div class="col-md-4 mt-4 ">
										<label for="validationCustom01" class="form-label">تخصص المتجر</label>
										<input type="text" style="width: 100%" minlength="4" name="subCat" data-role="tagsinput" value="{{old('subCat')}}"  class="form-control"  placeholder=" اكتب التخصص ثم Enter" id="subCat" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="subCat_error">
										</div>
										@error('subCat')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>



									  <div class="col-md-4 mt-4 ">
										<label for="phone" class="form-label">هاتف المتجر (اخياري)</label>
										<input name="phone" class="form-control"
										minlength="8" maxlength="20" min="100000000"   type="number" value="{{old('phone')}}"   id="phone" placeholder=" هاتف المتجر"   >
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
										minlength="8" maxlength="20"  min="100000000"  type="number"  value="{{old('whatsapp')}}"  id="whatsapp" placeholder=" هاتف المتجر"  >
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
										<label for="facebook" class="form-label">فيس بوك (اخياري)</label>
										<input name="facebook" class="form-control"
										value="{{old('facebook')}}"
										   type="text"   id="facebook" placeholder="https//www.facebook.com "  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="facebook_error">
											ضع لينك صفحه الفيس بوك
										</div>
										@error('facebook')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>


									  <div class="col-md-4 mt-4 ">
										<label for="website" class="form-label"> الموقع الالكتروني (اخياري)</label>
										<input name="website" class="form-control"
										value="{{old('website')}}"
										 type="text"   id="website" placeholder="https//www.Karama-SC.com"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="website_error">
											ضع لينك المتجر
										</div>
										@error('website')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>


									  {{-- <div class="col-md-4 mt-4 ">
										<label for="maps" class="form-label"> موقعك علي الخريطه (اخياري)</label>
										<input name="maps" class="form-control"
										value="{{old('maps')}}"
										 type="text"   id="maps" placeholder="https://www.google.com/maps/@30.0308657,31.1111907,14z?entry=ttu"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="maps_error">
											ضع لينك المتجر
										</div>
										@error('maps')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div> --}}

									  <div class="col-md-4 mt-4 ">
										<label for="location" class="form-label">  العنوان (اخياري)</label>
										<input name="location" class="form-control"
										value="{{old('location')}}"
										 type="text"   id="location" placeholder="العنوان"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="location_error">
											ضع لينك صفحه الفيس بوك
										</div>
										@error('location')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>
									  <div class="col-md-4 mt-4 ">
										<label for="bio" class="form-label">  نبذه عن المتجر (اخياري)</label>
										<textarea name="bio" class="form-control"
										 type="text"   id="bio" placeholder="نبذة عن المتجر"  >{{old('bio')}}</textarea>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="bio_error">
										</div>
										@error('location')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>

									  <div class="col-md-4 mt-4 ">
										<label for="nationalId" class="form-label">  الرقم القومي (اخياري)</label>
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

									  <div class="col-md-4 mt-4 ">
										<label for="nationalId" class="form-label text-danger">الحد الادني لستبدال النقاط</label>
										<input name="exchangeLimit" class="form-control" required
										value="{{old('exchangeLimit')}}"
										 type="text"   id="exchangeLimit" placeholder="اقل نقاط يمكن استبدالها"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="exchangeLimit_error">
											ضع الحد الادني لستبدال النقاط
										</div>
										@error('exchangeLimit')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>
									  <div class="col-md-4 mt-4 ">
										<label for="nationalId" class="form-label text-danger">النقاط علي كل 100 شيكل</label>
										<input name="transferPoints" class="form-control" required
										value="{{old('transferPoints')}}"
										 type="text"   id="transferPoints" placeholder="كم نقطه يمكن كسبها من كل 100 نقطه"  >
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="transferPoints_error">
                                            كم نقطه لكل 100 نقطه شراء
										</div>
										@error('transferPoints')
										<div class="text-danger">
											{{$message}}
										</div>
									   @enderror
									  </div>

									  {{-- <div class="col-md-4 mt-4 ">
                                          <div class="form-group">
                                              <label class="form-label"> صلاحية المستخدم</label>
                                              {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                              <select name="roles_name" class="form-control multiple" id="">
                                                @forelse ($roles as $role )
                                                    <option value="{{$role}}">{{$role}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    </div> --}}


									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger" id="finish" type="submit">اضافه المتجر</button>
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

{{-- get sub cat ajax --}}
<script>
    var allCategory  = document.getElementById('allCategory');


    $('#allCategory').on('change ', function() {

                $.ajax({
                    type: "GET",
                    url: 'getCategoryAjax/'+allCategory.value,
                    dataType: 'json',
                    beforeSend: function() {
                        $('.loading').css('display','flex');
                        $('.loader_cu').css('display','flex');
                    },
                        success: function(data){
                            $('#subCat').tagsinput();
                            $('#subCat').tagsinput('removeAll');
                            $('#subCat').tagsinput('add',data.Done );

                        },complete: function(){
                            $('.loading').css('display','none');
                            $('.loader_cu').css('display','none');

                        },error: function(reject){

                            $('.loading').css('display','none');
                            $('.loader_cu').css('display','none');
                        },

                    });


    });

    $('input').on('beforeItemRemove', function(event) {
        alert("لا يمكن حذف الفئات السابقه فقط اضف عليهم");
        var tag = event.item;
        if(tag == DataMixin.data.user.username){
            event.cancel = true;
            console.log('cannot delete agent');
        }else{
            console.log('agent deleted');
        }
    });

</script>

@endsection
