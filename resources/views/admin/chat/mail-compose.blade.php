@extends('admin.layout.admin_master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto ">الرسائل</h4><span class=" mt-1 tx-13 mr-2 mb-0">/ ارسال رساله</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<form action="{{Route('sendMessage')}}" method="post">
							@csrf
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">رساله جديده</h3>
								</div>
								<div class="card-body">
										<div class="form-group">
											<div class="row align-items-center">
												<label class="col-sm-2">الي</label>
												<div class="col-sm-10">
													<input type="hidden" id="Recever" name="Recever">
													<input type="text" id="userCode" name="usercode" class="form-control" placeholder="رقم المستخدم" >
													<span class="text-success h5" id="Rname"></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row align-items-center">
												<label class="col-sm-2">الموضوع</label>
												<div class="col-sm-10">
													<input type="text" name="title" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row ">
												<label class="col-sm-2">الرساله</label>
												<div class="col-sm-10">
													<textarea rows="10" name="body" class="form-control"></textarea>
												</div>
											</div>
										</div>
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
								<div class="card-footer d-sm-flex">
									<div class="mt-2 mb-2">
										<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Attach"><i class="bx bx-paperclip text-muted tx-22"></i></a>
										<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Link"><i class="bx bx-link text-muted tx-22"></i></a>
										<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Photos"><i class="bx bx-image text-muted tx-22"></i></a>
										<a href="javascript:void(0)" class="mr-3" data-toggle="tooltip" title="" data-original-title="Delete"><i class="bx bx-trash text-muted tx-22"></i></a>
									</div>
									<div class="btn-list mr-auto">
										<button type="button" class="btn btn-success btn-space">تجاهل</button>
										<button type="button" class="btn btn-primary btn-space">حفظ</button>
										<button id="finish" type="submit" class="btn btn-danger btn-space">ارسال</button>
									</div>
								</div>
							</div>

						</form>
					</div>
					<!-- Col -->
					<div class="col-lg-4 col-xl-3 col-md-12 col-sm-12">
						<div class="card mg-b-20">
							<div class="main-content-left main-content-left-mail card-body">
								<a class="btn btn-primary btn-compose" href="" id="btnCompose">Compose</a>
								<div class="main-mail-menu">
									<nav class="nav main-nav-column mg-b-20">
										<a class="nav-link" href=""><i class="bx bxs-inbox"></i> Inbox <span>18</span></a>
										<a class="nav-link" href=""><i class="bx bx-star"></i> Starred <span>8</span></a>
										<a class="nav-link" href=""><i class="bx bx-alarm-snooze"></i> Snoozed <span>6</span></a>
										<a class="nav-link" href=""><i class="bx bx-bookmarks"></i> Important <span>15</span></a>
										<a class="nav-link" href=""><i class="bx bx-send"></i> Sent Mail <span>24</span></a>
										<a class="nav-link" href=""><i class="bx bx-edit"></i> Drafts <span>2</span></a>
										<a class="nav-link" href=""><i class="bx bx-message-error"></i> Spam <span>32</span></a>
										<a class="nav-link" href=""><i class="bx bx-message-square-detail"></i> Chats <span>14</span></a>
										<a class="nav-link" href=""><i class="bx bx-folder"></i> All Mail <span>652</span></a>
										<a class="nav-link" href=""><i class="bx bx-book-content"></i> Contacts <span>547</span></a>
										<a class="nav-link" href=""><i class="bx bx-trash"></i> Trash <span>365</span></a>
									</nav>
									<label class="main-content-label main-content-label-sm">Settings</label>
									<nav class="nav main-nav-column">
										<a class="nav-link active" href="#">Email Settings</a>
										<a class="nav-link" href="#">Account Information</a>
									</nav>
								</div><!-- main-mail-menu -->
							</div>
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
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<script>



	$('#userCode').on('keyup paste change', function () {

	var Rname = document.getElementById('Rname');
	var usercode = document.getElementById('userCode');
	var value = document.getElementById('userCode').value;
	var Recever = document.getElementById('Recever');
	var finish = document.getElementById('finish');




		if (value.length == 8 ) { //check if value == 8

				   $.ajax({
					   type: "GET",
					   url: 'checkUserCodeMail/'+value,
					   dataType: 'json',
					   beforeSend: function() {
						$('.loading').css('display','flex');
						$('.loader_cu').css('display','flex');
					   },
						success: function(data){
						   userCode.classList.remove("border","border-warning");
						   userCode.classList.remove("border","border-danger");
						   userCode.classList.add("border", "border-success");
						   finish.classList.remove('disabled');
						   Rname.innerHTML = data.MSG.name ;
						   Recever.value = data.MSG.id;


						   if(data.MSG == 'nodata'  ){
								Rname.innerHTML = 'لا يوجد بيانات  ' ;

								userCode.classList.remove("border","border-warning");
								userCode.classList.remove("border", "border-success");
								userCode.classList.add("border","border-danger");
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
							Rname.innerHTML = 'لا يوجد بيانات  ' ;
							oldpoint.value = '0';

							userCode.classList.remove("border","border-warning");
							userCode.classList.remove("border", "border-success");
							userCode.classList.add("border","border-danger");
							$('.loading').css('display','none');
							$('.loader_cu').css('display','none');
							finish.classList.add('disabled');

						},

					 });
		}else if(userCode.value.length < 8){
			userCode.classList.remove("border","border-success");
			userCode.classList.add("border","border-warning");
			document.getElementById('Rname').innerHTML = '' ;
			finish.classList.add('disabled');

		}




});


</script>
@endsection
