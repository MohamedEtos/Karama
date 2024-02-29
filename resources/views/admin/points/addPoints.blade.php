@extends('admin.layout.admin_master')
@section('css')


<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<style>

</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header   rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">النتقاط</h4><span class="  mt-1 tx-13 mr-2 mb-0">/  اضافه نقاط للعميل  </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">

					<div class="col-md-6 col-xl-6 col-xs-12 col-sm-12 m-auto">
						<div class="card">
							<div class="card-body">
								<form  action="{{url('admin/addUserPoints')}}" method="POST" id="pointsForm" class="row g-3 "   >
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
									<div class="col-md-5">
									  <label for="validationCustom01" class="form-label">رقم العميل</label>
									  <input type="text" minlength="8" name="usercode"    class="form-control usercode" placeholder=" رقم العميل المكتوب علي الكارت" id="usercode" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
                                        <div class="invalid-feedback" id="name_error">
                                            اكتب رقم المستخدم المكون من 8 ارقام
                                        </div>
									</div>
                                    <div class="col-1 text-center tx-18 pt-2     mt-4 ">
										<i class="fa-solid fa-arrow-right m-auto text-danger "></i>
									</div>
									<div class="col-md-6">
									  <label for="validationCustom01" class="form-label">اسم المتجر</label>
                                        <select name="merchantId"  id="merchantId" class="form-control" >
                                            @forelse ($merchants as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @empty
                                                <option value="">لا يوجد تجار</option>
                                            @endforelse
                                        </select>
									</div>

									<div class="col-7 mt-4">
										<label for="validationCustom01" class="form-label">اسم العميل</label>
										<input type="text" disabled  name="Rname" maxlength="100" class="form-control"  placeholder="" id="Rname" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="productDescription_error">
                                            تاكد من رقم العميل
										</div>
									  </div>
									<div class="col-5 mt-4">
										<label for="validationCustom01" class="form-label"> نقاط سابقه</label>
										<input type="text" disabled  name="oldpoint" maxlength="100" class="form-control"  placeholder="" id="oldpoint" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="productDescription_error">
                                            تاكد من رقم العميل
										</div>
									  </div>

									<div class="col-12 mt-4">
										<label for="price" class="form-label">النقاط المضافه من المتجر</label>
										<input name="price" class="form-control"
										step="any"
										minlength="1" maxlength="5" max="9999" onkeydown="result()" type="number"   id="price" placeholder="مثال : 99 ₪"  required>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="price_error">
											يجب الا يقل سعر المنتج عن عن 1 ولا يزيد عن 5 ارقام
										</div>
									  </div>

                                      <input type="hidden" id="userId" name="userId">

									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger disabled"   id="finish" type="submit">تاكيد</button>
									</div>
								  </form>

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

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->

		</div>


@endsection
@section('js')


<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->

<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>



<script>



        $('#usercode,#merchantId').on('keyup paste change', function () {

        var Rname = document.getElementById('Rname');
        var usercode = document.getElementById('usercode');
        var value = document.getElementById('usercode').value;
        var userId = document.getElementById('userId');
        var finish = document.getElementById('finish');
        var oldpoint = document.getElementById('oldpoint');
        var e = document.getElementById("merchantId");
        var merchantId = e.options[e.selectedIndex].value;




            if (value.length == 8 ) { //check if value == 8

					   $.ajax({
						   type: "GET",
						   url: 'checkUserCode/'+value+'/'+merchantId,
						   dataType: 'json',
						   beforeSend: function() {
                            $('.loading').css('display','flex');
					        $('.loader_cu').css('display','flex');
						   },
						    success: function(data){
                               usercode.classList.remove("border","border-warning");
                               usercode.classList.remove("border","border-danger");
                               usercode.classList.add("border", "border-success");
                               finish.classList.remove('disabled');
                               Rname.value = data.MSG.name ;
                               userId.value = data.MSG.id;
                               oldpoint.value = data.oldPoints.points;


                               if(data.MSG == 'nodata'  ){
                                    Rname.value = 'لا يوجد بيانات  ' ;

                                    usercode.classList.remove("border","border-warning");
                                    usercode.classList.remove("border", "border-success");
                                    usercode.classList.add("border","border-danger");
                                    $('.loading').css('display','none');
                                    $('.loader_cu').css('display','none');
                                    finish.classList.add('disabled');
									oldpoint.value = '0';

                                }else if (data.oldPoints == 'nodata'){
									oldpoint.value = '0';
								}

                                $('.loading').css('display','none');
                                $('.loader_cu').css('display','none');
						    },complete: function(){
                                $('.loading').css('display','none');
                                $('.loader_cu').css('display','none');

                            },error: function(reject){
                                Rname.value = 'لا يوجد بيانات  ' ;
								oldpoint.value = '0';

                                usercode.classList.remove("border","border-warning");
                                usercode.classList.remove("border", "border-success");
                                usercode.classList.add("border","border-danger");
                                $('.loading').css('display','none');
                                $('.loader_cu').css('display','none');
                                finish.classList.add('disabled');

						    },

					     });
            }else if(usercode.value.length < 8){
                usercode.classList.remove("border","border-success");
                usercode.classList.add("border","border-warning");
                document.getElementById('Rname').value = '' ;
                finish.classList.add('disabled');

            }




    });


</script>


@endsection

