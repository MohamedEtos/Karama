@extends('merchant.layout.merchant_master')
@section('css')


<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('assets/css-rtl/exchangepoints.css')}}" rel="stylesheet" type="text/css"/>

<style>

</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header text-light rounded justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">النتقاط</h4><span class="text-light mt-1 tx-13 mr-2 mb-0">/  اضافه نقاط للعميل  </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">

					<div class="col-md-6 col-xl-4 col-xs-12 col-sm-12 m-auto">
						<div class="card">
							<div class="card-body">
								<form  action="{{url('merchant/exchangePoints')}}" method="POST" id="pointsForm" class="row g-3 "   >
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
										<div class="col-6">
											<span class="h4">
												استبدال النقاط
											</span>
										</div>
										<div class="col-6">
											<span>
												<i class="fa-solid fa-arrow-right-arrow-left fa-2xl float-left ml-4   text-danger"></i>
											</span>
										</div>
									<div class="col-12">
										لا يمكن استبدال اقل من <span class="text-success">100</span> نقطه
									</div>
									<div class="col-12 mt-3">
									  <label for="validationCustom01" class="form-label">رقم العميل</label>
									  <input type="text" minlength="8" name="usercode"    class="form-control usercode" placeholder=" رقم العميل المكتوب علي الكارت" id="usercode" required>
									  <div class="valid-feedback">
										ممتاز !
									  </div>
                                        <div class="invalid-feedback" id="name_error">
                                            اكتب رقم المستخدم المكون من 8 ارقام
                                        </div>
									</div>

									<div class="col-6 mt-4">
										{{-- <label for="validationCustom01" class="form-label">اسم العميل</label> --}}
										<input type="text" disabled  name="Rname" maxlength="100" class="form-control userName"  placeholder="" id="Rname" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="productDescription_error">
                                            تاكد من رقم العميل
										</div>
									  </div>
									  <div class="col-1  mt-5 userNameArrow">
										<i class="fa-solid fa-arrow-left m-auto text-danger "></i>
									  </div>
									<div class="col-5 mt-4">
										{{-- <label for="validationCustom01" class="form-label"> نقاط سابقه</label> --}}
										<input type="text" disabled  name="oldpoint" maxlength="100" class="form-control userName text-success"  placeholder="" id="oldpoint" required>
										<div class="valid-feedback">
										  ممتاز !
										</div>
										<div class="invalid-feedback" id="productDescription_error">
                                            تاكد من رقم العميل
										</div>
									  </div>

									<div class="col-6 mt-4">
										{{-- <label for="price" class="form-label">قيمه مشتريات العميل</label> --}}
										<input name="points" class="form-control userName" 
										step="any"
										minlength="1" maxlength="5" max="9999"  type="number" onkeyup="pointsfun()"  id="points" placeholder=" نقاط"   required>
										<div class="valid-feedback">
											ممتاز !
										</div>
										<div class="invalid-feedback" id="points_error">
											يجب الا يقل سعر المنتج عن عن 1 ولا يزيد عن 5 ارقام
										</div>
									  </div>

									  <div class="col-1  mt-5 userNameArrow">
										<i class="fa-solid fa-arrow-right-arrow-left text-danger"></i>
									</div>
									<div class="col-5 mt-4">
										<input name="price" class="form-control userName" 
										step="any"
										minlength="1" maxlength="5" max="9999"  type="number" onkeyup="pricefun()"  id="price"  placeholder="   ₪"  required>	
									</div>


                                      <input type="hidden" id="userId" name="userId">
                                      <input type="hidden" id="merchantId" name="merchantId" value="{{Auth::User()->id}}">
									
									<div class="col-12 mt-4">
									  <button class="btn btn-block btn-lg btn-danger disabled"   id="finish" type="submit">تاكيد</button>
									</div>
								</div>

								  </form>

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

        $('#usercode').on('keyup paste', function() {
            
        let Rname = document.getElementById('Rname');
        let usercode = document.getElementById('usercode');
        let value = document.getElementById('usercode').value;
        let userId = document.getElementById('userId');
        let finish = document.getElementById('finish');
        let oldpoint = document.getElementById('oldpoint');
		let price = document.getElementById('price')	;
		let points = document.getElementById('points');

            if (value.length == 8 ) { //check if value == 8 
 
					   $.ajax({  
						   type: "GET",
						   url: 'checkUserCode/'+value,
						   dataType: 'json',
						   beforeSend: function() {
                            $('.loading').css('display','flex');
					        $('.loader_cu').css('display','flex');
						   },
						    success: function(data){
                               usercode.classList.remove("border","border-warning");
                               usercode.classList.remove("border","border-danger");
                               usercode.classList.add("border", "border-success");
                               Rname.value = data.MSG.name ;
                               userId.value = data.MSG.id;
                               oldpoint.value = data.oldPoints.points;
							   points.value = 0;
							   price.value = 0;

								//exchange point to mony
								$('#price').on('keyup paste', function() {
									points.value = (price.value * 10)
								})
								//exchange point to mony
								$('#points').on('keyup paste', function() {
									price.value = (points.value / 10)
									
								})

								

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
								finish.disabled = false;

						    },

					     });
            }else if(usercode.value.length < 8){
                usercode.classList.remove("border","border-success");
                usercode.classList.add("border","border-warning");
                document.getElementById('Rname').value = '' ;
                finish.classList.add('disabled');
				finish.disabled = false;

            }




    });


</script>


<script>
	let oldpoint = document.getElementById('oldpoint')	;
	let price = document.getElementById('price')	;
	let points = document.getElementById('points');
	let finish = document.getElementById('finish');

	//exchange point to mony
	finish.disabled = true;

	function pointsfun(){
		if(  parseInt(Number(points.value))  <=   parseInt(Number(oldpoint.value)) && parseInt(Number(points.value)) >= 100 ){
			finish.classList.remove('disabled');
			finish.disabled = false;
		}else{
			finish.classList.add('disabled');
			finish.disabled = true;

		}
	};

	function pricefun(){

		if(  parseInt(Number(price.value*10))  <=   parseInt(Number(oldpoint.value)) && parseInt(Number(price.value)) >= 10){
			finish.classList.remove('disabled');
			finish.disabled = false;
		}else{
			finish.classList.add('disabled');
			finish.disabled = true;

		}
	};
</script>


@endsection

