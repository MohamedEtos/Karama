@extends('admin.layout.admin_master')
@section('css')
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header    rounded opacity-50 justify-content-between ">
					<div class="left-content">
						<div class="">
						  <h2 class=" text-light main-content-title  tx-24 mg-b-1 mg-b-lg-1">الاشعارات</h2>
						</div>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">ارسال اشعارات </h3>
							</div>
							<div class="card-body">
								<form id="formSendNotify">
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
										<div class="row align-items-center">
											<label class="col-sm-2">الي</label>
											<div class="col-sm-10">
												<input type="number" name="userCode" placeholder="رقم المستخدم او التاجر" class="form-control">
                                                <small id="userCode_error" class="text-danger"></small>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row ">
											<label class="col-sm-2">الاشعار</label>
											<div class="col-sm-10">
												<textarea rows="10" name="notify" placeholder="موضوع الاشعار" class="form-control"></textarea>
                                                <small id="notify_error" class="text-danger"></small>

											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="card-footer d-sm-flex">
								<div class="mt-2 mb-2">
									{{-- <a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Attach"><i class="bx bx-paperclip text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Link"><i class="bx bx-link text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Photos"><i class="bx bx-image text-muted tx-22"></i></a>
									<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="bx bx-trash text-muted tx-22"></i></a> --}}
								</div>
								<div class="btn-list mr-auto">
									{{-- <button type="button" class="btn btn-success btn-space">Discard</button> --}}
									<button type="submit" id="send" class="btn btn-danger btn-space">ارسال</button>
								</div>
							</div>
						</div>
					</div>


                    @include('admin.notify.list');


				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<script>

	$(function() {

		$('#send').on('click', function(e) {

            e.preventDefault();
            let formData = new FormData($('#formSendNotify')[0]);

            $.ajax({
				beforeSend: function() {
					$('.loading').css('display','flex')
					$('.loader_cu').css('display','flex')
					$('small').html('');

				},
                type: "post",
                url: "{{route('sendNotifyAjax')}}",
                data : formData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
					$('form').append('<input id="nofic" type="hidden" value="">');
					$('#nofic').val(data.MSG);
					function not7() {
							notif({
								msg: $('#nofic').val(),
								type: "success"
							});
						};
						not7();
						$("#formSendNotify")[0].reset();
                },complete: function(){
					$('.loader_cu').css('display','none')
					$('.loading').css('display','none')
					$('#formSendNotify').reset();
				},error: function(reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function(key,val){
                        $("#" + key + "_error").html(val[0]);
					});

					$('form').append('<input id="errors" type="hidden" value="يوجد بعض المشكلا برجاء مرجعه الحقول ">');
					$('#errors').val();
					function not7() {
							notif({
								msg: $('#errors').val(),
								type: "error"
							});
					};
					not7();




                }
            });

        });



	});



</script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>


@endsection
